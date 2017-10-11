<?php 
ob_start();
include_once 'header.php';
?>
	<div class="container text-center">
    <br><br>
		<h1>Welcome to Greenwich  Commuter carpool</h1>
		<small><b>Our Goal: </b> Engage Commuters to reduce number of cars on the roads.</small>
	  <br><br><br>

  		<div class="card bg-dark text-white">
    			<img class="card-img" src="./assets/greenwich.jpg" alt="Card image">
    				<div class="card-img-overlay"></div>
  		</div>
    <br><br>
	
      <form class="form-inline mx-auto" method="GET" action="index.php">
        <div class="input-group">
            <input class="form-control mr-xl-2" type="text" placeholder="Search" name="search" aria-label="Search">
        </div>
        <div class="input-group">  
            <button class="btn btn-primary my-2 my-sm-0" name="submit">Search</button>
        </div>
        <div class="input-group">  
            <h2>Filter By</h2>
        </div>
        <div class="input-group">  
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Destination
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Get a lift
                </label>
            </div>
        </div>
      </form>

<?php 

  if (isset($_GET['submit'])) {

      include './includes/dbh.inc.php';
      $search = $_GET['search'];
      $terms = explode(" ", $search);
      $query=" ";
      $i=0;

      foreach ($terms as $each) {
        $i++;
        if ($i==1) {
          $query .="starting_Point LIKE '%$each%' OR destination LIKE '%$each%' OR travel_Times LIKE '%$each%' OR days LIKE '%$each%' OR lift_Purpose LIKE '%$each%'";
        }else{
          $query .= " OR starting_Point LIKE '%$each%'  ";
        }
      }

      $sql ="SELECT * FROM posts WHERE $query";
      $result = mysqli_query($connex, $sql);
      $resultNum =  mysqli_num_rows($result);


      if ($resultNum > 0 &&  $search!="") {
        $per_page = 6;
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;
        $pages = ceil(mysqli_num_rows($result) / $per_page);
        $start = ($page - 1) *  $per_page;
        $sql = "SELECT * FROM posts WHERE $query LIMIT $start, $per_page"; 
        $result = mysqli_query($connex, $sql);


        echo '<br>';  
        echo "$resultNum results(s) found for <b>$search</b>!";
        echo '<br>';  
        echo '</br>'; 
        echo '<div class="card-columns">'; 

        while ($row = mysqli_fetch_assoc($result )) {
              $postId = $row['post_id'];
              $starting_point = $row['starting_Point'];
              $destination = $row['destination'];
              $travel_times = $row['travel_Times'];
              $days = $row['days'];
              $lift_purpose = $row['lift_Purpose'];
              $comments = $row['post_comment'];
              $userID = $row['user_id'];

              echo '  <div class="card" >
                        <div class="card-body">
                          <h4 class="card-title">'.$destination.'</h4>
                          <h6><span class="badge badge-pill badge-warning">'.$lift_purpose.'</span></h6>
                            <p class="card-text">'.$comments.'.</p>
                            <p class="card-text">'.$travel_times.'.</p>
                            <p class="card-text">'.$days.'.</p>
                            <a class="btn btn-success btn-sm " href="contactMember.php?memberID='. $userID.'">Contact Member</a> <br>
                        </div>
                      </div>';
            }

              echo '</br>
              </div>';//div card-colums

            $prev1 = $page - 1;
            $next1= $page + 1;

            if (!($page<=1)) {
              echo "<a href='index.php?page=$prev1'>Prev</a> ";
            }

                if ($pages >=1) {
                  for($x=1 ; $x <=$pages ; $x++){
                      echo ($x == $page) ? '<b><a class="act" href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ' ;
                      }
                }

            if (!($page>=$pages)) {
              echo "<a href='index.php?page=$next1'>Next</a> ";
            }


      }else{ echo "No result";}

  }

?>
      <br>
      <hr>
      <br>
      <h2 class="text-left">Recent Posts</h2>
      <br>
          <div class="card-columns">
<?php 

      include './includes/dbh.inc.php';
      $per_page = 6;
      $pages_sql= "SELECT post_id FROM posts"; 
      $result_sql = mysqli_query($connex, $pages_sql);
      $pages = ceil(mysqli_num_rows($result_sql) / $per_page);
      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;
      $start = ($page - 1) *  $per_page;

      $sql = "SELECT * FROM posts LIMIT $start, $per_page"; 
      $result = mysqli_query($connex, $sql);
      
      if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
            
                  $_SESSION['post_id_checker'] = $row['post_id'];
?>	

              <div class="card ">
                    <div id="carouselExampleControls<?php echo $_SESSION['post_id_checker'];?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

<?php 

      $sql_ls = "SELECT posts.post_id, images.image_path FROM posts
              INNER JOIN images ON posts.post_id = images.post_id";
      $result_images = mysqli_query($connex, $sql_ls);

            if (mysqli_num_rows( $result_images) > 0) {
                while ($row_images = mysqli_fetch_assoc( $result_images)) {

                    if ($row_images['post_id'] == $_SESSION['post_id_checker']) {

                        $p_images = trim($row_images["image_path"], '.');
                        $_SESSION['p'] = false;                                
?>              
                             <div class="carousel-item">
                                  <img class="d-block w-100 img-fluid" src=".<?php echo $p_images;?>" alt="First slide">
                             </div>

<?php 
                    }
                          
                }
            }

 ?>


<?php  
         
                      echo  "<div class='carousel-item active'>
                                <img class='d-block w-100' src='./assets/try.jpg' alt='First slide'>
                            </div>";
          
?>
                      </div><!-- div for corousel inner -->


                      <a class="carousel-control-prev" href="#carouselExampleControls<?php echo $_SESSION['post_id_checker'];?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls<?php echo $_SESSION['post_id_checker'];?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                  
                  </div>
                  
                  <div class="card-body">
                        <h5><span class="badge badge-info"><?php echo $row["lift_Purpose"]; ?></span></h5>
                        <p class="card-text"><?php echo $row["post_comment"]; ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>From: </b><?php echo $row["starting_Point"]; ?></li>
                        <li class="list-group-item"><b>To: </b><?php echo $row["destination"]; ?></li>
                        <li class="list-group-item"><b>Times: </b><?php echo $row["travel_Times"]; ?></li>
                        <li class="list-group-item"><b>Days: </b><?php echo $row["days"]; ?></li>
                  </ul>
                  <div class="card-body">
                        <a class="btn btn-warning btn-sm " href="contactMember.php?memberID=<?php echo $row["user_id"];?>">Contact Member</a> <br>
                  </div>
            </div><!-- End post card images div -->
<?php 
      }

    }
echo '</div>';

echo '<div class="card text-center">
        <div class="card-body">';
        
        $prev = $page - 1;
        $next= $page + 1;


        if (!($page<=1)) {
          echo "<a href='index.php?page=$prev'>Prev</a> ";
        }

           if ($pages >=1) {
            for($y=1 ; $y <=$pages ; $y++){
              echo ($y == $page) ? '<b><a class="act" href="?page='.$y.'">'.$y.'</a></b> ' : '<a href="?page='.$y.'">'.$y.'</a> ' ;
            }
           }

         if (!($page>=$pages)) {
          echo "<a href='index.php?page=$next'>Next</a> ";
        }
?>

        </div>
      </div>

</div><!-- Div container -->
<br>
<br>
<br>