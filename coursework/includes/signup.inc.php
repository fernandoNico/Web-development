<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
session_start();
	
	$username = mysqli_real_escape_string($connex, $_POST['username']);
	$password = mysqli_real_escape_string($connex, $_POST['password']);
	$email = mysqli_real_escape_string($connex, $_POST['email']);
	$captcha = mysqli_real_escape_string($connex, $_POST['captcha_txt']);


	
	//Error handlers
	//check foor empty fields

	if (empty($username) || empty($password) || empty($email) || empty($captcha)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE username = '$username'";
				$result = mysqli_query($connex, $sql);
				$resultCheck =  mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=userTaken");
					exit();
				}else {

if(isset($_POST['captcha_txt']))  {

	if($_SESSION['captcha_text']==md5(strtolower($_POST['captcha_txt']))){
		print "<span style=\"color:green\">Correct! You are human</span>";
		//Hashing thr password
					$hashpwd = password_hash( $password, PASSWORD_DEFAULT);
					$captchaInitialValue = false;

					// Insert data to DB
					$sql = "INSERT INTO users (username, email, password, captcha, active) 
					values ('$username','$email','$hashpwd ','$captcha','$captchaInitialValue');";

					mysqli_query($connex, $sql);

					header("Location: ../signup.php?signup=success");
					exit();
	}
	else{
	print "<span style=\"color:red\">Incorrect Are you a machine ?</span>";
	}
}







					

				}

			}



			// check if email is valid
			/*

			//check if input characters are valid
			//if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $surname)) {
			//	header("Location: ../signup.php?signup=invalid");
			//exit();
			//} else {
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
			
		}*/




	////////////////////////////////////	
	}
	
} else {
	header("Location: ../signup.php?signup = jodido");
	exit();
}






 