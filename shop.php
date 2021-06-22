<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kusina - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lovers+Quarrel" rel="stylesheet">

    <link rel="stylesheet" href="kusinastyling/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="kusinastyling/css/animate.css">
    
    <link rel="stylesheet" href="kusinastyling/css/owl.carousel.min.css">
    <link rel="stylesheet" href="kusinastyling/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="kusinastyling/css/magnific-popup.css">

    <link rel="stylesheet" href="kusinastyling/css/aos.css">

    <link rel="stylesheet" href="kusinastyling/css/ionicons.min.css">

    <link rel="stylesheet" href="kusinastyling/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="kusinastyling/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="kusinastyling/css/flaticon.css">
    <link rel="stylesheet" href="kusinastyling/css/icomoon.css">
    <link rel="stylesheet" href="kusinastyling/css/style.css">
  </head>
  <body>
      <?php
	 include('config.php');
	if($_GET){
	$shop_id=$_GET['shop_id']; 
	if(isset($_GET['product_id'])){
	$product_id=$_GET['product_id'];
	
}
	}
	else{
	echo "Please go home";	
		
	}
	  if(isset($product_id) ){
	$query_products = "
select '1' as  productorder,'' as property,P.product_id  as products_id,P.title,P.category,I.product_id,
D.status,D.availability_rank,P.details,P.price,S.shop_name,S.shop_town,S.shop_note,S.shop_id,
S.shop_currency,S.shop_country,S.shop_contact,CU.currency_code,
C.category_id,C.category_name,CT.city_name, CO.country_name,I.image_name  As thumbnail,
DC.dc_name,DC.dc_filter_name,DT.delivery_time_name,DT.dt_filter_name
from products P 
Join t_shops S on P.shop_id=S.shop_id 
JOIN t_currency CU on S.shop_currency=CU.currency_id
join t_images I On  P.product_id=I.product_id Join t_category C on P.category=C.category_id
JOIN t_delivery_scope D on P.delivery_scope_id=D.availability_rank join t_cities CT on S.shop_city=CT.city_id JOIN t_country CO 
ON S.shop_country=CO.country_id 
JOIN t_dc DC ON P.delivery_charges=DC.dc_id
JOIN t_delivery_time DT  ON P.delivery_time=DT.delivery_time_id
where I.thumbnail='True' and P.status='NOT DELETED' 
and I.status='NOT DELETED' and S.shop_id='".$shop_id."' and P.product_id = '".$product_id."'
UNION
select '2' as  productorder,'' as property,P.product_id as products_id,P.title,P.category,I.product_id,
D.status,D.availability_rank,P.details,P.price,S.shop_name,S.shop_town,S.shop_note,S.shop_id,
S.shop_currency,S.shop_country,S.shop_contact,CU.currency_code,
C.category_id,C.category_name,CT.city_name, CO.country_name,I.image_name  As thumbnail,
DC.dc_name,DC.dc_filter_name,DT.delivery_time_name,DT.dt_filter_name
from products P 
Join t_shops S on P.shop_id=S.shop_id 
JOIN t_currency CU on S.shop_currency=CU.currency_id
join t_images I On  P.product_id=I.product_id Join t_category C on P.category=C.category_id
JOIN t_delivery_scope D on P.delivery_scope_id=D.availability_rank join t_cities CT on S.shop_city=CT.city_id JOIN t_country CO 
ON S.shop_country=CO.country_id 
JOIN t_dc DC ON P.delivery_charges=DC.dc_id
JOIN t_delivery_time DT  ON P.delivery_time=DT.delivery_time_id
where I.thumbnail='True' and P.status='NOT DELETED' 
and I.status='NOT DELETED' and S.shop_id='".$shop_id."' and P.product_id != '".$product_id."'
order by productorder ASC,products_id DESC";   
}
  else{
$query_products = "select '1' as  productorder,'' as property,P.product_id,P.title,P.category,I.product_id,
D.status,D.availability_rank,P.details,P.price,S.shop_name,S.shop_town,S.shop_note,S.shop_id,
S.shop_currency,S.shop_country,S.shop_contact,CU.currency_code,
C.category_id,C.category_name,CT.city_name, CO.country_name,I.image_name  As thumbnail,
DC.dc_name,DC.dc_filter_name,DT.delivery_time_name,DT.dt_filter_name
from products P 
Join t_shops S on P.shop_id=S.shop_id 
JOIN t_currency CU on S.shop_currency=CU.currency_id
join t_images I On  P.product_id=I.product_id Join t_category C on P.category=C.category_id
JOIN t_delivery_scope D on P.delivery_scope_id=D.availability_rank join t_cities CT on S.shop_city=CT.city_id JOIN t_country CO 
ON S.shop_country=CO.country_id 
JOIN t_dc DC ON P.delivery_charges=DC.dc_id
JOIN t_delivery_time DT  ON P.delivery_time=DT.delivery_time_id
where I.thumbnail='True' and P.status='NOT DELETED' 
and I.status='NOT DELETED' and S.shop_id='".$shop_id."'
order by productorder,P.product_id DESC"; 
  }
  $result_products = mysqli_query($db, $query_products);

	
	?>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Kusina</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item active"><a href="menu.html" class="nav-link">Specialties</a></li>
	        	<li class="nav-item"><a href="reservation.html" class="nav-link">Reservation</a></li>
	        	<li class="nav-item"><a href="blog.html" class="nav-link">Stories</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Specialties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
	

		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Specialties</span>
            <h2 class="mb-4">Our Menu</h2>
          </div>
        </div>
	<?php
