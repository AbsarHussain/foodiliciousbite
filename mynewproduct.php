<!DOCTYPE html>
<?php
  // Create database connection
   include('config.php');
   echo '<script type="text/javascript">
alert("Your Request Is Being Processed")
          
</script>';



  // Initialize message variable
  $msg = "";
    $identification=$_GET['product_id'];
  $str_arr = explode ("-", $identification);
  $product_id=$str_arr[0];
  $deletion_id=$str_arr[1];
  // If upload button is clicked ...
  //$result = mysqli_query($db, "SELECT * FROM products where product_id =". $_GET['product_id']."");
 //SELECT SP.shop_id,S.shop_name,P.product_id,P.title,P.date, P.details, P.price,P.contact, L.city,L.town, D.status from products P left JOIN t_shop_contact SP ON P.contact=SP.shop_contact left JOIN t_shops S on SP.shop_id=S.shop_id  JOIN t_locations L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.delivery_scope_id=L.delivery_scope_id  where P.product_id= 
  //SELECT P.product_id,P.title,P.date, P.details, P.price,P.contact, L.city,L.town, D.status from products P JOIN t_locations L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.delivery_scope_id=L.delivery_scope_id where P.product_id=
  $sql_product = "SELECT SP.shop_id,S.shop_name,S.shop_note,P.product_id,P.title,P.serving,P.date, P.details, P.price,P.contact, L.city,L.town, D.status from products P left JOIN t_shop_contact SP ON P.contact=SP.shop_contact left JOIN t_shops S on SP.shop_id=S.shop_id  JOIN t_locations L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.availability_rank=L.availability_rank  where P.product_id=".$product_id."";
  $result_product = mysqli_query($db, $sql_product);
  $sql_images="SELECT image_name from t_images where product_id = ".$product_id."";
  $result_images = mysqli_query($db,$sql_images);
  //$sql_product = "SELECT P.product_id,P.title, P.details, P.price, L.city,L.town, D.status from products P JOIN location L On P.product_id=L.product_id JOIN t_delivery_scope D ON D.availability_status=L.availability_status where P.product_id=".$_GET['product_id']."";
  $result_product2 = mysqli_query($db, $sql_product);
 // $resultproduct= mysqli_query($db, "SELECT * from products where product_id =".$_GET['product_id']."");
  //$resultproduct2= mysqli_query($db, "SELECT * from products where product_id =".$_GET['product_id']."");
  //,products.price,products.serving,products.details,products.delivery

?>
<?php
while ($row = mysqli_fetch_array($result_product)) {
$shop_id= $row['shop_id'];
$shop_name= $row['shop_name'];
$shop_note= $row['shop_note'];
$title= $row['title'];
$serving=$row['serving'];
$serving=str_replace('Person', '', $serving);
$serving=str_replace('Persons', '', $serving);
$serving=str_replace('person', '', $serving);
$serving=str_replace('persons', '', $serving);
$price=$row['price'];
$date= $row['date'];
$details=$row['details'];
$contact=$row['contact'];
$contact=str_replace(' ', '', $contact);
$contact=str_replace('-', '', $contact);
$contact = substr($contact, -10);
$code="92";
$ph_code="+92";
$whatsapp_contact=$code.$contact;
$phone_contact=$ph_code.$contact;
$city=$row['city'];
$town=$row['town'];
$status=$row['status'];
}?> 
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-69616744-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-69616744-3');
</script>
	<title><?php echo $title?> - Foodiliciousbite </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="product/images/icons/foodiliciousbitelogo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="product/css/util.css">
	<link rel="stylesheet" type="text/css" href="product/css/main.css">
<!--===============================================================================================-->
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
    <link rel="stylesheet" href="kusina/css/updatedcss/updated/style.css">
	<link rel="icon" type="image/png" href="images/icons/foodiliciousbitelogo.png"/>
	<script src="kusina/js/modernizr.js"></script> <!-- Modernizr -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-3885851651740120",
          enable_page_level_ads: true
     });
