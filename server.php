<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION["success"] = "";

	// connect to database
	$db = mysqli_connect('mysql.foodiliciousbite.com', 'biteuser', 'Abs159..', 'foodiliciousbite');
	//dbname here
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		if($password_1==$password_2){
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "SELECT U.user_id,U.username,U.email FROM users U  WHERE U.email='$email' AND U.password='$password' ";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) >=1) {
				
				echo "<script>
			alert('Email and Password Already Exist');
			window.location.href='signin.php';
			</script>";
				
			}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			
		


			$query = "INSERT INTO users (username,email,password) 
					  VALUES('$username','$email', '$password')";
			mysqli_query($db, $query);
			$last_id = $db->insert_id;
		
            

			$_SESSION["username"] = $username;
			$_SESSION["user_id"] = $last_id;
				
			echo "<script>location='products.php'</script>";
			

			//echo "<script>location='https://www.foodiliciousbite.com/createshop.php'</script>";
		}

	}
	
	
	}
	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		if (empty($email)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
									
			$password = md5($password);
			$query = "SELECT U.user_id,U.username,U.email FROM users U  WHERE U.email='$email' AND U.password='$password' ";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) <1) {
				
				echo "<script>
			alert('Email and Password Not Found');
			window.location.href='signin.php';
			</script>";
				
			}
			if (mysqli_num_rows($results) >1) {
				
					echo "<script>
			alert('Multiple Record Found With Matching Format');
			window.location.href='signin.php';
			</script>";
				
			}
			
			
			if (mysqli_num_rows($results) == 1) {
				 //echo "<script type='text/javascript'>alert('$email');</script>";
				while ($row = mysqli_fetch_array($results)) {
				$user_id=$row['user_id'];
				//$profile_image=$row['image_name'];
				$username=$row['username'];
   
			
			}
            echo "<script type='text/javascript'>alert('$username');</script>";
                $_SESSION["username"] = $username;
				$_SESSION["user_id"] = $user_id;
                $_SESSION["postyouradreload"]=1;
                 $testusername=$_SESSION["username"];
                // $testuserid=$_SESSION["user_id"];
                echo "<script type='text/javascript'>alert('$testusername');</script>";
                echo "<script>location='products.php'</script>";	

				//$_SESSION["profile_image_name"] = $profile_image;
				//$_SESSION["success"] = "You are now logged in";
                 //echo "<script type='text/javascript'>alert('$testusername');</script>";
                // echo "<script type='text/javascript'>alert('$testuserid');</script>";
				//echo "<script type='text/javascript'>alert('You are logged in');</script>";
				

				if(isset($_SESSION["url"])){
					$redirect=$_SESSION["url"];
				echo "<script>location='products.php'</script>";
				}
				else{
				$redirect='products.php';
                //echo "<script type='text/javascript'>alert('Session URL is not set');</script>";
				echo "<script>location='products.php'</script>";	
					
				}
				
			}else {
				array_push($errors, "");
			}
				
		}
	}

?>