<?php
session_start();
include('config.php');	
$_SESSION["url"] = $_SERVER["REQUEST_URI"]."";
if(isset($_SESSION["username"])){
$user_id=$_SESSION["user_id"];
$user_name=$_SESSION["username"];
}
else{
//echo "<script>alert('$user_id')</script>";
//echo "<script>location='signin.php'</script>";

}
  

  $query_shops = "select * from t_shops where user_id =".$_SESSION["user_id"]."";
  $result_shops = mysqli_query($db, $query_shops);
  $query_dc = "select dc_name,dc_id from t_dc ";
  $result_dc = mysqli_query($db, $query_dc);
  $query_dt = "select delivery_time_id,delivery_time_name from t_delivery_time ";
  $result_dt = mysqli_query($db, $query_dt);
  ?>
<html lang="en">
<head>
        <title>Luigi's</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
         <link rel="shortcut icon" href="images/logoicon.png">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">

</head>
<body>

<header>
        <div class="container">
                

                <div class="right-area">
                        
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                     <li><a href="index.php">DISHES</a></li>
                        <?php
						if(isset($_SESSION['user_id'])){?>
						<li><a href="createshoploc.php">CREATE RESTAURANT</a></li>
						<li><a href="myshops.php">MY RES.</a></li>
						
						<li><a  href="logout.php?logout='1'" style="color: red;">LOGOUT</a></li>
						<?php }
						else{?>
						<li><a   href="signin.php" style="color: Green;">LOGIN</a></li>
                        <li><a href="postyourad.php">Post Ad</a></li>
						<?php }?>
						<li><a href="contactus.php">CONTACT US</a></li>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>


<section class="bg-6 h-100x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                              <!--  <h5><b>SAY HELLO To New Dish</b></h5>-->
                              <!--  <h3 class="mt-30 mb-15">Post Ads</h3>-->
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
         <div class="container">
               
 <div class="heading">
    <div class="mt-10 mb-30">
                    <div class="p-3">
			<h3>Dish For Sell</h3>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                    <form method="POST" action="sharedish.php" enctype="multipart/form-data">
              <div class="row">
			  <div class="col-md-12">
                  <div class="form-group">
              
				<input type="text" class="form-control" placeholder=<?php echo $user_id;?> name="user_id" 
				value="<?php echo $_SESSION['user_id'];?>" hidden >
                </div>
                </div>
				<div class="col-md-12">
                  <div class="form-group">
                  
                    <textarea
                    class="form-control"					
      	            id="text"
      	            cols="35"
      	            rows="3"
      	            name="title"
		            maxlength="100"
      	            placeholder="Title or Name of your Dish (Two Images Are Compulsory)" required></textarea>
                  </div>
                </div>
				 <div class="col-md-12">
                  <div class="form-group">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="size" value="100000">
  	               <div>
                	<input type="file" name="image"  required>
  	                </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <input type="hidden" name="size" value="100000">
	                <div>
	                 <input type="file"  name="image2"  Placeholder= "This image is required "required>
  	                </div>
                   </div>
                </div>
				
	<div class="col-md-6">
                  <div class="form-group">
                   <input type="hidden" name="size" value="100000">
	                <div>
	                 <input type="file" name="image3" >
  	                </div>
                   </div>
                </div>
                				<div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="size" value="100000">
  	               <div>
                	<input type="file" name="image4"  >
  	                </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <input type="hidden" name="size" value="100000">
	                <div>
	                 <input type="file"  name="image5" >
  	                </div>
                   </div>
                </div>
				
				
	<div class="col-md-6">
                  <div class="form-group">
                   <input type="hidden" name="size" value="100000">
	                <div>
	                 <input type="file" name="image6" >
  	                </div>
                   </div>
                </div>

				
                <div class="col-md-6">
                  <div class="form-group">
				<input type="text" placeholder="Servings" name="serving" value='1' class="form-control" required>
				</div>
				</div>
				<div class="col-md-6">
				</div>
                
				<div class="col-md-6">
				<div class="form-group">
              
				<select name="shop_id"  class="form-control" required>
                    <?php
					$shop_ids=[];
					$shop_names=[];
					while ($row_shop = mysqli_fetch_array($result_shops)) {
					$shop_id=$row_shop['shop_id'];
					$shop_name=$row_shop['shop_name'];
					$shop_names[]=$shop_name;
					$shop_ids[]=$shop_id;
					echo '<option  class="form-control" value="'.$shop_id.'"> '.$shop_name.'</option>';
                    }?>
					
                </select>
                </div>
				</div>
				

				<div class="col-md-12">
				</div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea
					class="form-control"
      	            id="text"
      	            cols="40"
      	            rows="3"
                    maxlength="2000"		
      	            name="details"
      	            placeholder="Details of the dish you would like to share, Nearby areas where delivery will be available and the timings. This data provided here will allow users to search dishes of their requirement"></textarea>
                  </div>
                </div>
				<div class="col-md-6">
                  <div class="form-group">
            			
				<input type="text" class="form-control" placeholder="Price (only Numbers)" name="price" required>
			    </div></div>
				
				
									<div class="col-md-12">
                  <div class="form-group">
            			
				
				<select name="deliverycharges"  class="form-control" required>
                    <?php while ($row_dc = mysqli_fetch_array($result_dc)) {?>
                    <option value="<?php echo $row_dc['dc_id'];?>"><?php echo $row_dc['dc_name'];?></option> <?php }?>
					
