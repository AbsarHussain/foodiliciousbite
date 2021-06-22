<?php
 session_start(); 
 //dbname here
$db = mysqli_connect("mysql.foodiliciousbite.com", "biteuser", "Abs159..", "foodiliciousbite");
  if (isset($_POST['saveeditshop'])) {
	 
  	// Get image names
	$shop_id = mysqli_real_escape_string($db, $_POST['shop_id']);
	$user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $shop_image = $_FILES['shop_image']['name'];
	$shop_name = mysqli_real_escape_string($db, $_POST['shop_name']);
	$currency = mysqli_real_escape_string($db, $_POST['currency']);
	$shop_location_status=mysqli_real_escape_string($db, $_POST['shop_location_status']);
 	$shop_lat = mysqli_real_escape_string($db, $_POST['shop_lat']);
	$shop_long = mysqli_real_escape_string($db, $_POST['shop_long']);   
	$shop_note = mysqli_real_escape_string($db, $_POST['shop_note']);
	$shop_town = mysqli_real_escape_string($db, $_POST['shop_town']);
	$shop_contact = mysqli_real_escape_string($db, $_POST['shop_contact']);
    $shop_contact= str_replace(' ', '', $shop_contact);
    $shop_contact= str_replace('-', '', $shop_contact);
	$shop_whatsapp = mysqli_real_escape_string($db, $_POST['shop_contact']);
    $shop_whatsapp= str_replace(' ', '', $shop_contact);
    $shop_whatsapp= str_replace('-', '', $shop_contact);	
	$city_country=mysqli_real_escape_string($db, $_POST['city_country']);
	$city_country_code=explode("/",$city_country);
	if(count($city_country_code)==2){
	$city=$city_country[0];
	$country=$city_country[1];}
	elseif(count($city_country_code)<2 or count($city_country_code)>2){
		echo "<script>
alert('Select The country city from the Provided list');
window.location.href='myshops.php';
	</script>";
	}
		
		
	
	$city_name=$city_country_code[0];
	$country_name=$city_country_code[1];

	$query_city_country="Select CO.country_id,CT.city_id from t_country CO join t_cities CT on  
	CT.country_id=CO.country_id where CO.country_name='".$country_name."' and CT.city_name='".$city_name."' LIMIT 1";
	$result_city_country=mysqli_query($db,$query_city_country)	;
	 if(mysqli_num_rows($result_city_country)== 0 ){
		 echo "<script>
alert('Unknown City And Country \\nSelect The country city from the Provided list');
window.location.href='createshop.php';
</script>"; 
		 
	 }
	
	
	while ($row_city_country=mysqli_fetch_array($result_city_country)){
		$city_id=$row_city_country['city_id'];
		$country_id=$row_city_country['country_id'];
		}


	//$date=TO_DATE('$date', 'DD/MM/YYYY HH/MM/SS')
  	//if($executed==false){
	if($shop_location_status==0){
	$sql = "UPDATE t_shops set user_id='$user_id',shop_name='$shop_name',shop_contact='$shop_contact',shop_whatsapp='$shop_whatsapp',shop_note='$shop_note',shop_town='$shop_town',shop_city='$city_id',shop_country='$country_id',shop_currency='$currency' where shop_id=$shop_id";
  	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	 echo "<script>
alert('Unable To Create Shop, Feel Free To Contact Us on 923322075131 or on facebook Page For Any Help ');
window.location.href='createshop.php';
</script>"; 
	}
	}
	elseif($shop_location_status==1){
	$sql = "UPDATE t_shops set user_id='$user_id',shop_name='$shop_name',shop_contact='$shop_contact',shop_whatsapp='$shop_whatsapp',shop_note='$shop_note',shop_town='$shop_town',shop_city='$city_id',shop_country='$country_id',shop_currency='$currency',shop_lat='$shop_lat',shop_long='$shop_long' where shop_id=$shop_id";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	 echo "<script>
alert('Unable To Create Shop, Feel Free To Contact Us on 923322075131 or on facebook Page For Any Help ');
window.location.href='createshop.php';
</script>"; 
	}
	}

	//$product_sql= $db->query($sql);
	
	
	if($shop_image!=""){
	$target = "img/shop_images/".$shop_id."_".basename($shop_image);
	}
	
	if($shop_image!=""){
	$image_temp= $shop_id."_".$shop_image;
	}
	
	//echo $target . $target2.$target3;
	//echo $image2.$image.$image3;
	if($shop_image!=""){
	if (move_uploaded_file($_FILES['shop_image']['tmp_name'], $target)) {}
	$delete_images_sql = "Update t_images set status='DELETED' where shop_id=$shop_id";
	if($db->query($delete_images_sql) == TRUE)
	{$delete_images_sql=True;
	  
	}
	
	$sql = "INSERT INTO t_images(shop_id,image_name,status) VALUES ('$shop_id','$image_temp','NOT DELETED')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;
	  
	}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}}
	header("Location: shops.php?shop_id=".$shop_id."")  ;  

	echo ' <br>'.$last_id;
	echo '<br>'.$target;
	echo '<br>'.$image_temp;
	echo '<br>'.$user_id;
    echo '<br>'.$shop_image ;
    echo '<br>'.$shop_town ;
	echo '<br>'.$shop_name ;
	echo '<br>'.$shop_note ;
	echo '<br>'.$shop_contact.'/'.$currency ;
	echo '<br>'.$city_country;
	echo '<br>'.$city_name;
	echo '<br>'.$country_name;
	echo '<br>'.$city_id;
	echo '<br>'.$country_id;
	  
    	
	
	}
	
	?>