<?php 
	ob_start();
	include_once 'header.php';
?>
<br>

<?php 
		
		
	if (!isset($_SESSION['username']) && isset($_COOKIE["memberCookie"]) ) {

			$_SESSION['username'] = $_COOKIE["memberCookie"];
		}
			echo '<div id="wrapper" class="container">
				<h1>Welcome ';
			echo $_SESSION['username'] ;
			echo '</h1>';?>



			<br>

<?php 
		include './includes/dbh.inc.php';
        $id_check= $_SESSION['username'];
        
		$getMemberId = "SELECT id from users WHERE username='$id_check'";
		$result_id = mysqli_query($connex, $getMemberId);

		if (mysqli_num_rows($result_id) > 0) {
			while ($row_id = mysqli_fetch_array($result_id)) 
			{
			
        		$id = $row_id['id'];

		$sql = "SELECT * FROM posts WHERE  user_id = ' $id' ";
		$result = mysqli_query($connex, $sql);
		//$resultCheck =  mysqli_num_rows($result);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) 
			{
        $postsID = $row["post_id"];
	?>	

		<div class="card" id="wrapper">
		  
		  <div class="card-body">
		    <h4 class="card-title"><?php echo $row["destination"]; ?></h4>
		    <h5><span class="badge badge-secondary"><?php echo $row["lift_Purpose"]; ?></span></h5>
		    <p class="card-text"><?php echo $row["post_comment"]; ?></p>
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item"><b>From: </b><?php echo $row["starting_Point"]; ?></li>
		    <li class="list-group-item"><b>To: </b><?php echo $row["destination"]; ?></li>
		    <li class="list-group-item"><b>Times: </b><?php echo $row["travel_Times"]; ?></li>
		     <li class="list-group-item"><b>Days: </b><?php echo $row["days"]; ?></li>
		  </ul>
		  <div class="card-body">


	<?php  	  
		  $sql_images = "SELECT * FROM images WHERE  post_id = ' $postsID' ";
		  $result_images = mysqli_query($connex, $sql_images);

		  if (mysqli_num_rows($result_images) > 0) {
			while ($row = mysqli_fetch_array($result_images)) 
			{
			$post_images = trim($row["image_path"], '.');
			$post_image_id = $row["image_id"];
	 ?>


		  	<table class="table table-responsive table-hover">
				  <thead >
				    <tr>
				      <th>Image</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				   <tr>
				      <th >
						
				      	<img class="card-img"  src=".<?php echo $post_images;?>" alt="Card image caps ="><br><b>Alt text: </b></br> <?php echo $post_images; ?></th>
				      <td> 
				      	<form  action="includes/deletepost_image.inc.php?deleteImagePost=<?php echo $post_image_id ;?>" method="POST">
                 			<button type="submit" name="submit" class="btn btn-danger">X</button><br><br>
                		</form>	
				  	   </td>
				    </tr>
				    
				  </tbody>
				</table>
		 
	<?php 		
			}

		}
	?>


<hr>
        <a class="btn btn-success " href="editPostPage.php?postId=<?php echo $postsID;?>">Edit Post</a> <br>
                <form  action="includes/deletepost.inc.php?deletepostId=<?php echo $postsID;?>" method="POST">
                 <button type="submit" name="submit" class="btn btn-danger ">Delete Post</button>
                </form>		    
		  </div>



		</div>
		
	<br>
	<?php 	
					}
				}	
			}

		}

 ?>

 </div>



<?php  
	
		
		


	


 ?>




<br>





