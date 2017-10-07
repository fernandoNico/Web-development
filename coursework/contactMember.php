<?php 

include_once 'header.php';

 ?>
<div class="container">
	<br><br>
	<h1>Member's Contact</h1>
<br>
<?php 
 if (isset($_SESSION['u_id'])) {
	include './includes/dbh.inc.php';

	$userContact = $_REQUEST['memberID'];
	$sql = "SELECT * FROM users WHERE id = '$userContact'";
    $result = mysqli_query($connex, $sql);
    if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_assoc($result )) {
	    	$memberUsername = $row['username'];
	    	$memberemail = $row['email'];

	    	echo'
					<div class="card border-primary mb-3" style="max-width: 30rem;">
					  <div class="card-header"><b>Member Details</b></div>
					  <div class="card-body text-primary">
					    <h4 class="card-title">'.$memberUsername.'</h4>
					    <p class="card-text">'.$memberemail.'</p>
					  </div>
					</div>
	
	    	';
	    }


    }else{
    header("Location: ./signup.php?user=Notfound");
	exit();
    }




}else{
	header("Location: ./signup.php?");
	exit();
}




 ?>





	


</div>
