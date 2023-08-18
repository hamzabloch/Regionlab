<?php 


include "connection.php"; 

    $pid=($_GET['id']);

    $del="DELETE FROM `product` WHERE id=$pid";
    $sql=mysqli_query($conn,$del);
    if ($sql) {
    	header('location:productshow.php');
    }else{
    	echo "Not deleted";
    }

 ?>