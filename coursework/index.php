<?php 
include_once 'header.php';
 ?>

<div class="container"></div>
<h1> Home Page</h1>

<?php
if (isset($_SESSION['u_id'])) {
	echo "You are logged in";
	# code...
} else {
	# code...
}

?>

</body>
</html>