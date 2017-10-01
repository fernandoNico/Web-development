<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($connex, $_POST['uid']);
	$pwd = mysqli_real_escape_string($connex, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_id='$uid' OR email='$uid'";
		$result = mysqli_query($connex, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				
				//$hashedPwdCheck = password_verify($pwd, $row['password']);//
				$passwordChecker = password_verify($pwd, $row['password']);

				if ($passwordChecker == false) {
					header("Location: ../index.php?login=IncorrectPassword");
					exit();
				} elseif ($passwordChecker == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_first'] = $row['firstname'];
					$_SESSION['u_last'] = $row['surname'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_uid'] = $row['user_id'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error3");
	exit();
}