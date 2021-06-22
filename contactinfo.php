<?php
session_start(); 
include('config.php');


$rowperpage = 10;
 
		$query = "select method,contact,shop_id,product_id from t_contact_pressed"; 
		
  $result = mysqli_query($db, $query);
  $count=0;
 while ($row = mysqli_fetch_array($result)){
		$count++;
        $method=$row['method'];
        $contact=$row['contact'];
		$shop_id=$row['shop_id'];
		$product_id=$row['product_id'];
        echo $count.' Contact ='.$contact.' shop_id ='.$shop_id.' product_id ='.$product_id.' method ='.$method.'</br>';

 }
   

?>
