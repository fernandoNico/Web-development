<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($connex, $_POST['uid']);
	$pwd = mysqli_real_escape_string($connex, $_POST['pwd']);
    
    
//    echo $remember; die;

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username='$uid'";
		$result = mysqli_query($connex, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				
				//$hashedPwdCheck = password_verify($pwd, $row['password']);//
				$passwordChecker = password_verify($pwd, $row['password']);
				$verifyAccount = $row['active_user']; 


				if ($passwordChecker == false) {
					header("Location: ../index.php?login=IncorrectPassword");
					exit();
				} elseif ($verifyAccount == 0) {
					$_SESSION['user']=$uid;
					header("Location: ../verifyAccount.php?login=VerifyAccount");
					exit();
				}
				elseif ($passwordChecker == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['u_email'] = $row['email'];
					$_SESSION['u_active'] = $row['active_user'];


                        if ( isset($_POST['remember']) == 'on') {

                            $expire = time() + 86400;//24h cookie is on
                            setcookie("memberCookie", $_SESSION['username'], $expire,"/", "stuweb.cms.gre.ac.uk", 0);

                        }
                    
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