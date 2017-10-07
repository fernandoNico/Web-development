<?php 
include_once 'header.php';
 ?>

<?php
  if (isset($_SESSION['u_id'])) {

    header("Location: /index.php");
    exit();
    //$var = $_SESSION['u_active'];

    // echo "You are logged in!<br />";
    // echo "<b> User ID: </b>{$_SESSION['u_id']}<br />";
    // echo "<b> User Email: </b>{$_SESSION['u_email']}<br />";
    // echo "<b> Active User?: </b>{$_SESSION['u_active']}<br />";
    //   if ($var == 0) {
    //     header("Location: /coursework/verifyAccount.php");
    //     exit();
    //   } else {
    //     echo $var . ' is my id' . '<br></br>';
    //     echo '<a href="/coursework/memberPage.php" class="btn btn-primary">Add a Post</a>';
    //   } 
  } 
  else{
echo '


<br>
<div id="wrapper" class="container text-center">
  <h1>Verify Account</h1>
  <small>Please verity your account to access to all websites facilities</small>

  <form action="includes/verifyUser.inc.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-12 text-center">
              <label for="inputEmail4" class="col-form-label">Verification code</label>
              <input type="text" class="form-control" name="verify"   id="inputEmail4" placeholder="Enter code">
          </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Verify</button>
  </form>

</div>





';






  }
?>
<br />





