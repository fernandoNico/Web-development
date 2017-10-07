<?php

session_start();

if (isset($_POST['submit'])) {

   include_once 'dbh.inc.php'; 
$i = $_REQUEST['deletepostId'];
	 

         
            $sql = "DELETE FROM posts WHERE post_id=' $i' "; 
            mysqli_query($connex, $sql);
            echo '<script>alert("Item Removed")</script>';  
            //header("Location: ./memberPage.php?delete=success");
            //exit();
    echo '<script>window.location=" ../memberPage.php"</script>';
         


}else{
	header("Location: ../index.php?delete=errrores");
	exit();
}

?>