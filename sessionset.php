<?php
    
?>
<?php
$db = mysqli_connect('mysql.foodiliciousbite.com', 'biteuser', 'Abs159..', 'foodiliciousbite');
$username="is unset";
$user_id="";
$errors = [];
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
			elseif (mysqli_num_rows($results) >1) {
				
				echo "<script>
			alert('More Than 1 Matching Record Found');
			window.location.href='signin.php';
			</script>";
				
			}
			
			if (mysqli_num_rows($results) == 1) {
				 //echo "<script type='text/javascript'>alert('$email');</script>";
				while ($row = mysqli_fetch_array($results)) {
				$user_id=$row['user_id'];
				//$profile_image=$row['image_name'];
				$username=$row['username'];
                $_SESSION["username"] = $username;
                echo $username;
			}
                $_SESSION["username"] = $username;
				$_SESSION["user_id"] = $user_id;
                $testusername=$_SESSION["username"];
                // $testuserid=$_SESSION["user_id"];
                $redirect='products.php';
                //echo "<script type='text/javascript'>alert('Session URL is not set');</script>";
				echo "<script>location='products.php'</script>";	
			}
				
		}
	}

               
?>