</script>
</head>
<body>
   
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=1674823126107313&autoLogAppEvents=1"></script>    
   
	<!-- Header -->
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="products_by_city.php?city=<?php echo $city?>" class="nav-link">More Dishes</a></li>
	        	<li class="nav-item"><a href="postyourad.php" class="nav-link">Sell Your Dish (Free)</a></li>
				<li class="nav-item"><a href="How-it-works.html" class="nav-link">How to Buy/Sell</a></li>
				<!---<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="https://www.facebook.com/foodiliciousbite/" class="nav-link">Reach Out To us On Facebook</a></li>
	        	
	        	<li class="nav-item"><a href="terms-of-use.html" class="nav-link">Terms of Use</a></li>---->
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
			
	      </div>
	    </div>
		
	  </nav>
<?php while ($row = mysqli_fetch_array($result_images)) {
    
	$image_names[]=$row['image_name'];
	$title_image=$image_names[0];
//	echo $title_image;
//this will be used for dynamic title images
}?>
	  
    <section class="hero-wrap hero-wrap-2" style="background-image: url('kusina/images/bg_4.jpg')" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            
            
          </div>
        </div>
      </div>
    </section>
	
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

	<!-- breadcrumb -->
	<!-------<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			Women
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			T-Shirt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a> 
		<span class="s-text17">
			
		</span>
	</div>
		
		
		--->
<?php
// while ($row = mysqli_fetch_array($result_product)) {
// $title= $row['title'];
// $price=$row['price'];
// $details=$row['details'];
// $contact=$row['contact'];
// $city=$row['city'];
// $town=$row['town'];
// $status=$row['status'];
// }
while ($row = mysqli_fetch_array($result_images)) {
    
	$image_names[]=$row['image_name'];
	//$second_image=$row[1];
    //$num_rows= count($row);
}
	
   $num_rows=count($image_names);

