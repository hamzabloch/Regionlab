
<?php  
 include "connection.php"; 

    $pid=($_GET['id']);

$select_P="SELECT * FROM `product`WHERE id=$pid";
$result = mysqli_query($conn, $select_P);
if (mysqli_num_rows($result)>0){

     while($row=mysqli_fetch_assoc($result)){  
?>


<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content" style="padding-top: 75px !important;">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form class="card" method="post" action="" enctype="multipart/form-data">
                    <h5 class="card-header">Edit Product</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" type="text" class="form-control" name="name" required value="<?php echo $row['name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="inputText4" class="col-form-label">Price</label>
                            <input id="inputText4" type="number" class="form-control" name="price" required value="<?php echo $row['price']; ?>">
                        </div>

 


                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="img" accept="image/*">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                         <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control editor1" id="editor" rows="3" name="discription"><?php echo $row['discription']; ?></textarea>
                                            </div>

                        <div class="form-group">
                            <input id="inputText5" type="submit" class="form-control btn btn-primary" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>






<?php
if (isset($_POST["submit"])) {
    $p_name = $_POST['name'];
    $p_price = $_POST['price'];
    $p_discription = $_POST['discription'];


    if (!empty($_FILES["img"]["name"]) && is_uploaded_file($_FILES["img"]["tmp_name"])) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $pic = $target_file;
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    

    $update_p = "UPDATE `product` SET name='{$p_name}', discription='{$p_discription}', price='{$p_price}', img='{$pic}' WHERE id='{$pid}'";

    $sql = mysqli_query($conn, $update_p);
    if ($sql) {
        header("location:productshow.php");
        exit();
    }else{
        echo "sadgfdagfdg";
    }
}
else{

    $update_p = "UPDATE `product` SET name='{$p_name}',discription='{$p_discription}', price='{$p_price}'  WHERE id='{$pid}'";


    $sql = mysqli_query($conn, $update_p);
    if ($sql) {
        header("location:productshow.php");
        exit();
    }
    
}
}
}
?>



<?php include'dashbar-header.php'; ?>
<?php include'sidebar.php'; ?>
<?php include'footer.php'; ?>