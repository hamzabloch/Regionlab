<?php include 'dashbar-header.php'; ?>
<?php  
include 'connection.php';

$select_P="SELECT * FROM `product`";
$result = mysqli_query($conn, $select_P);
?>
<div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tables</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                  
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          
                        <div class="card">
                            <h5 class="card-header">Product Table
                            	<a href="add-product.php"><button class="btn btn-dark ml-5">Add Product</button>
                                </a>
                            </h5>
                             
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Discription</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>
                                                	Edit
                                                </th>
                                                <th>
                                                	Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($result as $row) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["name"]; ?></td>
                                                <td><?php echo $row["discription"]; ?></td>
                                                <td><?php echo $row["price"]; ?></td>
                                                 <td><img src=" <?php echo $row["img"]; ?>" class="w-25 ">  
                                                    </td>
                                                <td>
                                                    <a href="edit-product.php?id=<?php echo $row["id"]; ?>">
                                                	<button class="btn btn-success font-weight-bold">Edit</button>
                                                </a>
                                                </td>
                                                <td>
                                                    <a href="delete-product.php?id=<?php echo $row["id"]; ?>">
                                                	<button class="btn btn-danger font-weight-bold">Delete</button>
                                                </a>
                                                </td>
                                               
                                            </tr>
                                            
                                        </tbody>
                                         <?php } ?> 
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>