<?php
ob_start();
session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';
    
    $verification_code = mysqli_real_escape_string($connex, $_POST['verify']);
    
    if (empty($verification_code)) {
		header("Location: ../verifyAccount.php?verify=empty");
		exit();
	} else {
        $currentUser = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE username =  '$currentUser '";
		$result = mysqli_query($connex, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error1");
			exit();
		} else {
        
            if ($row = mysqli_fetch_assoc($result)) {
            
                    if($row['authentication_code'] == $verification_code ){
                        
                        $sqlito = "UPDATE users SET active_user='1' WHERE username='$currentUser' ";
                        mysqli_query($connex, $sqlito);
                        
                        header("Location: ../index.php?verify=success");
		                exit();
                        
                    }else{
                        header("Location: ../verifyAccount.php?verify=empty");
		                exit();
                    }
                
                
            }else{
                
            }
        
        
        }
        
        
    }
    
    
    
}else{
  
}

?>