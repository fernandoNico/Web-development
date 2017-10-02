<?php 
include_once 'header.php';
 ?>


<br>

<?php
	if (isset($_SESSION['u_id'])) {

		$var = $_SESSION['username'];
	
echo '<div class="container">
			<h1>Welcome ' . $var .'</h1><br>
				
			<form action="includes/addpost.inc.php" method="POST">
      			<div class="form-row">
          			<div class="form-group col-md-6">
              			<label for="inputEmail4" class="col-form-label">Starting Point</label>
              			<input type="text" class="form-control" name="startPoint" id="inputEmail4" placeholder="Enter Starting Point">
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Destination</label>
	              		<input type="text" class="form-control" name="destination"  id="inputPassword4" placeholder="Enter Destination">
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Travel Times</label>
	              		<input type="text" class="form-control" name="travelTimes"  id="inputPassword4" placeholder=" Enter Travel Times">
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Days</label>
	              		<input type="text" class="form-control" name="days"  id="inputPassword4" placeholder=" Enter Days">
          			</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Provide or Get a lift</label>
		              <input type="text" class="form-control" name="lift" id="inputPassword4" placeholder="Select an option">
	          		</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Additional information</label>
					  <textarea class="form-control" name="information" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Additional information such as what sort of car you have, driving licence and insurance, sharing  cost  etc. "></textarea>
	          		</div> 
					<div class="form-group col-md-12">
					   		<label class="custom-file">
  							<input type="file" id="file2" class="custom-file-input">
							  <span class="custom-file-control"></span>
							</label>
					</div> 


	       
      			</div>
            		<button type="submit" name="submit" class="btn btn-primary">Add post</button>
    		</form>
		</div>';
}


		// echo "You are logged in!<br />";
		// echo "<b> User ID: </b>{$_SESSION['u_id']}<br />";
		// echo "<b> User Email: </b>{$_SESSION['u_email']}<br />";
		// echo "<b> Active User?: </b>{$_SESSION['u_active']}<br />";
			// if ($var == 0) {
			// 	header("Location: /coursework/verifyAccount.php");
			// 	exit();
			// } else {
			// 	echo $var . ' is my id' . '<br></br>';
			// 	echo '<a href="#" class="btn btn-primary">Add a Post</a>';
			// }
			

?>





