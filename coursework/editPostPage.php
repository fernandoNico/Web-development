<?php 
include_once 'header.php';
  $_SESSION['postsId'] = $_REQUEST['postId'];

 ?>
 
 <div id="wrapper" class="container">
 <?php echo '<h1>Post Ref: ' .$_SESSION['postsId'].'</h1><br> ';?>
 
 <?php 
		include './includes/dbh.inc.php';
        $id = $_SESSION['u_id'];
        $editPost_id = $_SESSION['postsId'];
       

		$sql = "SELECT * FROM posts WHERE  user_id = '$id' AND post_id='$editPost_id' ";
		$result = mysqli_query($connex, $sql);
 
 if (mysqli_num_rows($result) > 0) {
    
     
			while ($row = mysqli_fetch_array($result)) 
			{
	?>	
         
				
			<form action="includes/updatepost.inc.php" method="POST">
      			<div class="form-row">
          			<div class="form-group col-md-6">
              			<label for="inputEmail4" class="col-form-label">Starting Point</label>
              			<input type="text" class="form-control" name="startPoint" id="inputEmail4" 
              			value="<?php echo $row["starting_Point"];?>" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Destination</label>
	              		<input type="text" class="form-control" name="destination"  id="inputPassword4" 
	              		value="<?php echo $row["destination"];?>" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Travel Times</label>
	              		<input type="text" class="form-control" name="travelTimes"  id="inputPassword4" 
	              		value="<?php echo $row["travel_Times"];?>" required>
          			</div>
          			<div class="form-group col-md-6">
	              		<label for="inputPassword4" class="col-form-label">Days</label>
	              		<input type="text" class="form-control" name="days"  id="inputPassword4" 
	              		value="<?php echo $row["days"];?>" required>
          			</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Provide or Get a lift</label>
		              <input type="text" class="form-control" name="lift" id="inputPassword4" 
		              value="<?php echo $row["lift_Purpose"];?>" required>
	          		</div>
	          		<div class="form-group col-md-6">
		              <label for="inputPassword4" class="col-form-label">Additional information</label>
					  <textarea class="form-control" name="information" id="exampleFormControlTextarea1" rows="3" required ><?php echo $row["post_comment"]; ?></textarea>
	          		</div> 
					<div class="form-group col-md-12">
					   		<label>Select an image: 
					   		</label>
					   		<input type="file" class="btn btn-light" name="image_posts" accept="imags/*"/>
					</div>  
	       
      			</div>
            		<button type="submit" name="submit" class="btn btn-primary">Update Post</button>
    		</form>
		

<br>
<?php 		
			}

		}

 ?>
 </div>