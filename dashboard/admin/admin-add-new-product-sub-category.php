<?php
session_start();
include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    // for deleting user
    if (isset($_GET['delete'])) {
        $adminid = $_GET['delete'];
        $msg = mysqli_query($conn, "delete from product_category where cat_id='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    }

    include 'includes/header.php';
?>

    <?php
    function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
    {
        $resizeWidth = 400;
        $resizeHeight = 400;
        $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
        $background = imagecolorallocate($imageLayer, 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($imageLayer, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($imageLayer, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($imageLayer, true);
        imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
        return $imageLayer;
    }
    ?>
    <!-- END -->

    <!-- START -->
    <?php include 'includes/leftaside.php'; ?>
    <!-- END -->
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <section class="login-reg">
                    <div class="container">
                        <div class="row">
                            <div class="login-main add-list add-ncate">
                                <div class="log-bor">&nbsp;</div>
                                <span class="udb-inst">New Product Sub Category</span>
                                <div class="log log-1">
                                    <div class="login">
                                        <h4>Add New Product Sub Category</h4>

                                        
                                       


                                        <form name="sub_category_form" id="sub_category_form" method="post" action="" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <select name="category_id" class="form-control" id="category_name"  required>
                                                            <option value="">select a category</option>
                                                            <?php
                                                            $cat = $conn->query("select * from product_category");
                                                            while ($res = $cat->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?php echo $res['cat_id'];?>"><?php echo $res['cat_name']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="subcategory_name" class="form-control" placeholder="Sub category name *" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="submit" name="subcat_submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        <div class="col-md-12">
                                            <a href="admin-all-product-sub-category.php" class="skip">Go to All Product Sub Category >></a>
                                        </div>

                                        <?php
                                       if(isset($_POST['subcat_submit']))
                                       {
                                           $cname=$_POST['category_id'];
                                           $sbcname=$_POST['subcategory_name'];
                                           
                                           
                                          
                                       $sql=mysqli_query($conn,"select cat_id from sub_cat where sub_cat_name='$sbcname'");
                                       $row=mysqli_num_rows($sql);
                                       if($row>0)
                                       {
                                           echo "<script>alert('sub category name exists in the system. Please try with another subcategory name');</script>";
                                       } else{
                                           $msg=mysqli_query($conn,"insert into sub_cat(cat_id,sub_cat_name) values('$cname','$sbcname')");
                                       
                                       if($msg)
                                       {
                                           echo "<script>alert('Register successfully');</script>";
                                           $extra = "admin-all-product-sub-category.php";
                                    echo "<script>window.location.href='" . $extra . "'</script>";
                                    exit();
                                       }
                                       }
                                       }
                                       ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
    <!-- END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="js/admin-custom.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    </body>

    </html>
<?php } ?>