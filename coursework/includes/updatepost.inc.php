<?php

session_start();
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';

	$start_Point = mysqli_real_escape_string($connex, $_POST['startPoint']);
	$destination = mysqli_real_escape_string($connex, $_POST['destination']);
	$travel_Times = mysqli_real_escape_string($connex, $_POST['travelTimes']);
	$days = mysqli_real_escape_string($connex, $_POST['days']);
	$lift_Purpose = mysqli_real_escape_string($connex, $_POST['lift']);
	$add_infomation = mysqli_real_escape_string($connex, $_POST['information']);
    $post_id = $_SESSION['postsId'];
 
	$memberID = $_SESSION['u_id'];

	if (empty($start_Point) || empty($destination) || empty($travel_Times) || empty($days) || empty($lift_Purpose) || empty($add_infomation)) {
		//header("Location: ../editPostPage.php?update=empty");
		//exit();
        echo 'Error Insert data';
	} else {
        
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