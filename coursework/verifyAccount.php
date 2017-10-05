<?php 
include_once 'header.php';
 ?>
<br>
<div id="wrapper" class="container text-center">
	<h1>Verify Account</h1>
	<small>Please verity your account to access to all websites facilities</small>

	<form action="includes/signup.inc.php" method="POST">
      <div class="form-row">
      	<div class="form-group col-md-12 text-center">
              <label for="inputEmail4" class="col-form-label">Verification code</label>
              <input type="text" class="form-control" name="username"   id="inputEmail4" placeholder="Enter code">
          </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Verify</button>
  </form>

</div>

