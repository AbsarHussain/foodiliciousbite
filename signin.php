<?php
    session_start();
    ?>
<?php
 include('sessionset.php'); ?>
<html lang="en">
<head>
   <title>Foodiliciousbite - Taste and Health jumping into the mouth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="JavaScript/jquery-1.6.1.min.js" type="text/javascript"></script>
    
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

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Foodiliciousbite</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item active"><a href="signin.php" class="nav-link">Signin</a></li>
				<li class="nav-item"><a href="How-it-works.html" class="nav-link">How to Buy/Sell</a></li>
				<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="terms-of-use.html" class="nav-link">Terms of Use</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('kusina/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
             <h1 class="mb-2 bread">Welcome On Board</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Welcome On Board <i class="ion-ios-arrow-forward"></i></span></p>
                     

		   </div>
        </div>
      </div>
    </section>
	<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
	
    <div class="container" style="margin-top:100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
				
                
                
				
                <form class="mt-4" method="post" >
                            <div class="row">
							
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input class="form-control" name="email" id="email" type="text"
                                            placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        
                                        <input class="form-control" name="password" id="pwd" type="password"
                                            placeholder="Password">
                                    </div>
                                </div>
									
								
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark btn-primaryc" name="login_user">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">Don't have an account? <a href="signup.php" class="text-danger">Sign Up</a>
                                </div>
                            </div>
                        </form>
                <a href="login.php" class="nav-link">Login</a>
                <a href="Password_Reset.php" class="nav-link">Reset Password</a>
			
			
			</div>
			
        </div>
    
	</div>
	
	
	</div>

	</section>
	
	<section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="col-md-6">
                  <div class="form-group">
    </div>
	</div>

	</section>


	<script type="text/javascript">
		
        function sendEmail() {
            var name = $("#name");
            var emailto = $("#emailto");
			alert("We Are Processing your Request, You Will Receive An Email Shortly With Password");

            if (isNotEmpty(name) && isNotEmpty(emailto) ) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       emailto: emailto.val(),
                   }, success: function (response) {
                        if (response.status == "success")
                            alert('Email Has Been Sent!');

                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
                
                
                

            }
        
		}
		
        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script src="script.js"></script>
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<!----<script type="text/javascript" src="js/contact_me.js"></script> --->
<script type="text/javascript" src="js/main.js"></script>
<script src="filterpanel/js/jquery.mixitup.min.js"></script>
<script src="filterpanel/js/main.js"></script>

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



