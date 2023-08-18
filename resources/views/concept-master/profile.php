<?php
include "connection.php";
session_start();
if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit(); 
}

$id = $_SESSION['id'];
$sel = "SELECT * FROM `user`WHERE id=$id";
 $result = mysqli_query($conn, $sel);
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); 
}


$selitem = "SELECT * FROM `order_item` LEFT JOIN `product` ON `order_item`.`product_id`=`product`.`id` WHERE `order_item`.`user_id` = $id";
$qu = mysqli_query($conn, $selitem);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Profile</title>
</head>

<body>
        <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="indexweb.php"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li>
                                <?php 
            if (@$_SESSION['email']=='admin555@gmail.com') {
                                ?>
                            <li style="padding: 10px;">
                    <a href="productshow.php" class="" style="margin-right: 20px;">Admin</a>
                            </li>
                        <?php } ?>
                            </li>

                            <li class="nav-item active"><a class="nav-link" href="../indexweb.php">Home</a></li>

                                <li class="nav-item"><a class="nav-link" href="../Logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="card">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card-body">
                <div class="user-avatar text-center d-block">
                   <img src="<?php echo $row['img']; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl" style="width: 170px; height: 170px; object-fit:cover;">


                </div>
                <a href="update_profile.php?id=<?php echo $id ?>" class="btn btn-dark">Update</a>
                <a href="../indexweb.php" class="btn btn-light">Go to Home</a>
                <div class="text-center">
                    <h2 class="font-24 mb-0"><?php echo $row['name']; ?></h2>
                </div>
            </div>
            <div class="card-body border-top">
                <h3 class="font-16">Contact Information</h3>
                <div class="">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo $row['email']; ?></li>
                    </ul>
                </div>
            </div>
            
<div class="card-body border-top">
    <?php 
    $currentOrderId = null;
    $isFirstOrder = true;
    foreach ($qu as $value) {
        if ($currentOrderId !== $value['order_id']) {
            if ($currentOrderId !== null) {
                echo "</table>";
                     echo "<br>";
              
            }
            echo "<h3 class='font-16'>Order: " . $value['order_id'] . "</h3>";
            echo "<table class='w-75 text-center'>"; // Modify table class
            if ($isFirstOrder) {
                echo "<thead >";
                echo "<th>Name</th>";
                echo "<th>Img</th>";
                echo "<th>Price</th>";
                echo "<th>Quantity</th>";
                echo "</thead>";
                $isFirstOrder = false;
            }
            echo "<tbody>";
            $currentOrderId = $value['order_id'];
        }
        echo "<tr class='mx-auto'>";
        echo "<td class='w-25'>" . $value['name'] . "</td>";
        echo "<td class='w-25'><img src='" . $value['img'] . "' class='w-25'></td>";
        echo "<td class='w-25'>" . $value['price'] . "</td>";
        echo "<td class='w-25'>" . $value['quantity'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>"; 
    ?>
</div>



      
        <?php } ?>
   
    </div>
          
 
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
   
</body>
 
</html>