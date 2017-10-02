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

	$memberID = $_SESSION['u_id'];

	if (empty($start_Point) || empty($destination) || empty($travel_Times) || empty($days) || empty($lift_Purpose) || empty($add_infomation)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		$sql = "INSERT INTO posts (startingPoint, destination, travelTimes, days, liftPurpose,comments,member_id) 
	values ('$start_Point','$destination','$travel_Times','$days','$lift_Purpose','$add_infomation','$memberID');";

				mysqli_query($connex, $sql);
				header("Location: ../index.php?signup=success");
				exit();

	}


}else{
	header("Location: ../index.php?signup = jodido");
	exit();
}

?>