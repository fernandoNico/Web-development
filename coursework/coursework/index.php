<?php 
ob_start();
include_once 'header.php';
 ?>
	<br>
	<div class="container">
	
		<h1>Welcome to the Royal Borough of Greenwich</h1>
		<small><b>Our Goal: </b> Engage Commuters to reduce number of cars on the roads.</small>
	    <br />
	    <br />

		<div class="card bg-dark text-white">
  			<img class="card-img" src="./assets/greenwich.jpg" alt="Card image">
  				<div class="card-img-overlay">
				    <!-- <h4 class="card-title" style="color:blue;">Card title</h4>
				    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				    <p class="card-text">Last updated 3 mins ago</p> -->
				     
				    <!-- <a href="#" class="btn btn-success">See what's on</a> -->
  				</div>
		</div>
        <br />
        <br />
	

<form class="form-inline mx-auto" method="GET" action="index.php">
    <div class="input-group">
          <input class="form-control mr-xl-2" type="text" placeholder="Search" name="search" aria-label="Search">
          
          
    </div>
    <div class="input-group">  
         <button class="btn btn-primary my-2 my-sm-0" name="submit">Search</button>
    </div>
    <div  class="input-group">  
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
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Get or Provide a lift
            </label>
          </div>
      </div>
    
</form>


<?php 

if (isset($_REQUEST['submit'])) {
  include './includes/dbh.inc.php';

  $search = $_GET['search'];
  $terms = explode(" ", $search);
  $query="SELECT * FROM posts WHERE ";
  $i=0;
  foreach ($terms as $each) {
    $i++;
    if ($i==1) {
      $query .="starting_Point LIKE '%$each%' OR destination LIKE '%$each%' OR travel_Times LIKE '%$each%' OR days LIKE '%$each%' OR lift_Purpose LIKE '%$each%'";
    }else{
      $query .= " OR starting_Point LIKE '%$each%'  ";
    }
  }

  $result = mysqli_query($connex, $query);
  $resultNum =  mysqli_num_rows($result);

  if ($resultNum > 0 &&  $search!="") {
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

     echo ' <div class="card" >
                <div class="card-body">
                  <h4 class="card-title">'.$destination.'</h4>
                  <h6><span class="badge badge-pill badge-warning">'.$lift_purpose.'</span></h6>
                  <p class="card-text">'.$lift_purpose.'.</p>
                  <p class="card-text">'.$travel_times.'.</p>
                  <p class="card-text">'.$days.'.</p>

                  <a class="btn btn-success btn-sm " href="contactMember.php?memberID='. $userID.'">Contact Member</a> <br>
        
              </div>
              </div>';
    }
echo '</br>'; 
echo '</div>';


  }else{
    echo "No result";
  }


}else{

}


 ?>


















<hr>
        <br />
      <h2>Recent Posts</h2>
        <br />
                <div class="card-columns">
                <?php 
                        include './includes/dbh.inc.php';

                       //$sql = "SELECT * FROM posts WHERE  post_id ";
                       // $result = mysqli_query($connex, $sql);
                        //$resultCheck =  mysqli_num_rows($result);


                         $per_page = 6;
                         $pages_sql= "SELECT post_id FROM posts"; 
                         $result_sql = mysqli_query($connex, $pages_sql);
                         $pages = ceil(mysqli_num_rows($result_sql) / $per_page);
                         $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;
                         $start = ($page - 1) *  $per_page;

                         $sql = "SELECT * FROM posts LIMIT $start, $per_page"; 
                         $result = mysqli_query($connex, $sql);






                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {

                    ?>	

                        <div class="card ">
                              <img class="card-img-top" src="./assets/try.jpg" alt="Card image cap">
                              <div class="card-body">
                                    <h4 class="card-title"><?php echo $row["destination"]; ?></h4>
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
                        </div>

                    

                    <?php 
                                
                            }

                        }
echo '</div><br><br>';

echo '<div class="card text-center">
  <div class="card-body">';
    
 

$prev = $page - 1;
$next= $page + 1;


if (!($page<=1)) {
  echo "<a href='index.php?page=$prev'>Prev</a> ";
}
 if ($pages >=1) {
  for($x=1 ; $x <=$pages ; $x++){
    echo ($x == $page) ? '<b><a class="act" href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ' ;
  }
 }

 if (!($page>=$pages)) {
  echo "<a href='index.php?page=$next'>Next</a> ";
}
?>
</div>
</div>
                <br>
         

</div>



















</body>
</html>







