<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commuter Car Pool</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

  <style>
      h1{
          font-family: 'Anton', sans-serif;
          font-size: 4.1rem;
}     
      
      
body{
background-image: url("./assets/background.jpg");
 background-repeat: no-repeat; 
}

#eror:empty{
    display: none;
} 
#wrapper {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 30px 30px;
}
#wrapper_login {
    width: 100%;
    max-width: 450px;
    margin: 0 auto;
    padding: 30px 0;
}
.post{
  background-color: white;
  margin: 70px;
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

  <!-- <div class="alert alert-dark alert-dismissible fade show text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   Welcome to Royal Borough of Greenwich Commuting Car pool. This site uses cookies.Read our <strong>policy</strong>.
</div> -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="background-color: #e3f2fd;"><!--bg-light"-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
      <a class="navbar-brand" href="index.php">Royal Borough of Greenwich</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      
           
      <?php if (isset($_SESSION['username']) || isset($_COOKIE["memberCookie"]) ) {
        

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
        </ul>

        <form  class="form-inline"  action="includes/logout.inc.php" method="POST">
                  <div class="input-group">
                    <button class="btn btn-warning mr-sm-2" type="submit" name="submit">Log out</button>
                  </div>
                </form>
        ';
    
        }else{


    echo '<li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php" >Contact us</a>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <a  href="login.php" class="btn btn-primary mr-sm-2 my-sm-0" >Login</a>
      <a  href="signup.php" class="btn btn-success my-2 my-sm-0" >Sign Up</a>
    </form>
        ';
    } 
        ?>

    
        
        
       

      
  </div>
</nav>
</header>
