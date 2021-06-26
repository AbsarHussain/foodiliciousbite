<?php
// Always start this first
session_start();
include('config.php');

if( isset($_POST['submit-login'])) {
    if ( isset( $_POST['user_email'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
		$user_email = mysqli_real_escape_string($db, $_POST['user_email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
        $sql = "Select *  from t_user where user_email like '%$user_email%' AND password like '%$password%' ";
		//$result = mysqli_query($link, "SELECT * FROM table1")
		
		$result = mysqli_query($db, $sql);
		$num_rows = mysqli_num_rows($result);
		if($num_rows==0){
			echo "<script>
			alert('Unidentified User Email & Password');
			window.location.href='logintest.php';
			</script>";
		}
		else{
		while ($row = mysqli_fetch_array($result)){
		$user_name=$row['user_name'];	
		$user_id=$row['user_id'];
		}
		}
		echo $user_name;
    	if($user_name !=null)
		{
			session_start();
			$_SESSION['user_name']= $user_name; 
			$_SESSION['login_user']= $user_name; 
			$_SESSION['user_id']=$user_id;
			if(isset($_SESSION['url'])){
			    header( "Location:".$_SESSION['url']."" );
			}
			else{
			header("Location: index.php");}
		}
		// Verify user password and set $_SESSION
    	
    }
}
?>