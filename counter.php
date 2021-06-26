<?php
 session_start();
   if(isset($_GET['contact'])){
       if(isset($_GET['product_id'])){$product_id=$_GET['product_id'];}else{$product_id=null;}
       if(isset($_GET['shop_id'])){$shop_id=$_GET['shop_id'];}else{$shop_id=null;}
$contact=(isset($_GET['contact']))?$_GET['contact']:'';
$method=(isset($_GET['method']))?$_GET['method']:'';
}

$db = mysqli_connect("mysql.foodiliciousbite.com", "biteuser", "Abs159..", "foodiliciousbite");
	$sql = "INSERT INTO t_contact_pressed (product_id,contact,method,shop_id) VALUES ('$product_id','$contact','$method','$shop_id')";
  	if($db->query($sql) == TRUE)
	{$product_sql=True;
    if($method=='whatsapp')
    {
        $url='https://api.whatsapp.com/send?phone='.$contact.'$&text=I am interested in The dish in link  \n https://www.foodiliciousbite.com/productdetailpage.php?product_id='.$product_id.' \n is it available?';
    echo "<script>location='".$url."'</script>";

    }
    elseif($method=='call')
    {
    $url='tel:'.$contact;
    echo "<script>location='".$url."'</script>";
    //header('Location: '.$url);
    }
    }
    else{
	  if($method=='whatsapp')
    {
        $url='https://api.whatsapp.com/send?phone='.$contact.'$&text=I am interested in The dish in link \n https://www.foodiliciousbite.com/productdetailpage.php?product_id='.$product_id.' \n is it available?';
    echo "<script>location='".$url."'</script>";

    }
    elseif($method=='call')
    {
    $url='tel:'.$contact;
    echo "<script>location='".$url."'</script>";
    }
	}
    ?>