<?php 
ob_start();
include_once 'header.php';
?>
<?php 
if (!isset($_SESSION['username']) && isset($_COOKIE["memberCookie"]) ) {

			$_SESSION['username'] = $_COOKIE["memberCookie"];
		}
?>
<div class="container text-center">
    <br><br>
    <h1>Welcome to Greenwich  Commuter Carpool</h1>
    <small ><b>Our Goal: </b> Engage Commuters to reduce number of cars on the roads.</small>
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
        <div class="input-group ">
            <h2>Filter By</h2>
        </div>
        <div class="input-group ">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="dest"  value="option1"> <h6>Destination</h6>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="no_img" value="option2"><h6>Only post with images</h6> 
                </label>
            </div>
        </div>
    </form><br><br>
    <?php
        if (isset($_GET['submit'])) {
            include './includes/dbh.inc.php';
            $query="";
            $search = $_GET['search']; 
            $_SESSION['searchValue'] = $search;
    
        if (empty($_GET['search'])){
             $query = "SELECT * FROM posts"; 
             
        }elseif($_GET['search'] && isset($_GET['dest']) == 'on'){
            
            $query = " SELECT * FROM posts where destination LIKE '%$search%' "; 
        }
        elseif($_GET['search'] && isset($_GET['no_img']) == 'on'){
            
            $query = " SELECT * FROM posts where has_images='1'";
        }
            
        else{
            $query = " SELECT * FROM posts where starting_Point LIKE '%$search%' OR destination LIKE '%$search%' OR days LIKE '%$search%'"; 
            
            
        }
               
            $sql = $query;
            $result = mysqli_query($connex, $sql); 
            
            if(mysqli_num_rows($result) == 0)
            {
            $message="<br><h1>No posts exists with the given value field!.</h1>";
            echo $message;
            }
            
             $per_page = 6;
             $num_posts_found = mysqli_num_rows($result);
             $pages = ceil(mysqli_num_rows($result) / $per_page);
             $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;
             $start = ($page - 1) *  $per_page;
            
             $query .=" LIMIT $start, $per_page";
            
//            echo $query; die;
            $res = mysqli_query($connex, $query); 
        
             if (empty($_GET['search'])){
                 
            echo'    <div class="card">
                        <div class="card-body">';
            echo "<h6>$num_posts_found result(s)!</h6></div>
                    </div><br>
                 ";
                    
             }else{
                 echo'    <div class="card">
                        <div class="card-body">';
            echo "<h6>$num_posts_found results(s) found for <b>$search</b>!</h6></div>
                    </div><br>";
              
             }
             
             $expireSearch = time() + 86400;//24h cookie is on
             setcookie("lastSearch", $_SESSION['searchValue'], $expireSearch,"/", "stuweb.cms.gre.ac.uk", 0);
        
           
    echo '<div class="card-columns">';
                
            while ($row = mysqli_fetch_assoc($res)) 
            
                {
                echo '<div class="card">';
                
                $_SESSION['post_id_checker'] = $row['post_id'];
                $ids =$_SESSION['post_id_checker'];
                $_SESSION['userNum'] = $row['user_id'];
                
                
                if($row["has_images"]==0){
echo "<img class='card-img' src='./assets/default.jpg' alt='Card image cap'>" ;
                    
                }else{

                    $sql_ls = "SELECT posts.post_id, images.image_path FROM posts
                                INNER JOIN images ON posts.post_id = images.post_id";
                    
                    $result_images = mysqli_query($connex, $sql_ls);
        
     echo "  <div id='carouselExampleControls{$ids}' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-inner'> ";
                    
                        if (mysqli_num_rows( $result_images) > 0) {
                            
                            $i=true;
                                while ($row_images = mysqli_fetch_assoc( $result_images)) {
                            
                                        if ($row_images['post_id'] == $ids) {
                                            $p_images = trim($row_images["image_path"], '.');
                                            
                                                if ($i) {
                                                  echo "
                                                        <div class='carousel-item active'>
                                                            <img class='d-block w-100' src=.{$p_images} alt='First slide'>
                                                        </div> "; 
                                                        $i=false;
                                                }else{          
                                                  echo "
                                                        <div class='carousel-item '>
                                                        <img class='d-block w-100' src=.{$p_images} alt='First slide'>
                                                        </div> ";  
                                                }    
                                                                                          
                                        }

                                }
                  
                        }
    echo "
                    
                    </div>
                    <a class='carousel-control-prev' href='#carouselExampleControls{$ids}' role='button' data-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Previous</span>
                    </a>

                    <a class='carousel-control-next' href='#carouselExampleControls{$ids}' role='button' data-slide='next''>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Next</span>
                    </a>
            </div> ";
            ///////////////
                }
                     
                     
?>
            <div class="card-body">
                <h3 class="card-title"><?php echo $row["starting_Point"]; ?></h3>
                <h4 class="card-title"><?php echo $row["destination"]; ?></h4>
                <h5 class="card-title"><?php echo $row["days"]; ?></h5>
                <h6 class="card-title"><span class="badge badge-info"><?php echo $row["lift_Purpose"]; ?></span></h6>
                <p class="card-text"><small class="text-muted"><?php echo $row["post_comment"]; ?></small></p>
                <a class="btn btn-warning btn-sm " href="contactMember.php?memberID=<?php echo $_SESSION['userNum'];?>">Contact Member</a> <br>
            </div>

        </div>
        <?php                
            }
             
            
     echo '</div>'; 
            
   echo '<div class="card text-center">
        <div class="card-body">';
    
        $prev = $page - 1;
        $next= $page + 1;


        if (!($page<=1)) {
          echo "<a href='{$_SERVER['PHP_SELF']}?search=$search&submit=&page=$prev'>Prev</a> ";
        }

           if ($pages >=1) {
            for($y=1 ; $y <=$pages ; $y++){
    echo ($y == $page) ? '<b><a class="act" href="?search='.$search.'&submit=&page='.$y.' ">   '.$y.'</a></b> ' : '<a href="?search='.$search.'&submit=&page='.$y.' "> '.$y.'</a> ' ;
            }
           }

         if (!($page>=$pages)) {
          echo "<a href='{$_SERVER['PHP_SELF']}?search=$search&submit=&page=$next'>Next</a> ";
        }
    
    
     echo '</div>
      </div>';         
            
            
            
            
            
            
            
            
   ///////////    http://stuweb.cms.gre.ac.uk/~fn3704c/index.php?search=&submit=&page=2
            
           //       http://stuweb.cms.gre.ac.uk/~fn3704c/index.php?page=2
            
            //http://stuweb.cms.gre.ac.uk/~fn3704c/index.php?search=page=2
            //http://stuweb.cms.gre.ac.uk/~fn3704c/index.php?search=&submit=page=2
        }
    
    

    
    
?>








</div>
<!-- Div container -->
<br>
<br>
<br>
