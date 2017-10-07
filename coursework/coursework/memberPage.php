<?php 
ob_start();
include_once 'header.php';
$usern = $_SESSION['username'];
 ?>


<br>
<div class="container">
<?php
    
    echo '<h1>Welcome ' .$usern.'</h1> 
    <small>See below your current Posts</small>';
    ?>


<br>
<br>

<div class="card-columns">
<?php 
		include './includes/dbh.inc.php';
        $id = $_SESSION['u_id'];

		$sql = "SELECT * FROM posts WHERE  user_id = ' $id' ";
		$result = mysqli_query($connex, $sql);
		//$resultCheck =  mysqli_num_rows($result);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) 
			{
        $postsID = $row["post_id"];
	?>	

		<div class="card " style="width:20rem;">
		  <img class="card-img-top" src="./assets/try.jpg" alt="Card image cap">
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

 ?>
 </div>
 </div>




