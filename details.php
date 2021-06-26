<!DOCTYPE html>
<?php
  // Create database connection
   $db = mysqli_connect("localhost", "biteuser", "Abs159..", "foodiliciousbite");


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  //$result = mysqli_query($db, "SELECT * FROM products where product_id =". $_GET['product_id']."");
  
  $sql_product = "SELECT P.product_id,P.title,P.date, P.details, P.price,P.contact, L.city,L.town, D.status from products P JOIN t_locations L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.delivery_scope_id=L.delivery_scope_id where P.product_id=".$_GET['product_id']."";
  $result_product = mysqli_query($db, $sql_product);
  $sql_images="SELECT image_name from t_images where product_id = ".$_GET['product_id']."";
  $result_images = mysqli_query($db,$sql_images);
  //$sql_product = "SELECT P.product_id,P.title, P.details, P.price, L.city,L.town, D.status from products P JOIN location L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.delivery_scope_id=L.delivery_scope_id where P.product_id=".$_GET['product_id']."";
  $result_product2 = mysqli_query($db, $sql_product);
 // $resultproduct= mysqli_query($db, "SELECT * from products where product_id =".$_GET['product_id']."");
  //$resultproduct2= mysqli_query($db, "SELECT * from products where product_id =".$_GET['product_id']."");
  //,products.price,products.serving,products.details,products.delivery

?>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Foodiliciousbite</title>
<meta name="description" content="">
<meta name="author" content="">
<SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
/* slider.js */

</script>
<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/detailpagestyle.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	

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
	  <ad2><a href="postyourad.php" ><sharemydish>Share My Dish</sharemydish></a></ad2></div>
        
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
		  
            <h1 style= 'color:#c20f0f;'>Foodiliciousbite</h1>
          </div>
		   
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Features Section -->
<body>
	
	<?php
//echo "<div id='main-holder'>";
echo "<div id='details-holder' class='container'>";	
	echo "</br></br></br></br>";  
	   echo"<div class='slider-holder'>";
        echo"<span id='slider-image-1'></span>";
        echo"<span id='slider-image-2'></span>";
        echo"<span id='slider-image-3'></span>";
        echo"<div class='image-holder'>";
                while ($row = mysqli_fetch_array($result_images)) {
   
				echo "<img  src='img/product_images/".$row['image_name']."' class='slider-image'>";
                }


	
	echo "</div>";
	 echo "<div class='button-holder'>";
     echo "<a href='#slider-image-1' class='slider-change'></a>";
           echo "<a href='#slider-image-2' class='slider-change'></a>";
            echo "<a href='#slider-image-3' class='slider-change'></a>";
        echo "</div>";
    	echo "</div>"; //ALL CLOSED
	



echo "<div id='restaurant-menu'>";
echo "<div class='container'>";
  

    while ($row = mysqli_fetch_array($result_product)) {
        
	    
        echo "<div class='menu-section'>";     
        
		echo "<div class= 'containership'>";
		echo "<div class='menu-item'>";
		
		echo "<div class='menu-item-name'><u>".$row['title']. "</u></div>";
        echo "<div class='menu-item-price'><b><i>Rs: </i>".$row['price']. "</b></div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		//echo "</div>";

      }

	echo "</div>"; //ALL CLOSED
	echo"</div>";


	
	
echo "<div id='restaurant-menu'>";
echo "<div class='container'>";
   
    while ($row3 = mysqli_fetch_array($result_product2)) {
        echo "<div class='img-container'>";     
        
		//echo "<div class= 'containership'>";


		//echo "<div class='menu-item'>";
         	
		echo "<div class='menu-item-description-title'><b><u>Description: </u></b></br> </div>";
		$details=implode(' ', array_slice(explode(' ', $row3['details']), 0, 20));
		//echo "$details";
		
        //$details=chunk_split($details, 100, "\r\n") ."\n";
		$details=wordwrap($details,100,"<br>\n", TRUE);
        echo "<div class='menu-item-description'>".ucfirst($details). "</div>";		
		date_default_timezone_set('UTC');
    	$date = new DateTime('now', new DateTimeZone('Asia/karachi'));
    	echo $date->format('Y-m-d H:i:s');

		echo "<div class='col-xs-12 col-sm-3' >";
		echo "<div class='menu-item-description-title'><b><u>Location </u></b></br> </div>";
        echo "<div class='menu-item-town'>".$row3['town']."</br></div> </div>";
		echo "<div class='col-xs-12 col-sm-3' >";
		
		echo "<div class='menu-item-description-title'><b><u>Delivering in: </u></b></br> </div>";
        echo "<div class='menu-item-town'>".$row3['status']. "</div></div>";
		echo "<div class='col-xs-12 col-sm-3' >";
		//echo "<div id='example1'>";

		echo "<div class='menu-item-description-title'><b><u>Contact seller at: </u></b></br> </div>";
        echo "<div class='menu-item-description'>".$row3['contact']. "</div> </div></div>";
		echo "</div>";
	    // echo "</div>";
      	echo "</div>";
	      }

//echo "</div>;
	echo "</div>";
	echo "</div>";
  
	  ?>
</div>

    <!---<div class="row">--->

		
      <!----</div>---->
    <!-----------------------
 echo "<div class='col-xs-12 col-sm-6'>";
     echo "<div class='menu-section'>";     
     //echo "<h2 class='menu-section-title'>" 	
		//echo "<h2 class='menu-section-title'>".$row['title']."</h2>";
		echo "<div class='menu-item'>";
		echo "<div class='menu-item-name'>".$row['title']. "</div>";
		echo "<div class='menu-item-price'> Rs.".$row['price']. "</div>";
		echo "<div class='menu-item-description'>" .$row['details']. "</div>";
		echo "</br> <p> Category:</p>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	----------------->
    

<!-- Gallery Section 

<div id="gallery">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/01.jpg" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/02.jpg" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/03.jpg" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/04.jpg" class="img-responsive" alt=""></div>
      </div>
    </div>
  </div>
</div>
<!-- Team Section -->

<!-- Contact Section -

<div id="footer">
  <div class="container text-center">
    
  </div>
</div>
---->
<div id="footer">
  <div class="container text-center">
    <div class="col-md-6">
<p> <a href="index.php" rel="nofollow">Foodiliciousbite</a> bringing variety of food to people. <a href="http://www.seekgif.com/free-image/food-background-for-slides-2768.html">(Source Image)</a></p>
    
    </div></div></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>


</body>
</html>

