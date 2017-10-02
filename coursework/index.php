<?php 
include_once 'header.php';

 ?>
	<br>
	<div class="container text-center">
		<h1>Welcome to the Royal Borough of Greenwich</h1>
		<small><b>Our Goal: </b> Engage Commuters into to reduce number of cars on the roads.</small>
	<br />
	<br />

		<div class="card bg-dark text-white">
  			<img class="card-img" src="./assets/greenwich.jpg" alt="Card image">
  				<div class="card-img-overlay">
				    <!-- <h4 class="card-title" style="color:blue;">Card title</h4>
				    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				    <p class="card-text">Last updated 3 mins ago</p> -->
				     
				    <!-- <a href="#" class="btn btn-success">See what's on</a> -->
  				</div>
		</div>
	<br />
	<br />

	<form class="form-inline mx-auto">
      <input class="form-control mr-xl-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
	<br />
	<br />


<?php 
		include './includes/dbh.inc.php';

		$sql = "SELECT * FROM posts WHERE  post_id ";
		$result = mysqli_query($connex, $sql);
		//$resultCheck =  mysqli_num_rows($result);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) 
			{
	?>	

		<div class="card mx-auto" style="width:20rem;">
		  <img class="card-img-top" src="./assets/try.jpg" alt="Card image cap">
		  <div class="card-body">
		    <h4 class="card-title"><?php echo $row["destination"]; ?></h4>
		    <h5><span class="badge badge-secondary"><?php echo $row["liftPurpose"]; ?></span></h5>
		    <p class="card-text"><?php echo $row["comments"]; ?></p>
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item"><b>From: </b><?php echo $row["startingPoint"]; ?></li>
		    <li class="list-group-item"><b>To: </b><?php echo $row["destination"]; ?></li>
		    <li class="list-group-item"><b>Times: </b><?php echo $row["travelTimes"]; ?></li>
		     <li class="list-group-item"><b>Days: </b><?php echo $row["days"]; ?></li>
		  </ul>
		  <div class="card-body">
		    <button type="button" class="btn btn-success btn-sm">Edit</button>
		    <button type="button" class="btn btn-danger btn-sm">Delete</button>
		  </div>
		</div>
	<br>
	<?php 		
			}

		}

 ?>
 <div style="clear:both"></div> 


<?php
	if (isset($_SESSION['u_id'])) {

		$var = $_SESSION['u_id'];

		echo "You are logged in!<br />";
		echo "<b> User ID: </b>{$_SESSION['u_id']}<br />";
		echo "<b> User Email: </b>{$_SESSION['u_email']}<br />";
		echo "<b> Active User?: </b>{$_SESSION['u_active']}<br />";
			if ($var == 0) {
				header("Location: /coursework/verifyAccount.php");
				exit();
			} else {
				echo $var . ' is my id' . '<br></br>';
				echo '<a href="/coursework/memberPage.php" class="btn btn-primary">Add a Post</a>';
			}
			
	}	
?>
<br />
</div>
</body>
</html>


<!--<div class="card" style="width: 20rem;">

  		<div class="card-body">
    		<h4 class="card-title"><php? echo $var; ?></h4>
    		<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    		<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
    		<a href="#" class="card-link">Add a Post</a>
  		</div>

  			//echo	$_SESSION['u_id'] ;
	//echo	$_SESSION['u_email'] ;
	//echo	$_SESSION['u_active'] ;


	</div>-->