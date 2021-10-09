<?php
session_start();

include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {


    include 'includes/header.php';


    /// for deleting user
    if (isset($_GET['delete'])) {
        $adminid = $_GET['delete'];
        $msg = mysqli_query($conn, "delete from products where id='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    }



?>

    <?php
    function resizeImage($resourceType, $image_width, $image_height, $resizeWidth, $resizeHeight)
    {
        $resizeWidth = 1920;
        $resizeHeight = 900;
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
                            <div class="login-main add-list posr">
                                <div class="log-bor">&nbsp;</div>
                                <span class="udb-inst">Add Slider Photo</span>
                                <div class="log log-1">
                                    <div class="login">
                                        <h4>Add New Slider Photo</h4>
                                        <form name="slider_form" id="slider_form" method="post" action="" enctype="multipart/form-data">

                                            <ul>
                                                <li>
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Choose slider image</label>
                                                                <input type="file" name="sl_up" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    

                                                </li>
                                            </ul>
                                            <!--FILED START-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="slider_submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <div class="col-md-12">
                                                    <a href="profile.html" class="skip">Go to User Dashboard >></a>
                                                </div>
                                            </div>
                                            <!--FILED END-->
                                        </form>

                                        <?php
                                        if (isset($_POST['slider_submit'])) {
                                            

                                            $fileName = $_FILES['sl_up']['tmp_name'];
                                            $sourceProperties = getimagesize($fileName);
                                            $resizeFileName = time();
                                            $uploadPath = "images/slider/";
                                            $fileExt = pathinfo($_FILES['sl_up']['name'], PATHINFO_EXTENSION);
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
                                         $sql =  $conn->query("insert into slider(`slimg`)values('" . $url . "')");

                                            if($sql){
                                                $extra = "admin-slider-all.php";
    
                                                echo "<script>
                                                alert('slider added succesfully');
                                                
                                                window.location.href='" . $extra . "'
                                                </script>";
                                                exit();
                                                    
    
                                               }else{
                                                   echo "<script>
                                                   alert('something went wrong);";
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