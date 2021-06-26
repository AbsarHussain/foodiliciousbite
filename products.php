<?php
    session_start();
    ?>
<?php
  // Create database connection
  include('config.php'); 
//include('config.php'); 

$_SESSION["url"] = $_SERVER["REQUEST_URI"]."";

  $location="shop_images";
  // Initialize message variable
  $msg = "";
	if(isset($_GET['lat']) && isset($_GET['long'])){
	$user_lat=$_GET['lat']; 
	$user_long=$_GET['long'];
	$_SESSION["lat"]=$user_lat; 
	$_SESSION["long"]=$user_long;
	}
	elseif(isset($_SESSION["lat"]) && isset($_SESSION["long"])){
	$user_lat='24.5'; 
	$user_long='24.5';

	}
	else{
	echo "<script>
			window.location.href='index.php';
			</script>";
		
	}
  // If upload button is clicked ...
   $rowperpage = 20;
    $count=0;
            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM products";
            $allcount_result = mysqli_query($db,$allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = 20;
		    $allcount_fetch['allcount'];
			$search_city = 'karachi';
		  //$search_city =$_GET['location'];  
            // select first 3 posts
            //$query = "SELECT P.product_id,P.title, P.details, P.price, L.city, L.town, D.status from products P JOIN location L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.delivery_scope_id=L.delivery_scope_id where L.city =".$_GET['location']." ORDER BY P.product_id DESC LIMIT 10";
   


  if(isset($_POST['submit-search'])){
	 $location="product_images";
     $search_title = mysqli_real_escape_string($db, $_POST['title']);
	 $search_category= mysqli_real_escape_string($db, $_POST['category']);
	 $sql=null;

	 if( !$search_title==null and $search_category==null){	
     $sql = "select P.product_id, (select  image_name from t_images where product_id = P.product_id limit 1)
	 AS thumbnail, P.title as Name,P.details as Details ,P.price as price, C.category_name as categoryname,S.shop_id,
	 S.shop_name ,((ABS(S.shop_lat-".$user_lat.")+ABS(S.shop_long-".$user_long."))*100) as distance
	 from products P left join t_category C on P.category=C.category_id 
	 JOIN t_shops S on P.shop_id=S.shop_id 
	 where (P.title like '%$search_title%' OR P.details like '%$search_title%') and
	 P.status='NOT DELETED' and S.shop_lat!='' and S.shop_long!=''  ORDER BY distance ASC ";
	 
	 }
	
	elseif(!$search_title==null and !$search_category==null){
		$sql = "select P.product_id, (select  image_name from t_images where product_id = P.product_id limit 1)
	 AS thumbnail, P.title as Name,P.details as Details ,P.price as price, C.category_name as categoryname,S.shop_id,
	 S.shop_name ,((ABS(S.shop_lat-".$user_lat.")+ABS(S.shop_long-".$user_long."))*100) as distance
	 from products P left join t_category C on P.category=C.category_id 
	 JOIN t_shops S on P.shop_id=S.shop_id 
	 where (P.title like '%$search_title%' OR P.details like '%$search_title%') 
	 and P.category = '$search_category' and P.status='NOT DELETED'  and S.shop_lat!='' and S.shop_long!='' 
	 ORDER BY distance ASC ";
	 
		
		
	}
    elseif($search_title==null and !$search_category==null){
		$sql = "select P.product_id, (select  image_name from t_images where product_id = P.product_id limit 1)
	 AS thumbnail, P.title as Name,P.details as Details ,P.price as price, C.category_name as categoryname,S.shop_id,
	 S.shop_name ,((ABS(S.shop_lat-".$user_lat.")+ABS(S.shop_long-".$user_long."))*100) as distance
	 from products P left join t_category C on P.category=C.category_id 
	 JOIN t_shops S on P.shop_id=S.shop_id 
	 where P.category = '$search_category' and P.status='NOT DELETED'  and S.shop_lat!='' and S.shop_long!='' 
	 ORDER BY distance ASC ";
	 
		
		
	}
	 else {
     $sql = "select P.product_id, (select  image_name from t_images where product_id = P.product_id limit 1)
	 AS thumbnail, P.title as Name,P.details as Details ,P.price as price, C.category_name as categoryname,S.shop_id,
	 S.shop_name ,((ABS(S.shop_lat-".$user_lat.")+ABS(S.shop_long-".$user_long."))*100) as 'distance'
	 from products P left join t_category C on P.category=C.category_id 
	 JOIN t_shops S on P.shop_id=S.shop_id where  P.status='NOT DELETED' and S.shop_lat!='' and S.shop_long!='' 
	 ORDER BY distance ASC  ";
	 //$sql = "SELECT P.product_id,(select  image_name from t_images where product_id = P.product_id limit 1) AS image_name,P.title, P.details, P.price, L.city,L.town, D.status from products P JOIN t_locations L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.availability_rank=L.delivery_scope_id ORDER BY P.product_id DESC LIMIT 80 ";
     }
     
	 $result = mysqli_query($db, $sql);
	 }
	 else{
		   $query = "select '' as product_id,S.shop_name as Name,S.shop_note as Details,S.shop_id,
		S.shop_currency,((ABS(S.shop_lat-".$user_lat.")+ABS(S.shop_long-".$user_long."))*100) as 'distance',
		SIM.image_name as thumbnail
		from t_shops S 
		LEFT JOIN t_images SIM ON SIM.shop_id=S.shop_id
        where S.shop_lat is not NULL and SIM.status='NOT DELETED' 
		order by distance ASC ";
  
    $result = mysqli_query($db, $query);
		 
	 }
   

?>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title >Foodiliciousbite - Get Home Made Food and Other Food Items Through Whatsapp In Pakistan</title>
<meta name="description" content="">
<meta name="author" content="">

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
<link rel="stylesheet" type="text/css"  href="css/productspagestyless_updated.css"><!-- Naem Updated to clear cache correct reset -->
<link rel="stylesheet" href="carousel/css/style.css"> <!-- CSS reset -->
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">
<link rel="icon" type="image/png" href="images/icons/foodiliciousbitelogo.png"/>


<link rel="stylesheet" href="filterpanel/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="filterpanel/css/styles.css"> <!-- Resource style -->
	<script src="filterpanel/js/modernizr.js"></script> <!-- Modernizr -->
  	


	  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="kusina/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="kusina/css/animate.css">
    
    <link rel="stylesheet" href="kusina/css/owl.carousel.min.css">
    <link rel="stylesheet" href="kusina/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="kusina/css/magnific-popup.css">

    <link rel="stylesheet" href="kusina/css/aos.css">

    <link rel="stylesheet" href="kusina/css/ionicons.min.css">

    <link rel="stylesheet" href="kusina/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="kusina/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="kusina/css/flaticon.css">
    <link rel="stylesheet" href="kusina/css/icomoon.css">
    <link rel="stylesheet" href="kusina/css/style.css">
	
	<script src="kusina/js/modernizr.js"></script> <!-- Modernizr -->
	<link rel="icon" type="image/png" href="images/icons/foodiliciousbitelogo.png"/>
	
	</head>


<body>

     

    			
  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Foodiliciousbite</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="postyourad.php" class="nav-link">Sell Your Dish</a></li>
				<li class="nav-item"><a href="createshop.php" class="nav-link">Create Eatery</a></li>
				
				
	        	
	        	
	        	
	          <li class="nav-item"><a href="myshops.php" class="nav-link">My Eateries</a></li>
	          <?php if (isset($_SESSION['username']))
			  {echo "<li class='nav-item'><a href='myproducts.php' class='nav-link'>My Products</a></li>";
			  echo "<li class='nav-item'><a href='logout.php?logout=1' class='nav-link'>Logout</a></li>";
			  }
	          else {
	            echo "<li class='nav-item'><a href='signin.php' class='nav-link'>Login</a></li>";
	            
	        }
	          
	          ?>
			  <li class="nav-item"><a href="How-it-works.html" class="nav-link">How To</a></li>
	        </ul>
			
	      </div>
	    </div>
		
	  </nav>


    <section class="hero-wrap hero-wrap-2" style="background-image: url('img/shop_images/main_photo.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            
            
          </div>
        </div>
      </div>
    </section>

</br>
</br>
</br>
		
	
	   

<!--<marquee><h5><b>Please View These Instructions For Better Usage: ------------------     Welcome To <u>Foodiliciousbite.com</u> ------------------------    You Can Buy Home Made Food As Per Your Requirement(s).  ------------------------ There Is A filter Panel On The Left Use That Panel To Search For the Dish You Want ------------------------ There Are More Than One Seller ------------------------And You Can Check With More Than One And Confirm With The One You Like     ------------------------    We Recommend You Order 2-3 Hours Before  and For Better Custom Orders Confirm A Day Before ------------------------Every Kitchen Has Its Own Menu ------------------------Thank You ------------------------</b></h5></marquee>		-->
<main class="cd-main-content">
		
			<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">

				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
	

<div id="restaurant-menu">
  <div class="container">
    

	
    <div class="row">
          
	 <?php
	 $count=0;
    while ($row = mysqli_fetch_array($result)) {
   //echo "<div id='restaurant-menu-background'>";		
		$allcount=300;
		$product_id=$row['product_id'];
		$shop_id=$row['shop_id'];
		$Name=$row['Name'];
        $thumbnail=$row['thumbnail'];
		$Details=$row['Details'];
$Details = substr($Details,0,100);		
$distance=ceil($row['distance']);
 if ( intval($distance)>40000) {
    break;
  }
		
		////if($title_check != 'No Search Record Matched'){
    // echo "<div class='post'>"  ;      
	 //echo "<div class='menu-section' >";     
	
	    echo "<div class='col-xs-12 col-sm-3' >";
     	//echo"<div id='example2'>";
		
        //echo "</div>";
		echo "<div class='menu-item' id='rounded_corners'>";
		
		echo"<div id='example1'>";
        echo "<img   id='rounded_corners' style=object-fit: contain' src='img/shop_images/main_photo.jpg'>";
		
        //$title=chunk_split($title, 20) ."\n";
		echo "<a  href='shops.php?shop_id=".$shop_id."&product_id=".$product_id."' ><div class='menu-item-name'><b>".$Name. "</b></a></div>";
		
		
		
		
		
		
// 		$details=substr($details, 0, 150);
        
		//$details=chunk_split($details, 29) ."\n";
		//$details=implode(' ', array_slice(explode(' ', $row['details']), 0, 5));
		
        
		echo "<div class='menu-item-description'>" .$Details. "</div>";
    
		echo "<div class='menu-item-status'>";
		
		echo "<b>".$distance." km Away</b></div>";

		//echo "<div class='menu-item-description'>".$row['city']."</b></div>";
		//echo '<span class="circle-tag" ><img   style="width:4px;height:48px;"  src="http://metropolitanhost.com/themes/themeforest/html/quickmunch/assets/img/svg/010-heart.svg"></span>';
		
		echo "<div class='menu-item-price'><b> </b></div>";
		
		echo "</div>";

		echo "</div>";
		echo"</div>";
      }
  ?>
    

      </div>
      
    </div>
	
  <!--<h1 class="load-more">Load More</h1>-->
   
  </div>
  	</ul>
	<!------		<div class="cd-fail-message">No More results found</div>-------->
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form action="products.php" method="POST">
				<div class="cd-filter-block">
					<h4>Dish Name</h4>
					
					<div class="cd-filter-content">
						<input name="title" type="search" placeholder="Dish Name or Details">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				
				
				
				
				 
				
				
				
				
				<!----
				<div class="cd-filter-block">
					<h4>Check boxes</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Option 1</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Option 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Option 3</label>
						</li>
					</ul> 
				</div> ----><!-- cd-filter-content --> <!-- cd-filter-block -->



			

				 <div class="cd-filter-block" >
					<h4>Category</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="category"  value="<?php echo $search_category;?>">
                    <option value="">All</option>
					<option value="1">Cooked/Ready To Cook</option>
                    <option value="3">Baked/Sweets</option>
                    <option value="8">Drinks</option>
                    <option value="4">Monthly/Weekly Package</option>
                    <option value="10">Frozen</option>
                    <option value="9">Deals</option>
                    <option value="6">Cooking Ingredients/Masalas/Spices/Achar/Pickles</option>
                    <option value="2">Raw/Whole sale/(Dry)Fruits/Veg./Fish/Etc</option>
                    <option value="5">Gifts And Party Items</option>
                    <option value="7">Events Organization/Decoration And Food</option>
								
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div>





				
				
<!-----				<div class="cd-filter-block">
					<h4>Radio buttons</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Choice 2</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Choice 3</label>
						</li>
					</ul> 
				</div> ---><!-- cd-filter-content --> <!-- cd-filter-block -->
			<button id = "filterbutton" type="search" name= "submit-search" class= "btn-primaryc plr-25" ><b>SEARCH </b></button>
			</form>

			<a  class="cd-close"></a>
		</div> <!-- cd-filter -->

		<a  class="cd-filter-trigger">Search Dish From Here</a>
 

	</main> <!-- cd-main-content -->

<!-- Gallery Section  images should be more than 8 on and the size should be small resetting is requiered-->
	
	
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Foodiliciousbite</h2>
              <p>Taste and Health jumping into the mouth</p>
			  <p>Like and Follow Foodiliciousbite and get delicious deals directly in your Newsfeed</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
				<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Open Hours</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><span>Monday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Tuesday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Wednesday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Thursday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Friday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Saturday</span><span>24hrs</span></li>
                <li class="d-flex"><span>Sunday</span><span>24hrs</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Newsletter</h2>
            	<p>Get In touch. Stay Updated</p></br>
              <form action="" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Instagram</h2>
              <div class="thumb d-sm-flex">
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-1.jpg);">
	            	</a>
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-2.jpg);">
	            	</a>
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-3.jpg);">
	            	</a>
	            </div>
	            <div class="thumb d-flex">
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-4.jpg);">
	            	</a>
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-5.jpg);">
	            	</a>
	            	<a href="" class="thumb-menu img" style="background-image: url(kusina/images/insta-6.jpg);">
	            	</a>
	            </div>
            </div>
          </div>
        </div>
		<div class="row">
          <div class="col-md-12 text-center">
               <p><a href="terms-of-use.html"> Terms of Use</a> <tab>  |  <a href="Privacy-Policy.html"> Privacy Policy</a>    |  <a href="contact.html"> Contact Us</a>    |  <a href="about.html"> About Us</a>    </p>
		            </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
  
