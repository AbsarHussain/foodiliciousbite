<?php
include('config.php');
 if (isset($_POST['upload'])) {
	  

		$msg = "";
	$title="No Title Post add";
	$city="";
	$serving="";
	$contact="";
	$price="";
	$tag="";
	$town="";
	$details="Details not Provided";
	$category="";
	$delivery_scope_id="1";
	$deletionid= ((int)(date("d")))*((int)(date("m")))*((int)(date("sa")))*((int)(date("i")));
	$user_id = '';
	//$title = mysqli_real_escape_string($db, $_POST['title']);
	//$serving = mysqli_real_escape_string($db, $_POST['serving']);
	$ingredients= '';
	$details= '';
	$shop_id= '' ; 
	  
    echo "<script type='text/javascript'>alert('Processing Your Request'</script>";		 
  	// Get image names
  	$executed=false;
  	// Get text
  	$image = $_FILES['image']['name'];
	$image2 = $_FILES['image2']['name'];
	$image3 = $_FILES['image3']['name'];
	$image4 = $_FILES['image4']['name'];
	$image5 = $_FILES['image5']['name'];
	$image6 = $_FILES['image6']['name'];
    
    // if ($image3==null){$image3=$image2; if ($image4==null){ $image4=$image1;} if ($image5==null){$image5=$image3;} if ($image6==null){$image6=$image3; }}
    // if ($image4==null){ $image4=$image1;if($image5==null){ $image5=$image2;} if($image6=null){$image6=$image3; }}
    // if ($image5==null){$image5=$image3; if($image6==null){$image6=$image1;} }
    // if ($image6==null){$image6=$image3; }
	
	echo "<script type='text/javascript'>alert('Processing Your Request'</script>";
	$user_id = mysqli_real_escape_string($db, $_POST['user_id']);
	$title = mysqli_real_escape_string($db, $_POST['title']);
    
	$serving = mysqli_real_escape_string($db, $_POST['serving']);
	//$contact1 = mysqli_real_escape_string($db, $_POST['contact1']);
	
	$price = mysqli_real_escape_string($db, $_POST['price']);
	//$tag = mysqli_real_escape_string($db, $_POST['tag']);
	//$town = mysqli_real_escape_string($db, $_POST['town']);
	$category= mysqli_real_escape_string($db, $_POST['category']);
	$details= mysqli_real_escape_string($db, $_POST['details']);
	$shop_id= mysqli_real_escape_string($db, $_POST['shop_id']);
	$delivery_charges= mysqli_real_escape_string($db, $_POST['deliverycharges']);
	$delivery_time= mysqli_real_escape_string($db, $_POST['deliverytime']);
	//echo "<script type='text/javascript'>alert('".$title."!')</script>";	
	$delivery_scope_id= mysqli_real_escape_string($db, $_POST['delivery']);
    //$del_time_from= mysqli_real_escape_string($db,$_POST['del_time_from']);
  	//$del_time_to= mysqli_real_escape_string($db,$_POST['del_time_to']);
	//$del_time_from=strtotime( $del_time_from);
	//$del_time_to=strtotime( $del_time_to);
	// image file directory
	$product_sql=False;
	$location_sql=False;
	$image_sql=False;
// 	date_default_timezone_set('UTC');
// 	$date = new DateTime('now', new DateTimeZone('Asia/karachi'));
// 	echo $date->format('Y-m-d H:i:s');
	
// 	CURDATE()''
  	//if($executed==false){
	
	$sql = "INSERT INTO products( user_id, shop_id, title,  serving,  price,details,delivery_time,delivery_charges,category,delivery_scope_id, 
	updated_date,date,status ) VALUES 
	( '$user_id','$shop_id','$title',   '$serving', '$price', '$details','$delivery_time','$delivery_charges','$category',$delivery_scope_id ,   CURDATE(), CURDATE(), 'NOT DELETED')";
  	
	//$product_sql= $db->query($sql);
	if($db->query($sql) == TRUE)
	{echo "done";}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
		
    $last_id = $db->insert_id;
	$product_id=$last_id;
	echo 'here i am ,'.$image.''.$last_id.'</br>'.$user_id,'</br>'.$title.',</br>'.$serving.',</br> '.$contact.', </br>'.$price.', </br>'.$details.', </br>'.$tag.',</br>'.$category.',  </br> '