</select>
			 </div></div>
			<div class="col-md-12">
                  <div class="form-group">
            	<select name="deliverytime"  class="form-control" required>
                   <?php while ($row_dt = mysqli_fetch_array($result_dt)) {?>
                    <option value="<?php echo $row_dt['delivery_time_id'];?>"><?php echo $row_dt['delivery_time_name'];?></option> <?php }?>
                    </select>
</div></div>
				    
				
				
				
				<div class="col-md-6">
                  <div class="form-group">
				<select name="delivery" id="dropdowndelivery" class="form-control" required>
	  <option value="2">Close by Areas Within City</option>
	   
	   <option value="3">All Areas of City</option>
	  <option value="4">All Over Country</option>
	  <option value="0">Pickup Only </option>
	  <option value="5">International</option>
	  
	 


    </select>
				</div></div>
				<div class="col-md-6"></div>
				<div class="col-md-6">
                  <div class="form-group">
				<select name="category"  class="form-control" required>
                    <option value="" disabled selected>Choose A Category</option>
                    <option value="1">Cooked/Ready To Cook</option>
                    <option value="3">Baked/Sweets</option>
                    <option value="8">Drinks</option>
                    <option value="9">Deal</option>
                    <option value="4">Monthly/Weekly Package</option>
                    <option value="6">Cooking Ingredients/Masalas/Spices/Achar/Pickles</option>
                    <option value="2">Raw/Whole sale/(Dry)Fruits/Veg./Fish/Etc</option>
                    <option value="5">Gifts And Party Items</option>
                    <option value="7">Events Organization/Decoration And Food</option>
                    

                </select>
				</div></div>
				
				
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                  
					<h6 class="center-text mtb-30">
					
					<input type="submit" name="upload"  value="Share" class="btn-primaryc plr-25">
					
					</h6>
                  </div>
                </div>
				
              </div>
            </form>
			</div>
</div>
</div>
</div>
			

      

		
		</section>


<footer class="pb-50  pt-70 pos-relative footer-bg-1">

        <div class="container-fluid">
                
                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p>Johar Chorangi, Karachi </p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:+923322075131 ">+923322075131</a>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b></b></p>
                        <a href="mailto:"> </a>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-oEyU88bRR6xcbV1gI_Cahc8ugKC_JPE&callback=initMap"></script>

</body>
</html>