<?php
session_start();
?>
<?php
  // Create database connection
   include('config.php');
   
$_SESSION["url"] = $_SERVER['REQUEST_URI']."";

if (isset($_SESSION["user_id"]))
{
    $user_id=$_SESSION["user_id"];
}
else {
	
}

  // Initialize message variable
  $msg = "";
  if(isset($_GET['product_id']) && isset($_GET['shop_id'])){
  $shop_id=$_GET['shop_id'];
  $product_id=$_GET['product_id'];   }
  
   elseif(isset($_GET['shop_id'])){
	   $shop_id=$_GET['shop_id'];
	 
   }
   else{
       echo "<script>location='index.php'</script>";
   }
    $sql_categories = "
  select distinct P.category,C.category_id,C.category_name,C.category_abbreviation from products P
  join t_category C on P.category=C.category_id 
  where  P.shop_id='".$shop_id."'";   
   $result_categories = mysqli_query($db, $sql_categories);
  if(isset($_SESSION["user_lat"])){
  $sql_shops = "
  select '1' as shopsorder,S.shop_id,S.shop_name, S.shop_note,S.shop_contact,((ABS(S.shop_lat-".$_SESSION["user_lat"].")+ABS(S.shop_long-".$_SESSION["user_long"]."))*100) as distance,CT.city_name,CO.country_name,
  (select image_name  from t_images I where I.shop_id=S.shop_id order by image_id Desc limit 1) as thumbnail,
  S.creation_date from t_shops S join t_cities CT on S.shop_city=CT.city_id join t_country CO on S.shop_country=CO.country_id  
  where  S.shop_id='".$shop_id."'";}
  else{
$sql_shops = "
  select '1' as shopsorder,S.shop_id,S.shop_name, S.shop_note,S.shop_contact,'' as distance,CT.city_name,CO.country_name,
  (select image_name  from t_images I where I.shop_id=S.shop_id order by image_id Desc limit 1) as thumbnail,
  S.creation_date from t_shops S join t_cities CT on S.shop_city=CT.city_id join t_country CO on S.shop_country=CO.country_id  
  where  S.shop_id='".$shop_id."'";

  }
  
  
  
  $result_shops = mysqli_query($db, $sql_shops);
  if(isset($product_id)){
	$query_products = "
select '1' as  productorder,'' as property,P.product_id,P.title,P.category,I.product_id,
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
select '2' as  productorder,'' as property,P.product_id,P.title,P.category,I.product_id,
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
order by productorder ASC";   
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

while ($row_shop = mysqli_fetch_array($result_shops)) {
$shop_id=$shop_id;
$shop_name=$row_shop['shop_name'];
$shop_note=$row_shop['shop_note'];
$shop_city=$row_shop['city_name'];
$distance=$row_shop['distance'];
$shop_country_id=$row_shop['country_name'];
$shop_contact=$row_shop['shop_contact'];
$shop_city_name=$row_shop['city_name'];
$shop_country_name=$row_shop['country_name'];
$image=$row_shop['thumbnail'];

}
  
  
  
?>

<html lang="en">
<head>
        <title><?php echo $shop_name;?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/shop_images/<?php echo $image;?>">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="shoppagecss/fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="shoppagecss/plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="shoppagecss/plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="shoppagecss/fonts/ionicons.css" rel="stylesheet">
        <link href="shoppagecss/common/styles.css" rel="stylesheet">
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

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Kusina</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				        	<li class="nav-item"><a href="postyourad.php" class="nav-link">Sell Your Dish</a></li>
				<li class="nav-item"><a href="createshop.php" class="nav-link">Create Restaurant</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
			  <?php if (isset($_SESSION['username']))
			  {echo "<li class='nav-item'><a  class='nav-link'>".$_SESSION['username']."</a></li>";
			  echo "<li class='nav-item'><a href='logout.php?logout=1' class='nav-link'>Logout</a></li>";
			  }
	          else {
	            echo "<li class='nav-item'><a href='signin.php' class='nav-link'>Login</a></li>";
	            
	        }
	          
	          ?>
	        </ul>
	      </div>
	    </div>
	  </nav>


<section class="bg-1 h-300x main-slider pos-relative"  style="background-image: url('img/shop_images/<?php echo $image;?>');">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">

                                
                               <!-- <h1 class="mt-30 mb-15"><?php echo $shop_name;?></h1>
								<h5><b><?php if ($distance!=''){echo 'Approx Distance: '.ceil($distance).' km';}?></b></h5>
                                <h5><b><?php echo $shop_city;?></b></h5>
                               <!-- <h5><a href="#menu" class="btn-primaryc plr-25"><b>SEE  MENU</b></a></h5> ---->

					   </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>




<section id="menu"> 
        <div class="container">
                <div class="heading">
                        <!---<img class="heading-img" src="images/heading_logo.png" alt="">--->
                        <h2><?php echo $shop_name;?></h2>
                        <h5><b><?php if ($distance!=''){echo 'Approx Distance: '.ceil($distance).' km';}?></b></h5>
                        <h5><b><?php echo $shop_city;?></b></h5>
                <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="tel:<?php echo $shop_contact;?>" class="btn-primaryc plr-25"><b>Place An Order</b></a></h6>                       
				</div>

                <div class="row  scrollmenu">
                        <div class="col-sm-12 " >
                                <ul class="selecton mb-70">
                                       
										
										<li><a class="active brdr-b-primary" href="#" data-select="*"><b>ALL</b></a></li>
                                        
										 <?php 
										while ($row_categories = mysqli_fetch_array($result_categories)) {
											?>
											<li class="brdr-b-primary"><a href="#" data-select="<?php echo $row_categories['category_id'];?>"><b><?php echo $row_categories['category_abbreviation'];?></b></a></li>
											
										<?php
										}
										?>
										
                                        <li class="brdr-b-primary"><a href="#" data-select="freedelivery"><b>Free Delivery</b></a></li>
										
										<li class="brdr-b-primary"><a href="#" data-select="dtca"><b>Call Away</b></a></li>
                                </ul>
                        </div><!--col-sm-12-->
                </div><!--row-->

                <div class="row">
				
				<?php
                $count=0;
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
	$dc_name=$row_products['dc_name'];
	$dt_name=$row_products['delivery_time_name'];
	$dc_filter_name=$row_products['dc_filter_name'];
	$dt_filter_name=$row_products['dt_filter_name'];	
   

	?>
                        <div class="col-md-6 food-menu <?php echo $category_id.' '.$dc_filter_name.' '.$dt_filter_name ;?>">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><a href='img/product_images/<?php echo $thumbnail;?>' ><img class="br-3" src="img/product_images/<?php echo $thumbnail;?>" alt="Menu Image"></a></div><!--s-left-->
										<div class="s-right">
                                                <h5 class="menu-item-name"><b><?php echo $title;?></b><b class="color-primary float-right"><?php echo $currency_code.$price;?></b></h5>
                                                <p class="pr-70"><?php echo $details;?></p>
												</br>
                                                <?php if($count<1){?>
                                                <b class="pr-70">Images are Clickable</b><?php $count=$count+1;
                                                echo "</br>";}
                                                ?>
												<p class="pr-70 color-primary float-right" ><?php echo $dc_name;?></p>
												<p class="pr-70 color-primary float-left"><?php echo $dt_name;?></p>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
								
                      
		<h6 class="center-text mt-20 mt-sm-10 mb-15">
		<a href="counter.php?contact=<?php echo $shop_contact;?>&method=whatsapp&product_id=<?php echo $product_id;?>" class="btn-primaryc plr-25"><b>
		Place An Order(whatsapp)</b></a></h6>
						
						</div><!-- food-menu -->
<?php }?>
 
                  </div><!-- row -->
                <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="tel:<?php echo $shop_contact;?>" class="btn-primaryc plr-25"><b>Place An Order(Call)</b></a></h6>
        </div><!-- container -->
</section>

<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p><?php echo $shop_city;?> </p>
                </div>


                <ul class="icon mt-30">
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                </ul>

                <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="shoppagecss/plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="shoppagecss/plugin-frameworks/bootstrap.min.js"></script>
<script src="shoppagecss/plugin-frameworks/swiper.js"></script>
<script src="shoppagecss/common/scripts.js"></script>

</body>
</html>