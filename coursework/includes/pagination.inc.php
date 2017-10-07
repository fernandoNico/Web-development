<?php

 include_once 'dbh.inc.php'; 
 
 $per_page = 6;
 $pages_sql= "SELECT post_id FROM posts"; 
 $result_sql = mysqli_query($connex, $pages_sql);
 $pages = ceil(mysqli_num_rows($result_sql) / $per_page);
 $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;
 $start = ($page - 1) *  $per_page;

 $sql = "SELECT * from posts LIMIT $start, $per_page"; 
 $result = mysqli_query($connex, $sql);


 while ($row = mysqli_fetch_assoc($result )) {

 	echo '<h6>'. $row['destination'] . '</h6>';
 }


$prev = $page - 1;
$next= $page + 1;


if (!($page<=1)) {
	echo "<a href='pagination.inc.php?page=$prev'>Prev</a> ";
}


 if ($pages >=1) {
 	for($x=1 ; $x <=$pages ; $x++){
 		//echo '<a href="?page='.$x.'">'.$x.'</a>  ';
 		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ' ;
 	}
 }


 if (!($page>=$pages)) {
	echo "<a href='pagination.inc.php?page=$next'>Next</a> ";
}



















// session_start();

// if (isset($_POST['submit'])) {

//    include_once 'dbh.inc.php'; 
// $i = $_REQUEST['deletepostId'];
	 

         
//             $sql = "DELETE FROM posts WHERE post_id=' $i' "; 
//             mysqli_query($connex, $sql);
//             echo '<script>alert("Item Removed")</script>';  
//             //header("Location: ./memberPage.php?delete=success");
//             //exit();
//     echo '<script>window.location=" ../memberPage.php"</script>';
         


// }else{
// 	header("Location: ../index.php?delete=errrores");
// 	exit();
// }

?>