?>
<marquee><h6><b>------------------     Foodiliciousbite.com  ------------------------   If You Like The Dish Or Looking For Something Similar Please Press The Order/Details Button     ------------------------    After Response Mention Your Query And Confirm Order If You Like     ------------------------    Every Kitchen Has Its Own Menu      ------------------------        Thank You</b><h6></marquee>		

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>0){ echo "$image_names[0]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w"><?php
							//echo "<img  src='img/product_images/".$first_image."''>";?>
								<img src='img/product_images/<?php if($num_rows>0){ echo "$image_names[0]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
								
							</div>
						</div>

						<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>1){ echo "$image_names[1]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w">
								<img src='img/product_images/<?php if($num_rows>1){ echo "$image_names[1]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>2){ echo "$image_names[2]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w">
								<img src='img/product_images/<?php if($num_rows>2){ echo "$image_names[2]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
							</div>
						</div>
					<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>3){ echo "$image_names[3]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w">
								<img src='img/product_images/<?php if($num_rows>3){ echo "$image_names[2]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
							</div>
						</div>
						<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>4){ echo "$image_names[4]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w">
								<img src='img/product_images/<?php if($num_rows>4){ echo "$image_names[4]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
							</div>
						</div>
						<div class="item-slick3" data-thumb='img/product_images/<?php if($num_rows>5){ echo "$image_names[5]";} else {echo "NoImage.jpg";}?>'>
							<div class="wrap-pic-w">
								<img src='img/product_images/<?php if($num_rows>5){ echo "$image_names[5]";} else {echo "NoImage.jpg";}?>' alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<b><u><?php echo "$title";?></b></u>
				
				 <?php 
					if ($shop_name!=null){
				    //shop.php?shop_id=".$shop_id."
				    echo "<a  href='shop.php?shop_id=".$shop_id."' ><div class='menu-item-name'><b>By $shop_name: </b>(Click To View Complete Menu )</a></br></div>";
					    
					
					    
					}
				    
				    else {
				    
				    }
				    ?></h4>
				    <?php echo "<b>".$shop_note."</b>";?>
				<span class="m-text17">
					<h6><?php echo "Price: $price";?></h6>
				</span>
				<?php $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>
				

				
				    
				    						    <!--<b> جب آپ اس بٹن کو دبائیں گے تو آپ واٹس ایپ پر اس ڈش بنانے والے سے جڑ جائیں گے</b>-->
				<a class= "ad" href="https://api.whatsapp.com/send?phone=<?php echo "$whatsapp_contact";?>$&text=Assalam O Alaikum! I am Contacting You regarding Your Dish <?php echo ".$title.";?>  From Foodiliciousbite.com. I am interested in Your Dish <?php echo " ".$url."";?> Is It Available?"><button id="rounded_corners" class="filterpanelbutton"><b>Whatsapp Seller</b></button></a>
				
				
				</p>

                
				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
					<b>	Description</b>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
                    <?php echo "<b><u>Serving:</u> ".$serving." Person(s)</b> ";?></br>
							<?php echo "<b> $details </b> ";?></br></br>
							<b>Delivering In:</b></br>
							<?php echo "<b> $status </b></br>";?>
							<?php if ($town!=null){echo "<b> $town $city </b></br>";}?>
						    <?php echo "<b>".$city."</b>"?>
						    </br></br>
						    <b> جب آپ اس بٹن کو دبائیں گے تو آپ واٹس ایپ پر اس ڈش بنانے والے سے جڑ جائیں گے</b>
							<b>You Can Book Your Order Before Hand For Later Time Also. If you want to get more details please Use The  Button</b>
                            				<a class= "ad" href="https://api.whatsapp.com/send?phone=<?php echo "$whatsapp_contact";?>$&text=Assalam O Alaikum! I am Contacting You regarding Your Dish <?php echo ".$title.";?>  From Foodiliciousbite.com. I am interested in Your Dish <?php echo " ".$url."";?> Is It Available?"><button id="rounded_corners" class="filterpanelbutton"><b>Whatsapp Seller</b></button></a></h5>    							
                            <p></p>
				            <a class= "ad" href="sms:<?php echo $phone_contact;?>?body=AOA! I am Contacting you regarding your dish <?php echo $title;?> Link To Product: <?php echo $url;?>"><button id="rounded_corners" class="filterpanelbutton"><b>SMS Seller</b></button></a>    				
					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="detailss-text8">
						
						</p>
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						
						<p></p><?php if($date!=NULL){echo "Posted On: $date";}?>
						<!--<?php echo "Posted On: $date";?>-->
						
						
					</h5>
				
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<b>Place Your Order Or For Details </b>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							
					<a class= "ad" href="https://api.whatsapp.com/send?phone=<?php echo "$contact";?>$&text=Assalam O Alaikum! I am Contacting You regarding Your Dish <?php echo ".$title.";?>  From Foodiliciousbite.com. I am interested in Your Dish <?php echo " ".$url."";?> Is It Available?"><button class="filterpanelbutton"><b>Click to Get Connected on Whatsapp For Order And Queries </b></button></a></h5>
				</p>
					</div>
				</div>
        
				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<b>Delivery Details</b>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
						
						<b><?php echo "$status ";?></b>
						<b><?php echo "$city </br>";?></b>
				        
						</p>
					</div>
				</div>
				</br>
				<p><h4>
				    <b>ہمیں فیس بک پر لائیک کرنا نہ بھولیں </b>
				</h4></p>
				<div class="fb-page" data-href="https://www.facebook.com/foodiliciousbite/" data-tabs="timeline" data-width="400" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/foodiliciousbite/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/foodiliciousbite/">Foodiliciousbite</a></blockquote></div>
				<ul>
				<li>    
				<p><h5>آپ صفحے کے اوپری حصے میں مینو کی علامت کا استعمال کرتے ہوئے مزید ڈشز تلاش کرسکتے ہیں</h5></p>
				</li>
				<li> <p><h5>
				 اگر آپ گھر سے بنے کھانے  فراہم کرنے والے ہیں تو ہمیں فیس بک پر میسج کریں
				</h5></p>
				</li>
				<li> <p><h5>
				    نئی آمدورفت حاصل کرنے کے لئے ، کثرت سے دیکھیں
                    FOODILICIOUSBITE.COM
                </h5></p>
				</li>
				</ul>
				<!--<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">-->
				<!--	<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">-->
				<!--		<b>Other Options</b>-->
				<!--		<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>-->
				<!--		<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>-->
				<!--	</h5>-->

				<!--	<div class="dropdown-content dis-none p-t-15 p-b-23">-->
				<!--		<p class="s-text8">-->
				<!--		<a href="products.php"><b><u>Search More Dishes >>></u></b></a></br>-->
				<!--		<a href="postyourad.php"><b><u>Click to Sell Your Dish (Free of Cost/No Charges) >>></u></b></a>-->
				<!--		</p>-->
				<!--	</div>-->
				<!--</div>-->
				
				<!--	<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">-->
				<!--	<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">-->
				<!--		<b>Note For the User</b>-->
				<!--		<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>-->
				<!--		<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>-->
				<!--	</h5>-->

					<!--<div class="dropdown-content dis-none p-t-15 p-b-23">-->
					<!--	<p class="s-text8">-->
					<!--		<b>*</b>Please Get all the details of/related to the dish/item from the provider on contact</br>-->
					<!--		<b>*</b>Also ask the expected delivery time</br>-->
					<!--		<b>*</b>if the user agrees you can contact on whatsapp to get the correct details of the item</br>-->
					<!--		<b>*</b>Please do not misuse the contact</br>-->
					<!--		<b>*</b>In case of any fraud foodilicioubite will not be responsible but you can complain us to remove the product</br>-->
					<!--	    <b>*</b>In case of any misuse/miscommunication/fraud from both parties foodilicioubite will not be responsible and both parties can take actions </br>-->
					<!--	    <b>*</b>All these steps are for your and our security. Please refrain from any kind of mal-practice-->
					<!--	</p>-->
					<!--</div>-->
				<!--</div>-->
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<!----------<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -
			<div class="wrap-slick2">
				<div class="slick2">

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Herschel supply co 25l
								</a>

								<span class="block2-price m-text6 p-r-5">
									$75.00
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Denim jacket blue
								</a>

								<span class="block2-price m-text6 p-r-5">
									$92.50
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Coach slim easton black
								</a>

								<span class="block2-price m-text6 p-r-5">
									$165.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Frayed denim shorts
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									$15.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="images/item-02.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Herschel supply co 25l
								</a>

								<span class="block2-price m-text6 p-r-5">
									$75.00
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-03.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Denim jacket blue
								</a>

								<span class="block2-price m-text6 p-r-5">
									$92.50
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="images/item-05.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Coach slim easton black
								</a>

								<span class="block2-price m-text6 p-r-5">
									$165.90
								</span>
							</div>
						</div>
					</div>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="images/item-07.jpg" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button 
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									Frayed denim shorts
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8 p-r-5">
									$15.90
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
    ------------->

	<!-- Footer -->

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
              <p>Buy And Sell Home Made Food Online</p>
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
            	<h2 class="ftco-heading-2">Newsletter</h2>t
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
              <a href="terms-of-use.html" class="nav-link"><h2 class="ftco-heading-2">Terms Of Use</h2></a>
              
            </div>
            	<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						<b>Read</b>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<b>- </b>Please Get all the details of/related to the dish/item from the provider on contact</br></br>
							<b>- </b>Also ask the expected delivery time</br></br>
							<b>- </b>if the user agrees you can contact on whatsapp to get the correct details of the item</br></br>
							<b>- </b>Please do not misuse the contact</br></br>
							<b>- </b>In case of any fraud foodilicioubite will not be responsible but you can complain us to remove the product. Through our Contact Us page or otherwise both parties can take actions accordingly</br></br>
						    <!--<b>- </b>In case of any misuse/ miscommunication/fraud from both parties foodilicioubite will not be responsible and both parties can take actions accordingly</br>-->
						    <b>- </b>The Aim of Foodiliciousbite is to promote home-based and small scale business, Inorder to prevent hurdles all these steps are for your and our security so User and Provider are requested to Please refrain from any kind of mal-practice and childish behavior<></br>
						</p>
					</div>
				</div>
          </div>
        </div>
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
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
  

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	
	
 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script src="script.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<!----<script type="text/javascript" src="js/contact_me.js"></script> --->
<script type="text/javascript" src="js/main.js"></script>
<script src="filterpanel/js/jquery.mixitup.min.js"></script>
<script src="filterpanel/js/main.js"></script>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="kusina/js/jquery.min.js"></script>
  <script src="kusina/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="kusina/js/popper.min.js"></script>

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
    



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
