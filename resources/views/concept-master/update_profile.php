



<?php
$id= $_GET['id'];
include "connection.php";
$sel="SELECT * FROM `user`WHERE id=$id";
$q=mysqli_query($conn,$sel);


if($_SERVER["REQUEST_METHOD"]=='POST'){
	if (!empty($_FILES["image"]["name"]) && is_uploaded_file($_FILES["image"]["tmp_name"])){
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

 $target_file;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

  
  $name = $_POST['name'];
 $email = $_POST['email'];
  $password = $_POST['password'];
  $photo = $target_file; 

  $update = "UPDATE `user` SET name='$name', email='$email', password='$password', img='$photo' WHERE id=$id";
  $query = mysqli_query($conn, $update);
  header('location:profile.php');
}
  else{
  	$name = $_POST['name'];
 $email = $_POST['email'];
  $password = $_POST['password'];
  $photo = $target_file; 
  	 $update = "UPDATE `user` SET name='$name', email='$email', password='$password'WHERE id=$id";
  $query = mysqli_query($conn, $update);
  header('location:profile.php');
}
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Stylish Form</title>
</head>
<body>
<?php include "webhed.php";?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
            	<?php foreach ($q as $row) {?>
                <div class="card-body">
                    <h5 class="card-title text-center">Update</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>






