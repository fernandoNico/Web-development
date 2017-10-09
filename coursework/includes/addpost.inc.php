<?php

session_start();
  session_start();
  //  $_SESSION['message'] = '';
if (isset($_POST['submit'])) {
	include_once 'dbh.inc.php';
	//print_r($_FILES);die;

	$start_Point = mysqli_real_escape_string($connex, $_POST['startPoint']);
	$destination = mysqli_real_escape_string($connex, $_POST['destination']);
	$travel_Times = mysqli_real_escape_string($connex, $_POST['travelTimes']);
	$days = mysqli_real_escape_string($connex, $_POST['days']);
	$lift_Purpose = mysqli_real_escape_string($connex, $_POST['lift']);
	$add_infomation = mysqli_real_escape_string($connex, $_POST['information']);
	$image_path=mysqli_real_escape_string($connex,'../images/'. $_FILES['post_image']['name']);

	$memberID = $_SESSION['u_id'];

	if (empty($start_Point) || empty($destination) || empty($travel_Times) || empty($days) || empty($lift_Purpose) || empty($add_infomation) ||((preg_match("!image!",$_FILES['post_image']['name'])))  ) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		$id_post = rand( 0, 99000);



		if (copy($_FILES['post_image']['tmp_name'], $image_path)) {

			

		//print_r($image_path);die;

			$image_sql = "INSERT into images(image_path,image_altname,post_id) values ('$image_path' , '$image_path' , '$id_post') ";

			mysqli_query($connex, $image_sql);



			//header("Location: ../memberPage.php?signup=success");
		   // exit();

		}
			$sql = "INSERT INTO posts (post_id, starting_Point, destination, travel_Times, days, lift_Purpose,post_comment,user_id) 
			values ('$id_post','$start_Point','$destination','$travel_Times','$days','$lift_Purpose','$add_infomation','$memberID');";

			mysqli_query($connex, $sql);


		header("Location: ../memberPage.php?signup=yes");
		exit();

		
	}


}else{
	header("Location: ../index.php?signup = jodido");
	exit();
}

?>