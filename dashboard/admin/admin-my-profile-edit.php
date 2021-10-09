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

    <!-- END -->
    <!-- START -->
    <section>
    <?php 
                $ret = mysqli_query($conn, "select * from users where user_id=".$_GET['edit']."");

                while ($row = mysqli_fetch_array($ret)) {
                    ?>
            
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">User Edit Details</span>
                    <div class="ud-cen-s2 ud-pro-edit">
                        <h2>Edit Profile details</h2>
                        <form name="register_form" id="register_form" method="post" action="" enctype="multipart/form-data" class="">

                            

                            <table class="responsive-table bordered">
                                <tbody>
                                    <tr>
                                        <td>First Name</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" required="required" autocomplete="off" name="first_name" id="first_name" class="form-control" value="<?php echo $row['first_name'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Second name</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" required="required" autocomplete="off" name="l_name" id="first_name" class="form-control" value="<?php echo $row['last_name'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" required="required" autocomplete="off" name="u_name" id="u_name" class="form-control" value="<?php echo $row['uname'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email id</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="email" required="required" autocomplete="off" name="email_id" id="email_id" class="form-control" value="<?php echo $row['user_email'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>mobile number</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="tel" required="required"  autocomplete="off" name="u_number" id="u_number" class="form-control" value="<?php echo $row['user_phone_number'];?>">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pofile password</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="password" autocomplete="off" required="required" name="password" id="password" class="form-control" value="<?php echo $row['upassword'];?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>county</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="county" class="form-control" placeholder="County" value="<?php echo $row['county'];?>">
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
                                            <button type="submit" name="register_up" class="db-pro-bot-btn">Update User</button>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <?php
                                if (isset($_POST['register_up'])) {
                                    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
                                    $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
                                    $u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
                                    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
                                    $u_number = mysqli_real_escape_string($conn, $_POST['u_number']);
                                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                                    $county = mysqli_real_escape_string($conn, $_POST['county']);
                                    $sql_e = mysqli_query($conn, "select user_id from users where user_email='".$email_id."' ");
                                    $row_e = mysqli_num_rows($sql_e);
                                    $sql_u = mysqli_query($conn, "select user_id from users where uname='".$u_name."'");
                                    $row_u = mysqli_num_rows($sql_u);
                                    if ($row_e > 0) {
                                        echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
                                    } else if ($row_u > 0) {




                                        echo "<script>alert('username id already exist with another account. Please try with other email id');</script>";
                                    } else {

                                    if (!empty($_FILES["f_up"]["name"])) {
                                        $fileName = $_FILES['f_up']['tmp_name'];
                                        $sourceProperties = getimagesize($fileName);
                                        $resizeFileName = time();
                                        $uploadPath = "images/users-profile-pic/";
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
                                           

                                           $mysql = $conn->query("update users set first_name='" . $first_name . "',last_name='" . $l_name . "',uname='" . $u_name . "',user_email='" . $email_id . "',user_phone_number='" . $u_number . "',upassword='" .$password . "',county='".$county."'profilepic='" . $url . "' where user_id='" . $_GET['edit'] . "' ");  
                                            if ($mysql){
                                                $extra = "admin-all-users.php";
                                                echo "<script>window.location.href='" . $extra . "'</script>";
                                                exit();
                                            }else{
                                                echo "Something went wrong";
                                            }
                                           
                                        }
                                    }
                                    $conn->query("update users set first_name='" . $first_name . "',last_name='" . $l_name . "',uname='" . $u_name . "',user_email='" . $email_id . "',user_phone_number='" . $u_number . "',county='".$county."',upassword='" .$password . "' where user_id='" . $_GET['edit'] . "' ");  
    
                                    $extra = "admin-all-users.php";
                                    echo "<script>window.location.href='" . $extra . "'</script>";
                                    exit();
                                   
                                }
                                     ?>
                            </table>
                        </form>

                    </div>


                </div>

            </div>
        </div>
        <?php } ?>
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