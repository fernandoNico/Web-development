<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($connex, $_POST['first']);
	$surname = mysqli_real_escape_string($connex, $_POST['surname']);
	$username = mysqli_real_escape_string($connex, $_POST['username']);
	$email = mysqli_real_escape_string($connex, $_POST['email']);
	$password = mysqli_real_escape_string($connex, $_POST['password']);

	
	//Error handlers
	//check foor empty fields

	if (empty($first) || empty($surname) || empty($username) || empty($email) || empty($password)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $surname)) {
			header("Location: ../signup.php?signup=invalid");
		exit();
		} else {
			// check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_id = '$username'";
				$result = mysqli_query($connex, $sql);
				$resultCheck =  mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=userTaken");
					exit();
				} else {
					//Hashing thr password
					$hashpwd = password_hash( $password, PASSWORD_DEFAULT);

					// Insert data to DB
					$sql = "INSERT INTO users (firstname, surname, email, password, user_id) 
					values ('$first','$surname','$email','$hashpwd ','$username');";

					mysqli_query($connex, $sql);

					header("Location: ../signup.php?signup=success");
					exit();

				}
				
			}
			
		}
		
	}
	
} else {
	header("Location: ../signup.php?signup = jodido");
	exit();
}






 