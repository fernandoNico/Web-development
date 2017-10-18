<?php 
ob_start();
include_once 'header.php';
 ?>

<div id="wrapper" class="container">
  <br>
    <h1 class="text-center"> Commuting Car pool</h1>
  <br>
    <h3 class="text-center"> Join us now!</h3>
  <br>
  <br>

    <form action="includes/signup.inc.php" method="POST">
      <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail4" class="col-form-label">Username</label>
              <input type="text" class="form-control" name="username"   id="inputEmail4" placeholder="Enter User Name">
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4" class="col-form-label">Password</label>
              <input type="password" class="form-control" name="password"  id="inputPassword4" placeholder=" Enter Password">
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4" class="col-form-label">Email</label>
              <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Enter Email">
          </div>

          <div class="form-group col-md-6">
              <div class="card" >
                <div class="card-body">
                  <h4 class="card-title">Captcha string</h4>
                  <h6 class="card-subtitle mb-2 text-muted">Enter string accordingly</h6>
                  <img src="captcha_image.php" />
                  <br>
                  <label for="inputPassword4" class="col-form-label">Captcha</label>
                  <input type="text" class="form-control" name="captcha_txt" id="inputPassword4" placeholder="Enter Captcha">
    
                </div>
            </div>              
          </div>  



      </div>
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Create Member</button>
    </form>
  <br>
  <br>

</div>