<?php
 session_start();
include('config.php');	
  
  $_SESSION["url"] = $_SERVER["REQUEST_URI"]."";

    if(isset($_SESSION["username"])){
	  $user_id=$_SESSION["user_id"];
	  $user_name=$_SESSION["username"];
  }
  else{
    echo "<script>location='signin.php'</script>";
    
  }
   if(isset($_GET['lat'])){
$user_lat=(isset($_GET['lat']))?$_GET['lat']:'';
$user_long=(isset($_GET['long']))?$_GET['long']:'';
}
else{
	echo "<script>location='createshoploc.php'</script>";
	
}
  
	$query_country="
	Select 1 as sortorder, CO.country_name,CO.country_code,CT.city_name from t_country CO join t_cities CT on CT.country_id=CO.country_id
where CT.city_id in 
(select user_city from users where user_id='".$user_id."')
UNION
	Select 2 as sortorder, CO.country_name,CO.country_code,CT.city_name from t_country CO join t_cities CT on CT.country_id=CO.country_id
where CO.country_id in 
(select user_country from users where user_id='".$user_id."') 
UNION
	Select 3 as sortorder, CO.country_name,CO.country_code,CT.city_name from t_country CO join t_cities CT on CT.country_id=CO.country_id
order by sortorder,city_name ";
	$result_country = mysqli_query($db, $query_country);

	
	$query_currency = "select currency_id,currency_code,currency_name from t_currency order by currency_name";
  $result_currency = mysqli_query($db, $query_currency);

  ?>
<html lang="en">
  <head>
 
    <title>Foodiliciousbite - Promote Your Online Food Business</title>
    <link rel= "canonical" href="http://foodiliciousbite.com/postyourad.php/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
	<link rel="icon" type="image/png" href="product/images/icons/foodiliciousbitelogo.png"/>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Foodiliciousbite</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	            <?php if (isset($_SESSION["login_user"])){echo "<li class='nav-item'><a href='' class='nav-link'>(".$_SESSION["login_user"]."</a></li>";}?>
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="postyourad.php" class="nav-link">Sell My Dish</a></li>
				<li class="nav-item"><a href="How-it-works.html" class="nav-link">How to Buy/Sell</a></li>
				<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="terms-of-use.html" class="nav-link">Terms of Use</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('kusina/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
             <h1 class="mb-2 bread">Create Restaurant</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Create Restaurant<i class="ion-ios-arrow-forward"></i></span></p>
                     

		   </div>
        </div>
      </div>
    </section>
    
	
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row d-flex">
          <div class="col-md-5 ftco-animate img img-2" style="background-image: url(kusina/images/bg_6.jpg);"></div>
          <div class="col-md-7 ftco-animate makereservation p-4 p-md-5">
          	<div class="heading-section ftco-animate mb-5">
	          	<span class="subheading">Introduce to a new Taste</span>
	            <h2 class="mb-4">Create Restaurant</h2>
	          </div>
            
			 <form method="POST" action="savenewshop.php" enctype="multipart/form-data">
              <div class="row">
			  <div class="col-md-12">
                  <div class="form-group">
              
				<input type="text" class="form-control" name="user_id" value="<?php echo $user_id;?>" hidden>
                </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    
                     <input type="text" class="form-control" placeholder="Kitchen/restaurant Name" name="shop_name" required>
                  </div>
                </div>
				 <div class="col-md-12">
                  <div class="form-group">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="size" value="100000">
  	               <div>
                	 <label>Cover Image </label>
					<input type="hidden" name="size" value="100000">
  	               
				   
                	<input type="file" name="shop_image"  required>
  	                </div>
                  </div>
                </div>
                
				
               
				<div class="col-md-12">
				<div class="form-group">
              
				<input type="text" class="form-control" placeholder="Note (Utilize This if You Are A home Seller)" name="shop_note" >
                </div>
				</div>
				
               
				
				
				

				<div class="col-md-12">
				</div>
                <div class="col-md-12">
                  <div class="form-group">
                  <input type="text" class="form-control" placeholder="Town e.g.(Johar/Gulberg etc)" name="shop_town" required></div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
            			
				<input type="text" class="form-control" placeholder="Kitchen/Restaurant Call Contact" name="shop_contact" required>
			    </div></div>
                <div class="col-md-12">
                  <div class="form-group">
            			
				<input type="text" class="form-control" placeholder="Kitchen/Restaurant whatsapp Contact" name="shop_whatsapp" required>
			    </div></div>

						<div class="col-md-12">
                  <div class="form-group">
            			
				
			<select name="currency"  class="form-control" required>
                    <?php 
					
					while ($row_currency = mysqli_fetch_array($result_currency)) {
					
					
					
					echo '<option  class="form-control" value="'.$row_currency['currency_id'].'"> '.$row_currency['currency_name'].'</option>';
                    }?>
					
                </select>	
			 </div></div>
			 <div class="col-md-12">
                  <div class="form-group">
            	 <input  class="form-control" list="browsers" name="city_country" Placeholder="City/Country (Select From List Only)">
  <datalist id="browsers">
    <?php
	while ($row = mysqli_fetch_array($result_country)) {
	echo '<option value="'.$row['city_name'].'/'.$row['country_name'].'"></option>';} ?>
    
  </datalist>
</div></div>
				
				   <div class="col-md-6">
                  <div class="form-group">
				<select name="shop_location_status"  class="form-control" required>
					<option   class="form-control" value="1">Set  My Current Location As Shop Location </option>	
				  <option  class="form-control" value="0">I will Update Later </option>	
					
                </select>
				</div></div>
				
				
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
                  <div class="form-group">
				 <input type="number" class="form-control" value="<?php echo $user_lat;?>" name="shop_lat" hidden>
				</div></div>
				<div class="col-md-6">
                  <div class="form-group">
				 <input type="number" class="form-control" value="<?php echo $user_long;?>" name="shop_long" hidden>
				</div></div>
				
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                  
					<h6 class="center-text mtb-30">
					
					<input type="submit" name="createshop" onclick="processingform();"  value="Create Restaurant" class="btn-primaryc plr-25">
					
					</h6>
                  </div>
                </div>
				
              </div>
            </form>
          </div>
        </div>
			</div>
			
		</section>
		<script type="text/javascript">
		
        function processingform() {
         	       alert("Please Wait While Your Request is Being Processed");

        
		}
		</script>
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- firstadafterapproval -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3885851651740120"
     data-ad-slot="1898772041"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Foodiliciousbite</h2>
              <p>Taste and Health jumping into the mouth</p>
			  <p>Like and Follow Foodiliciousbite and get delicious deals directly in your Newsfeed</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                
                <li class="ftco-animate"><a href=""><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href=""><span class="icon-instagram"></span></a></li>
				<li class="ftco-animate"><a href=""><span class="icon-twitter"></span></a></li>
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
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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