while ($row_products = mysqli_fetch_array($result_products)) {
	$product_id=$row_products['product_id'];
    $title=$row_products['title'];
	$category_name=$row_products['category_name'];
	$category_id=$row_products['category_id'];
	$thumbnail=$row_products['thumbnail'];
	$details=nl2br($row_products['details']);
	$price=$row_products['price'];
	$currency_code=$row_products['currency_code'];
	$order_time="45min";
	$shop_contact=$row_products['shop_contact'];
	$whatsapp_contact=$row_products['shop_contact'];
	$dc_name=$row_products['dc_name'];
	$dt_name=$row_products['delivery_time_name'];
	$dc_filter_name=$row_products['dc_filter_name'];
	$dt_filter_name=$row_products['dt_filter_name'];	
   	?>       
   	  <?php
			     $sql_images="SELECT image_name from t_images where product_id = ".$product_id." and status ='NOT DELETED'";
  $result_images = mysqli_query($db,$sql_images);
  
  ?>
  
  <div class="row">
	   <div class="col-md-12 col-lg-6 ">
  
  							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
  $image_counter=0;
while ($row = mysqli_fetch_array($result_images)) {
$image_name=$row['image_name']; 
if($image_name!='main_photo.jpg'){
if($image_counter==0)
{?>
  
    <div class="carousel-item active">
      <a href="img/product_images/<?php echo $image_name;?>">
	  <img class="d-block w-100" style="width:150px; height:300px" src="img/product_images/<?php echo $image_name;?>" alt="First slide">
    </a>
	</div>
<?php 
$image_counter=$image_counter+1;
}
else{
?>
 
    <div class="carousel-item">
      <a href="img/product_images/<?php echo $image_name;?>">
	  <img class="d-block w-100" style="width:150px; height:300px"  src="img/product_images/<?php echo $image_name;?>" alt="Second slide">
    </a>
	</div>
<?php }
}
}
?>
	
	
	
  </div>

</div></div></div>


</br> 
        <div class="row">
	   <div class="col-md-6 col-lg-6 ">
        		

        		<div class="menus d-flex ftco-animate">
              
              <div class="text">
              	<div class="d-flex">
	                <div class="col-md-6 col-lg-6 ">
	                  <h6 class="ftco-heading-2"><?php echo $title;?></h6>
	                </div>
	                <div >
					<br>
	                  <span class="price"><?php echo $currency_code.$price;?></span>
	                </div>
	              </div>
				  <div class="col-md-6 col-lg-6 ">
	              <p><?php echo $details;?></p></br>
					</div>
 
			   <a  class="btn btn-primary "   href="counter.php?method=whatsapp&contact=<?php echo $whatsapp_contact;?>&product_id=<?php echo $product_id;?>">Contact (whatsapp)</a>
		<a class="btn btn-primary"
										href="counter.php?method=call&contact=<?php echo $whatsapp_contact;?>&product_id=<?php echo $product_id;?>"
										>Contact (Call)</a>
			  
			  
			  
			  </div>
            
			</div>
			
			</div>
			
		 </div>
<?php }?>
       
				<a class="btn btn-primary"
										href="counter.php?method=call&contact=<?php echo $whatsapp_contact;?>&product_id=<?php echo $product_id;?>"
										>Contact (Call)</a>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Kusina</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Open Hours</h2>
              <ul class="list-unstyled open-hours">
                <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
                <li class="d-flex"><span>Sunday</span><span> Closed</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Newsletter</h2>
            	<p>Far far away, behind the word mountains, far from the countries.</p>
              <form action="#" class="subscribe-form">
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
	            	<a href="#" class="thumb-menu img" style="background-image: url(kusinastyling/images/insta-1.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(kusinastyling/images/insta-2.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(kusinastyling/images/insta-3.jpg);">
	            	</a>
	            </div>
	            <div class="thumb d-flex">
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
	            	</a>
	            	<a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
	            	</a>
	            </div>
            </div>
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


  <script src="kusinastyling/js/jquery.min.js"></script>
  <script src="kusinastyling/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="kusinastyling/js/popper.min.js"></script>
  <script src="kusinastyling/js/bootstrap.min.js"></script>
  <script src="kusinastyling/js/jquery.easing.1.3.js"></script>
  <script src="kusinastyling/js/jquery.waypoints.min.js"></script>
  <script src="kusinastyling/js/jquery.stellar.min.js"></script>
  <script src="kusinastyling/js/owl.carousel.min.js"></script>
  <script src="kusinastyling/js/jquery.magnific-popup.min.js"></script>
  <script src="kusinastyling/js/aos.js"></script>
  <script src="kusinastyling/js/jquery.animateNumber.min.js"></script>
  <script src="kusinastyling/js/bootstrap-datepicker.js"></script>
  <script src="kusinastyling/js/jquery.timepicker.min.js"></script>
  <script src="kusinastyling/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="kusinastyling/js/google-map.js"></script>
  <script src="kusinastyling/js/main.js"></script>
    
  </body>
</html>