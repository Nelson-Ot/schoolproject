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


    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <section class="login-reg">
                    <div class="container">
                        <div class="row">
                            <div class="login-main add-list add-ncate">
                                <div class="log-bor">&nbsp;</div>
                                <span class="udb-inst">Edit Product Category</span>
                                <div class="log log-1">
                                    <?php



                                    $sql = "SELECT * FROM homepageimg WHERE id = " . $_GET['edit'] . "";
                                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <div class="login">
                                            <h4>Edit this Product Category</h4>
                                            <form name="category_form" id="category_form" method="post" action="" enctype="multipart/form-data" class="cre-dup-form cre-dup-form-show">


                                                <ul>
                                                    <li>
                                                        
                                                        <!--FILED START-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Choose category image</label>
                                                                    <input type="file" class="form-control" name="f_up" id="category_image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FILED END-->
                                                    </li>
                                                </ul>
                                                <button type="submit" name="up_cat" class="btn btn-primary">Update</button>
                                            </form>
                                            <div class="col-md-12">
                                                <a href="admin-all-product-category.html" class="skip">Go to All Category >></a>
                                            </div>
                                            <div class="ud-notes">
                                                <p><b>Notes:</b> Hi, Category image size like 640x480 PX. You better to upload compressed images because it's affected page loading time. <br>Image compressing tool: <a href="https://tinypng.com" target="_blank">tinypng.com</a></p>
                                            </div>

                                            <?php
                                            if (isset($_POST['up_cat'])) {
                                              


                                                if (!empty($_FILES["f_up"]["name"])) {


                                                    $fileName = $_FILES['f_up']['tmp_name'];
                                                    $sourceProperties = getimagesize($fileName);
                                                    $resizeFileName = time();
                                                    $uploadPath = "images/homepage/";
                                                    $fileExt = pathinfo($_FILES['f_up']['name'], PATHINFO_EXTENSION);
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
                                                   $sql =  $conn->query("update homepageimg set img='" . $url . "' where id=" . $_GET['edit'] . "");

                                                   if($sql){
                                                    $extra="admin-all-product-category.php";
                                                    echo "<script>window.location.href='".$extra."'</script>";
                                                    exit();
                                                   }else{
                                                       echo "<script>window.location.href='admin-product-category-edit.php?error'</script>";
                                                   }
                                                } 
                                            ?>

                                              

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    <?php  } ?>
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