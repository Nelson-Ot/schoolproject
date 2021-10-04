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
                <div class="ud-cen">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Settings</span>
                    <div class="ud-cen-s2 ud-pro-edit">
                        <h2>Admin details</h2>
                        <form name="setting_form" id="setting_form" method="post" enctype="multipart/form-data" action="">
                            <table class="responsive-table bordered">
                                <input type="hidden" autocomplete="off" name="footer_id" value="1" id="footer_id" class="validate">
                                <input type="hidden" autocomplete="off" name="admin_password_old" value="21232f297a57a5a743894a0e4a801fc3" id="admin_password_old" class="validate">
                                <input type="hidden" class="validate" id="header_logo_old" name="header_logo_old" value="28482bizbook-white.png" required="required">
                                <input type="hidden" class="validate" id="admin_photo_old" name="admin_photo_old" value="147437.jpg" required="required">
                                <input type="hidden" class="validate" id="home_page_banner_old" name="home_page_banner_old" value="679305551554468man-sitting-on-bench-having-a-cup-of-coffee-374044.jpg" required="required">
                                <input type="hidden" class="validate" id="home_page_fav_icon_old" name="home_page_fav_icon_old" value="fav.ico" required="required">

                                <tbody>
                                    <?php
                                    $ret = mysqli_query($conn, "select * from admin where id='" . $_SESSION['id'] . "' ");

                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                     <tr>
                                            <td>Name</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" required="required" name="admin_name" value="<?php echo $row['Full_name']; ?>" placeholder="Name">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>User name</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" required="required" name="admin_username" value="<?php echo $row['username']; ?>" placeholder="Enter user name">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Admin Email :</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="admin_email" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?> ">
                                                </div>
                                            </td>
                                        </tr>


                                       
                                        <tr>
                                            <td>New Password</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="admin_password" value="<?php echo $row['password']; ?> ">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Profile picture</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="f_up" class="form-control">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <button type="submit" name="setting_submit" class="db-pro-bot-btn">Submit Changes</button>
                                            </td>
                                            <td></td>
                                        </tr>
                                </tbody>
                                <?php
                                        if (isset($_POST['setting_submit'])) {
                                            $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
                                            $admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
                                            $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
                                            
                                            $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);


                                            if (!empty($_FILES["f_up"]["name"])) {


                                                $fileName = $_FILES['f_up']['tmp_name'];
                                                $sourceProperties = getimagesize($fileName);
                                                $resizeFileName = time();
                                                $uploadPath = "images/profile-pic/";
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
                                                $conn->query("update admin set Full_name='" . $admin_name . "',username='" . $admin_username . "',email='" . $admin_email . "',password='" . md5($admin_password) . "',profilepicture='" . $url . "' where id='" . $_SESSION['id'] . "' ");
                                            } else {
                                                $conn->query("update admin set Full_name='" . $admin_name . "',username='" . $admin_username . "',email='" . $admin_email . "',password='" . md5($admin_password) . "' where id='" . $_SESSION['id'] . "' ");
                                            }
                                            $extra="profile.php";
                                            echo "<script>window.location.href='".$extra."'</script>";
                                            exit();
                                ?>

                                    

                                <?php
                                        }
                                ?>
                            <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>

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
    <script src="../js/select-opt.js"></script>
    <script src="js/admin-custom.js"></script>

    </body>

    </html>
<?php  } ?>