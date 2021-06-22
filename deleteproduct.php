<?php
    session_start();
    ?>
<?php
  // Create database connection
  include('config.php'); 
//include('config.php'); 
$user_id=$_SESSION["user_id"];
$_SESSION["url"] = $_SERVER["REQUEST_URI"]."";

  $location="shop_images";
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...

if(isset($_GET['id']) ){
	$id=$_GET['id'];
	$code=explode("-",$id);
	$product_id=$code[0];
	$shop_id=$code[1];
	$user_id=$code[2];
	 $sql = " Update products set status='DELETED' where product_id=$product_id and shop_id=$shop_id and user_id=$user_id";

	
     
	 $result = mysqli_query($db, $sql);
	sleep(1);
	echo "<script>
			window.location.href='myproducts.php';
			</script>";
	}
	else{
	echo "<script>
			window.location.href='myproducts.php';
			</script>";
		
	}


		
    
	 
	
   

?>
