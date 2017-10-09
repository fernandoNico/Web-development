<?php

session_start();

if (isset($_POST['submit'])) {

   include_once 'dbh.inc.php'; 
$img_id = $_REQUEST['deleteImagePost'];
	 

         
            $sql = "DELETE FROM images WHERE image_id=' $img_id' "; 
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