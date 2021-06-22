<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title >Foodstreet</title>
<meta name="description" content="">
<meta name="author" content="">

<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/postyouradstyle.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
   ==========================================-->
   

   
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
 
 <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <ad><a href="index.php" ><sharemydish>HOME</sharemydish></a></ad></div>
        
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>

<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1 style= 'color:#c20f0f; font-family:Blossoms;'>Foodstreet</h1>
            
          </div>
        </div>
      </div> 
    </div>
  </div>
</header>

<h1>Your Product has been added to the list </h1>
  <div class="intro" align= "middle">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
		 
</br></br></br>
<div id="content">
  
 </div>
  </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
    
  // Create database connection
  $db = mysqli_connect("localhost", "biteuser", "Abs159..", "foodiliciousbite");

  $executed=true;
  // Initialize message variable
  $msg = "";
  $title="No Title";
  $city="";
  $serving="";
  $contact="";
  $price="";
  $tag="";
  $details="Details not Provided";
  $category="";
  $delivery_scope_id="1";
  $deletionid= ((int)(date("d")))*((int)(date("m")))*((int)(date("sa")))*((int)(date("i")));

  //*date("m")*date("sa")*date("i");
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
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
	$title = mysqli_real_escape_string($db, $_POST['title']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
	$serving = mysqli_real_escape_string($db, $_POST['serving']);
	//$contact1 = mysqli_real_escape_string($db, $_POST['contact1']);
	$contact = mysqli_real_escape_string($db, $_POST['contact']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$tag = mysqli_real_escape_string($db, $_POST['tag']);
	$category= mysqli_real_escape_string($db, $_POST['category']);
	$details= mysqli_real_escape_string($db, $_POST['details']);
	$town= mysqli_real_escape_string($db, $_POST['town']);
	$town=str_replace("-"," ",$town);
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
	$sql = "INSERT INTO products( title,  serving, contact, price,details,tags,category, deletionid,updated_date,date ) VALUES ( '$title',   '$serving', '$contact', '$price', '$details', '$tag','$category',   '$deletionid', CURDATE(), CURDATE())";
  	
	//$product_sql= $db->query($sql);
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
		
    $last_id = $db->insert_id;
	$target = "img/product_images/".$last_id."_".basename($image);
    $target2 = "img/product_images/".$last_id."_".basename($image2);
	$target3 = "img/product_images/".$last_id."_".basename($image3);
    $target4 = "img/product_images/".$last_id."_".basename($image4);
    $target5 = "img/product_images/".$last_id."_".basename($image5);
	$target6 = "img/product_images/".$last_id."_".basename($image6);
    $target_thumbnail = "thumbnail/".$last_id."_".basename($image);
	//echo $target . $target2.$target3;
	//echo $image2.$image.$image3;
    if (!empty($image) ){ 
	$image_temp= $last_id."_".$image;
	$sql = "INSERT INTO t_images(product_id,image_name,thumbnail) VALUES ('$last_id','$image_temp','True')";
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
	$quality=5;
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
	
    if (!empty($image) && empty($image2) && empty($image3))
    { 
	$image_temp= $last_id."_".$image;
    $image2_temp= $last_id."_".$image2;
    $image3_temp= $last_id."_".$image3;	
    //$sql = "INSERT INTO t_location(product_id, city, town, delivery_scope_id) VALUES ('$last_id','$city', '$town','$delivery_scope_id')";
	$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	//echo "We've recived your contact information";
	}
	
	elseif (!empty($image) && !empty($image2) && !empty($image3))
	{ 
	$image_temp= $last_id."_".$image;
    $image2_temp= $last_id."_".$image2;
    $image3_temp= $last_id."_".$image3;	
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES  ('$last_id','$image2_temp'),('$last_id','$image3_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;
	
   
	    
	    
	}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	}
	elseif (!empty($image) && !empty($image2) && empty($image3))
	{ 
	$image_temp= $last_id."_".$image;
    $image2_temp= $last_id."_".$image2;
    $image3_temp= $last_id."_".$image3;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image2_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	//$image_sql= $db->query($sql);
	
	//echo "<script type='text/javascript'>alert('submitted successfully this time again!')</script>";
	//echo "We've recived your contact information";
	}
    if (!empty($image4) && empty($image5) && empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town, delivery_scope_id) VALUES ('$last_id','$city', '$town','$delivery_scope_id')";
	$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (!empty($image4) && !empty($image5) && empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image_temp'), ('$last_id','$image5_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	//$image_sql= $db->query($sql);
	
	//echo "<script type='text/javascript'>alert('submitted successfully this time again!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (!empty($image4) && empty($image5) && !empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image_temp'), ('$last_id','$image6_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	//$image_sql= $db->query($sql);
	
	//echo "<script type='text/javascript'>alert('submitted successfully this time again!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (empty($image4) && !empty($image5) && !empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image5_temp'), ('$last_id','$image6_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	//$image_sql= $db->query($sql);
	
	//echo "<script type='text/javascript'>alert('submitted successfully this time again!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (empty($image4) && !empty($image5) && empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town, delivery_scope_id) VALUES ('$last_id','$city', '$town','$delivery_scope_id')";
	$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image5_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (empty($image4) && empty($image5) && !empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town, delivery_scope_id) VALUES ('$last_id','$city', '$town','$delivery_scope_id')";
	$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image6_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	//echo "We've recived your contact information";
	}
	elseif (!empty($image4) && !empty($image5) && !empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
	$sql = "INSERT INTO t_images(product_id,image_name) VALUES ('$last_id','$image_temp'), ('$last_id','$image5_temp'),('$last_id','$image6_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	} 
	elseif (empty($image4) && empty($image5) && !empty($image6)){ 
	$image_temp= $last_id."_".$image4;
    $image5_temp= $last_id."_".$image5;
    $image6_temp= $last_id."_".$image6;	
    //$sql = "INSERT INTO t_location(product_id, city, town) VALUES ('$last_id','$city', '$town')";
		$sql = "INSERT INTO t_images(product_id,image_name) VALUES  ('$last_id','$image6_temp')";
	if($db->query($sql) == TRUE)
	{$product_sql=True;}
    else{
	echo "<script type='text/javascript'>alert('Unable to add Product details!')</script>";	
	}
	//$image_sql= $db->query($sql);
	
	//echo "<script type='text/javascript'>alert('submitted successfully this time again!')</script>";
	//echo "We've recived your contact information";
	}
	

	 
	$sql = "INSERT INTO t_locations (product_id , city, town, availability_rank) VALUES ('$last_id', '$city' , '$town' , '$delivery_scope_id')";
	                                                          
	
	
	
	$executed=true; //garbage
	//
	

    
  	mysqli_query($db, $sql);

	
 	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		if (move_uploaded_file($_FILES['image2']['tmp_name'], $target2)){
			if (move_uploaded_file($_FILES['image3']['tmp_name'], $target3)){
				if (move_uploaded_file($_FILES['image4']['tmp_name'], $target4)){
					if (move_uploaded_file($_FILES['image5']['tmp_name'], $target5)){
						if (move_uploaded_file($_FILES['image6']['tmp_name'], $target6)){
				
  		$msg = "Image uploaded successfully";
		
  	}
		else{}
		}
	else{}
		}
		else{}

	
	}
	else{}
		}
		else{}
	}
	else {}
 
	}
  
	
  ?>
<?php
$last_id=$last_id."-".$deletionid;
header("Location: mynewproduct.php?product_id=".$last_id.""); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
?> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>