<?php 
include_once 'header.php';
?>

<?php 

if (isset($_COOKIE['memberCookie'])) {
	
	header("Location: /index.php");
    exit();

}else{

echo '
		<div  id="wrapper_login" class="container">
			<br><br>
			<h1>Login Page</h1>
			<br>
			<form action="includes/login.inc.php" method="POST">
		      <div class="form-row">
		          	<div class="form-group col-md-12">
		              <label for="inputEmail4" class="col-form-label">Username</label>
		              <input type="text" class="form-control" name="uid"   id="inputEmail4" placeholder="Enter User Name" required>
		         	</div>
		       		<div class="form-group col-md-12">
		              <label for="inputPassword4" class="col-form-label">Password</label>
		              <input type="password" class="form-control" name="pwd"  id="inputPassword4" placeholder=" Enter Password" required>
		       		</div>
		       		<div class="form-group col-md-12">
			             <label class="form-check-label">
			      				<input type="checkbox" name="remember" class="form-check-input">
			      				Remember me ?
			    		 </label>
		       		</div>
		      </div>
		            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
		    </form>

		<br><br>

		</div>

	';
}

?>








