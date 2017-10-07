<?php 

if (isset($_REQUEST['submit'])) {
	include 'dbh.inc.php';

	$search = $_GET['search'];
	$terms = explode(" ", $search);
	$query="SELECT * FROM posts WHERE ";

	$i=0;
	foreach ($terms as $each) {
		$i++;
	

		if ($i==1) {
			$query .="starting_Point LIKE '%$each%' OR destination LIKE '%$each%' OR travel_Times LIKE '%$each%' OR days LIKE '%$each%' ";
		}else{
			$query .= " OR lift_Purpose LIKE '%$each%'  ";
		}
	}

	$result = mysqli_query($connex, $query);
	$resultNum =  mysqli_num_rows($result);

	if ($resultNum > 0 &&  $search!="") {

		echo "$resultNum results(s) found for <b>$search</b>!";

		
		while ($row = mysqli_fetch_assoc($result )) {
			$postId = $row['post_id'];
			$starting_point = $row['starting_Point'];
			$destination = $row['destination'];
			$travel_times = $row['travel_Times'];
			$days = $row['days'];
			$lift_purpose = $row['lift_Purpose'];
			$comments = $row['post_comment'];
			$userID = $row['user_id'];


			echo '<br><br>';		
			echo "$destination";
		}
	}else{
		echo "No result";
	}


	// mysqli_close($result );


}else{

}





 ?>