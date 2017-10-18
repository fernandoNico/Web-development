<?php

session_start();
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';
    
    
    
    $image_paths=mysqli_real_escape_string($connex,'../images/'. $_FILES['image_posts']['name']);
	$start_Point = mysqli_real_escape_string($connex, $_POST['startPoint']);
	$destination = mysqli_real_escape_string($connex, $_POST['destination']);
	$travel_Times = mysqli_real_escape_string($connex, $_POST['travelTimes']);
	$days = mysqli_real_escape_string($connex, $_POST['days']);
	$lift_Purpose = mysqli_real_escape_string($connex, $_POST['lift']);
	$add_infomation = mysqli_real_escape_string($connex, $_POST['information']);
   
    if(isset( $image_paths)){
        echo $image_paths;
    }
    
    $post_id = $_SESSION['postsId'];
	$memberID = $_SESSION['u_id'];

	if (empty($start_Point) || empty($destination) || empty($travel_Times) || empty($days) || empty($lift_Purpose) || empty($add_infomation) ||((preg_match("!image!",$_FILES['image_post']['name'])))  ) {
        
		//header("Location: ../editPostPage.php?update=empty");
		//exit();
        echo 'Error Insert data';
	} else {
        
        
        if (move_uploaded_file($_FILES['image_post']['tmp_name'], $image_paths)) {

			

		//print_r($image_path);die;

			$image_sql = "INSERT into images(image_path,image_altname,post_id) values ('$image_paths' , '$image_paths' , '$post_id') ";

			mysqli_query($connex, $image_sql);

             

			//header("Location: ../memberPage.php?signup=success");
		   // exit();

		}
        
        
        
        
    $sql = "UPDATE posts SET 
            starting_Point='$start_Point',
            destination='$destination',
            travel_Times='$travel_Times',
            days='$days',
            lift_Purpose='$lift_Purpose',
            post_comment='$add_infomation' WHERE post_id='  $post_id' ";
            mysqli_query($connex, $sql);
            header("Location: ../memberPage.php?Postupdate=success");
            exit();

	}


}else{
	header("Location: ../index.php?signup = jodido");
	exit();
}

?>