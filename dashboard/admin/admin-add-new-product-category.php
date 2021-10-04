<?php
session_start();

include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {


    include 'includes/header.php';
?>

    <?php
    function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
    {
        $resizeWidth = 250;
        $resizeHeight = 250;
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

    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <section class="login-reg">
                    <div class="container">
                        <div class="row">
                            <div class="login-main add-list add-ncate">
                                <div class="log-bor">&nbsp;</div>
                                <span class="udb-inst">New Product Category</span>
                                <div class="log log-1">
                                    <div class="login">
                                        <h4>Add New Product Category</h4>
                                        <?php  $_SESSION['status_msg'] = "The Given Category name  Already Exist Try Other!!!";  
                                        ?>

                                        <form name="category_form" id="category_form" method="post" action="" class="cre-dup-form cre-dup-form-show" enctype="multipart/form-data">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category name *" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Choose category image</label>
                                                                <input type="file" name="category_image" id="category_image" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="submit" name="category_submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        <div class="col-md-12">
                                            <a href="admin-all-product-category.php" class="skip">Go to All Category >></a>

                                        </div>
                                        

                                        <?php
                                        if (isset($_POST['category_submit'])) {

                                            $cname = mysqli_real_escape_string($conn, $_POST['category_name']);

                                            $category_name_exist_check = mysqli_query($conn, "SELECT * FROM product_category  WHERE cat_name='" . $cname . "' ");

                                                if (mysqli_num_rows($category_name_exist_check) > 0) {

                                                    $_SESSION['status_msg'];
                                                    

                                                    $extra="admin-add-new-product-category.php";
                                            echo "<script>window.location.href='".$extra."'</script>";
                                            exit();
                                                }


                                            $fileName = $_FILES['category_image']['tmp_name'];
                                            $sourceProperties = getimagesize($fileName);
                                            $resizeFileName = time();
                                            $uploadPath = "images/product-categories/";
                                            $fileExt = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
                                            $uploadImageType = $sourceProperties[2];
                                            $sourceImageWidth = $sourceProperties[0];
                                            $sourceImageHeight = $sourceProperties[1];
                                            $new_width = $sourceImageWidth;
                                            $new_height = $sourceImageHeight;
                                            switch ($uploadImageType) {
                                                case IMAGETYPE_JPEG:
                                                    $resourceType = imagecreatefromjpeg($fileName);
                                                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                                                    imagejpeg($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                                                    break;

                                                case IMAGETYPE_GIF:
                                                    $resourceType = imagecreatefromgif($fileName);
                                                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                                                    imagegif($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
                                                    break;

                                                case IMAGETYPE_PNG:

                                                    $resourceType = imagecreatefrompng($fileName);
                                                    $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
                                                    imagepng($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);

                                                    break;


                                                default:
                                                    $imageProcess = 0;
                                                    break;
                                            }

                                            $url = $uploadPath . "thump_" . $resizeFileName . "." . $fileExt;
                                           $sql = $conn->query("insert into product_category(`cat_name`,`cat_img`)values('" . $cname . "','" . $url . "')");
                                           if($sql){
                                            $extra="admin-all-product-category.php";
                                            echo "<script>window.location.href='".$extra."'</script>";
                                            exit();
                                           }else{
                                               echo "<script>window.location.href='admin-add-new-product-category.php?error'</script>";
                                           }
                                        ?>

                                           
                                        <?php
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