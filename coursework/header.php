

<?php
ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

  <style>
body{
background-image: url("./assets/circle.png.png");
 background-repeat: repeat; 
}

#eror:empty{
    display: none;
} 
    #wrapper {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 30px 0;
}
.act{
  background-color: blue;
  color:white;
  padding:5px;
}

.card-columns {
  @include media-breakpoint-only(lg) {
    column-count: 4;
  }
  @include media-breakpoint-only(xl) {
    column-count: 5;
  }
}

      
  </style>

</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="background-color: #e3f2fd;"><!--bg-light"-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
      <a class="navbar-brand" href="index.php">Royal Borough of Greenwich</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
           
      <?php if (isset($_SESSION['u_id'])) {
    echo ' 
        <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="memberPage.php" >Member Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addPost.php" >Create a new Post</a>
        </li>
        ';
    
        }else{
    echo '<li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php" >Sign Up</a>
      </li>
        ';
    } 
        ?>

    </ul>
        
        <?php
        if (isset($_SESSION['u_id'])) {

         echo ' <form  class="form-inline"  action="includes/logout.inc.php" method="POST">
                  <div class="input-group">
                    <button class="btn btn-warning mr-sm-2" type="submit" name="submit">Log out</button>
                  </div>
                </form>
        ';

        } else {
          echo '<form class="form-inline"  action="includes/login.inc.php" method="POST">
                  <div class="input-group">
                      <input type="text" class="form-control mr-sm-2" name="uid" placeholder="Enter username">
                      <input type="Password" class="form-control mr-sm-2" name="pwd" placeholder="Enter Password" >
                      <button class="btn btn-primary mr-sm-2" type="submit" name="submit">Login</button>
                      <a class="btn btn-success mr-sm-2" href="signup.php" >Sign Up</a>
                  </div>
                </form>';
        }
        

        ?>
       

      
  </div>
</nav>
</header>