.$deletionid.'</br>'.$delivery_scope_id;
	$target = "img/product_images/".$last_id."_".basename($image);
    $target2 = "img/product_images/".$last_id."_".basename($image2);
	$target3 = "img/product_images/".$last_id."_".basename($image3);
    $target4 = "img/product_images/".$last_id."_".basename($image4);
    $target5 = "img/product_images/".$last_id."_".basename($image5);
	$target6 = "img/product_images/".$last_id."_".basename($image6);
    $target_thumbnail = "img/thumbnail/".$last_id."_".basename($image);
	//echo $target . $target2.$target3;
	//echo $image2.$image.$image3;
    if (!empty($image) ){ 
	$image_temp= $last_id."_".$image;
	$image_temp2= $last_id."_".$image2;
	
	if($image3!=null){
	$image_temp3= $last_id."_".$image3;}
	else{
		$image_temp3="main_photo.jpg";
	}
	if($image4!=null){
	$image_temp4= $last_id."_".$image4;}
	else{
		$image_temp4="main_photo.jpg";
	}
		if($image5!=null){
	$image_temp5= $last_id."_".$image5;}
	else{
		$image_temp5="main_photo.jpg";
	}
		if($image6!=null){
	$image_temp6= $last_id."_".$image6;}
	else{
		$image_temp6="main_photo.jpg";
	}
	$sql = "INSERT INTO t_images(product_id,image_name,thumbnail,status) VALUES 
	('$last_id','$image_temp','True','NOT DELETED'),
	('$last_id','$image_temp2',NULL,'NOT DELETED'),
	('$last_id','$image_temp3',NULL,'NOT DELETED'),
	('$last_id','$image_temp4',NULL,'NOT DELETED'),
	('$last_id','$image_temp5',NULL,'NOT DELETED'),
	('$last_id','$image_temp6',NULL,'NOT DELETED')";
    
	if($db->query($sql) == TRUE)
	{$product_sql=True;
	
  // Getting file name
  $filename = $image;
  // Valid extension
  $valid_ext = array('png','jpeg','jpg');
  // Location
  $location = $target_thumbnail;
  // file extension
  $file_extension = pathinfo($location, PATHINFO_EXTENSION);
  $file_extension = strtolower($file_extension);
  // Check extension
  if(in_array($file_extension,$valid_ext)){

    // Compress Image
    $source=$_FILES['image']['tmp_name'];
    //compressImage($source,$location,60);
	$source=$_FILES['image']['tmp_name'];
	$destination=$location;
	$quality=12;
	  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

  }else{
    echo "Invalid file type.";
  }  
  function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}

	    
	    
	}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
        
    }
	
     
	$sql = "INSERT INTO t_locations (product_id , availability_rank) VALUES ('$last_id' , '$delivery_scope_id')";
	                                                          
	
	
	
	$executed=true; //garbage
	//
	

    
  	mysqli_query($db, $sql);

	if($_FILES['image']!=null)
	{
 	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {}
	}
	if($_FILES['image2']!=null)
	{
	if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2)){}
	}
	if($_FILES['image3']!=null)
	{		if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3)){}
	}if($_FILES['image4']!=null)
	{			if (move_uploaded_file($_FILES['image4']['tmp_name'], $target4)){}
	}
	if($_FILES['image5']!=null)
	{				if (move_uploaded_file($_FILES['image5']['tmp_name'], $target5)){}
	}
	if($_FILES['image6']!=null)
	{					if (move_uploaded_file($_FILES['image6']['tmp_name'], $target6)){}
	}			
	
 
	}
 
	
  ?>
<?php

echo $product_id.'</br>'.$user_id,'</br>'.$title.',</br>'.$serving.',</br> '.$contact.', </br>'.$price.', </br>'.$details.', </br>'.$tag.',</br>'.$category.',  </br> '
.$deletionid.'</br>'.$delivery_scope_id;
echo "<script>location='shops.php?shop_id=".$shop_id."&product_id=".$product_id."'</script>";

/* Make sure that code below does not get executed when we redirect. */
exit;
?> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>