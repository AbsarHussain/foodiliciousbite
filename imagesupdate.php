<?php
 include('config.php'); 

for ($x = 561; $x <= 824; $x++) {
$id=$x;
    $query = "update t_images set thumbnail3=1 where product_id=".$id."";
	//$query = "select image_name from  t_images  where product_id=".$id." LIMIT 1";
	echo $query. "\n";
	$result = mysqli_query($db, $query);
// 	echo mysqli_error($query);
	$row = mysqli_fetch_array($result);
   
    if (!$result) {
   printf("Errormessage: %s\n", $mysqli->error);
}
// 	if($query == True)
// { 
//     echo "Update for ".$x.""; 
// }
}
?>