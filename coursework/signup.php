<?php 
include_once 'header.php';
 ?>

<div class="container">
  <br>
<h1 class="text-center"> Join us now!</h1>
<br>
<br>

<form action="includes/signup.inc.php" method="POST">


  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4" class="col-form-label">First Name</label>
      <input type="text" class="form-control" name="first"   id="inputEmail4" placeholder="Enter First Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-form-label">Last Name</label>
      <input type="text" class="form-control" name="surname" id="inputPassword4" placeholder="Last Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-form-label">Username</label>
      <input type="text" class="form-control"  name="username" id="inputPassword4" placeholder="Enter Username">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4" class="col-form-label">Email</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-form-label">Password</label>
      <input type="password" class="form-control" name="password"  id="inputPassword4" placeholder="Password">
    </div>
   <!--  <div class="form-group col-md-4">
      <label for="inputPassword4" class="col-form-label">Confirm Password</label>
      <input type="password" class="form-control" name="confpassword" id="inputPassword4" placeholder="Password">
    </div> -->
  </div>
  
  <!-- <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity" class="col-form-label">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState" class="col-form-label">State</label>
      <select id="inputState" class="form-control">Choose</select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip" class="col-form-label">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> Check me out
      </label>
    </div>
  </div> -->
  <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
</form>
<br>
<br>
</div>





 <!--  <div class="form-group">
    <label for="inputAddress" class="col-form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2" class="col-form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div> -->