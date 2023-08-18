

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content" style="padding-top: 75px !important;">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form class="card" method="post" action="" enctype="multipart/form-data">
                    <h5 class="card-header">Add Product</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="inputText4" class="col-form-label">Price</label>
                            <input id="inputText4" type="number" class="form-control" name="price">
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                     <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control " id="editor" rows="3" name="discription"></textarea>
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

<?php
if(isset($_POST["submit"])) {
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        $pic = $target_file;
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    $pic = $target_file;
    $p_name = $_POST['name'];
    $p_price = $_POST['price'];
    $p_description = $_POST['discription'];

    include "connection.php";
    $insert_p = "INSERT INTO `product` (name,discription, price, img) VALUES ('$p_name', '$p_description', '$p_price', '$pic')";
    $sql = mysqli_query($conn, $insert_p);
    if ($sql) {
        header('Location:productshow.php');
         exit();
    }else
    {
        echo "Product not added";
    }
}
?>
<?php include'dashbar-header.php'; ?>
<?php include'sidebar.php'; ?>
<?php include'footer.php'; ?>