<!-- Team Section -->

<!-- Contact Section -->
<!-----------
<div id="contact" class="text-center">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Reservations</h3>
      <div class="contact-item">
        <p>Please call</p>
        <p>(887) 654-3210</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Address</h3>
      <div class="contact-item">
        <p>4321 California St,</p>
        <p>San Francisco, CA 12345</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Opening Hours</h3>
      <div class="contact-item">
        <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
        <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
      </div>
    </div>
  </div>
  
</div>

<div id="footer">
  <div class="container text-center">
    <div class="col-md-6">
      <p>&copy; 2017 Gusto. All rights reserved. Design by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
    <div class="col-md-6">
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>-------------><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script src="script.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<!----<script type="text/javascript" src="js/contact_me.js"></script> --->
<script type="text/javascript" src="js/main.js"></script>
<script src="filterpanel/js/jquery.mixitup.min.js"></script>
<script src="filterpanel/js/main.js"></script>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script src="kusina/js/jquery.min.js"></script>
  <script src="kusina/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="kusina/js/popper.min.js"></script>
  <script src="kusina/js/bootstrap.min.js"></script>
  <script src="kusina/js/jquery.easing.1.3.js"></script>
  <script src="kusina/js/jquery.waypoints.min.js"></script>
  <script src="kusina/js/jquery.stellar.min.js"></script>
  <script src="kusina/js/owl.carousel.min.js"></script>
  <script src="kusina/js/jquery.magnific-popup.min.js"></script>
  <script src="kusina/js/aos.js"></script>
  <script src="kusina/js/jquery.animateNumber.min.js"></script>
  <script src="kusina/js/bootstrap-datepicker.js"></script>
  <script src="kusina/js/jquery.timepicker.min.js"></script>
  <script src="kusina/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="kusina/js/google-map.js"></script>
  <script src="kusina/js/main.js"></script>
    


</body>


</html>

