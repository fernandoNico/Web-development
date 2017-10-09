<?php 
include_once 'header.php';
 ?>


<br>

<?php
	if (isset($_SESSION['u_id'])) {

		$var = $_SESSION['username'];
	
echo '<div id="wrapper" class="container">
			<h1>Welcome ' . $var .'</h1><br>
				
			<form  enctype="multipart/form-data"  action="includes/addpost.inc.php" method="POST">



      			<div class="form-row">
          			<div class="form-group col-md-6">
              			<label for="inputEmail4" class="col-form-label">Starting Point</label>
              			<input type="text" class="form-control" name="startPoint" id="inputEmail4" placeholder="Enter Starting Point" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Destination</label>
	              		<input type="text" class="form-control" name="destination"  id="inputPassword4" placeholder="Enter Destination" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Travel Times</label>
	              		<input type="text" class="form-control" name="travelTimes"  id="inputPassword4" placeholder=" Enter Travel Times" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Days</label>
	              		<input type="text" class="form-control" name="days"  id="inputPassword4" placeholder=" Enter Days" required>
          			</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Provide or Get a lift</label>
		              <input type="text" class="form-control" name="lift" id="inputPassword4" placeholder="Select an option" required>
	          		</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Additional information</label>
					  <textarea class="form-control" name="information" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Additional information such as what sort of car you have, driving licence and insurance, sharing  cost  etc. " required></textarea>
	          		</div> 
					<div class="form-group col-md-12">
					   		<label>Select an image: 
					   		</label>
					   		<input type="file" class="btn btn-light" name="post_image" accept="imags/*"/>
					</div> 
      			</div>
            		<button type="submit" name="submit" class="btn btn-primary btn-block">Add post</button>
    		</form>
		</div>';
}else{
	header("Location: ./index.php?Login=false");
	exit();
}



?>





