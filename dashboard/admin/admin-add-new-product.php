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
        $resizeWidth = 600;
        $resizeHeight = 600;
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
                <div class="login-reg">
                    <div class="conntainer">
                        <form action="" class="product_form" id="product_form" name="product_form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="login-main add-list posr">
                                    <div class="log-bor">&nbsp;</div>
                                    <span class="udb-inst">Add Product</span>
                                    <div class="log log-1">
                                        <div class="login">
                                            <ul>
                                                <li>
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">

                                                                <select name="user_code" id="user_code" class="form-control" required="required">
                                                                    <option value="" selected="" disabled="">User name</option>
                                                                    <?php
                                                                    $su = mysqli_query($conn, "select * from users");
                                                                    while ($res = mysqli_fetch_assoc($su)) {
                                                                    ?>
                                                                        <option value="<?php echo $res['user_id']; ?>"><?php echo $res['uname']; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="product_name" id="product_name" required="required" class="form-control" placeholder="Product name *">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <select name="category_id" id="category_id" class="chosen-select form-control">


                                                                    <option value="" selected="" disabled="">Select category</option>
                                                                    <?php
                                                                    $cat = mysqli_query($conn, "select * from product_category");
                                                                    while ($res = mysqli_fetch_assoc($cat)) {
                                                                    ?>
                                                                        <option value="<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name']; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <select data-placeholder="Select Sub Category" name="sub_category" id="sub_category_id" class="chosen-select form-control">

                                                                    <option value="">Select sub category</option>


                                                                    <?php
                                                                    $scat = mysqli_query($conn, "select * from sub_cat");
                                                                    while ($sres = mysqli_fetch_assoc($scat)) {
                                                                    ?>
                                                                        <option value="<?php echo $sres['subcatid']; ?>"><?php echo $sres['sub_cat_name']; ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="product_price" id="product_price" required="required" class="form-control" onkeypress="return isNumber(event)" placeholder="Price *">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="discount_percentage" onkeypress="return isNumber(event)" id="product_price_offer" class="form-control" placeholder="Offer (i.e) 50%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->

                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" required="required" name="product_description" id="product_description" placeholder="Product descriptions..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Product image</label>
                                                                <input type="file" name="pimg" required="required" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Product images(max 5 images)</label>
                                                                <input type="file" name="prel[]" required="required" class="form-control" accept="image/png, image/jpeg" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->


                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="log">
                                                                <div class="login add-prod-oth">

                                                                    <h4>Specifications</h4>
                                                                    <span class="add-list-add-btn prod-add-oad" title="add new offer">+</span>
                                                                    <span class="add-list-rem-btn prod-add-ore" title="remove offer">-</span>
                                                                    <ul>
                                                                        <li>
                                                                            <!--FILED START-->
                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="product_info_question[]" class="form-control" placeholder="(i.e) 1kg of beans...">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group"> <i class="material-icons">arrow_forward</i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="product_info_answer[]" class="form-control" placeholder="(i.e) kshs 450">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--FILED END-->
                                                                        </li>

                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->

                                                    <!--FILED END-->
                                                </li>
                                            </ul>
                                            <!--FILED START-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="product_submit" class="btn btn-primary">
                                                        Submit
                                                    </button>
                                                </div>
                                                <div class="col-md-12">
                                                    <a href="dashboard.php" class="skip">Go to User Dashboard >></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
                        </form>
                        <?php
                        if (isset($_POST['product_submit'])) {
                            if (count($_FILES['prel']['name']) > 5) {
                        ?>

                                <script>
                                    alert('we only allow a maximum of five images');
                                    window.location.href = 'admin-add-new-product.php'
                                </script>

                                <?php
                            } else {
                                $ucode = $_POST['user_code'];

                                $pname = mysqli_real_escape_string($conn, $_POST['product_name']);

                                $catname = $_POST['category_id'];
                                $subcatname = $_POST['sub_category'];
                                $pprice =  $_POST['product_price'];
                                $discount = $_POST['discount_percentage'];
                                $pdesc = mysqli_real_escape_string($conn, $_POST['product_description']);






                                $fileName = $_FILES['pimg']['tmp_name'];
                                $sourceProperties = getimagesize($fileName);
                                $resizeFileName = time();
                                $uploadPath = "images/products/";
                                $fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
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
                                if (!empty($_FILES['prel']['name'][0])) {
                                    $arr = array();
                                    foreach ($_FILES['prel']['tmp_name'] as $key => $tmp_name) {
                                        $file_name = $key . $_FILES['prel']['name'][$key];
                                        $file_size = $_FILES['prel']['size'][$key];
                                        $file_tmp = $_FILES['prel']['tmp_name'][$key];

                                        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                                        if (
                                            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
                                            && $file_type != "gif"
                                        ) {
                                            $related = '';
                                        } else {

                                            move_uploaded_file($file_tmp, "images/products/related_images/" . $file_name);
                                            $arr[] = "images/products/related_images/" . $file_name;
                                        }
                                    }
                                    $related = implode(',', $arr);
                                } else {
                                    $related = '';
                                }
                                $product_info_question123 = $_POST["product_info_question"];
                                $prefix1 = $fruitList = '';
                                foreach ($product_info_question123 as $fruit1) {
                                    $product_info_question .= $prefix1 .  $fruit1;
                                    $prefix1 = ',';
                                }

                                $product_info_answer123 = $_POST["product_info_answer"];
                                $prefix1 = $fruitList = '';
                                foreach ($product_info_answer123 as $fruit1) {
                                    $product_info_answer .= $prefix1 .  $fruit1;
                                    $prefix1 = ',';
                                }
                                $sql =  $conn->query("insert into products(`ucode`,`pname`,`catnameid`,`subcatname`,`pprice`,`discount`,`pdesc`,`pimg`,`prel`,`product_info_question`,`product_info_answer`)values(" . $ucode . ",'" . $pname . "'," . $catname . ",'" . $subcatname . "','" . $pprice . "'," . $discount . ",'" . $pdesc . "','" . $url . "','" . $related . "','" . $product_info_question . "','" . $product_info_answer . "')");

                                if ($sql) {
                                    $extra="admin-all-products.php";
                                    echo "<script>window.location.href='".$extra."'</script>";
                                    exit();
                                } else {
                                    echo "<script>Alert('something went wrong');</script>";
                                }
                                ?>
                                   
                                
                            
                                    
                              


                                

                        <?php

                            }
                        }
                        ?>
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
    <!-- <script>
        function getProductSubCategory(val) {
            $.ajax({
                type: "POST",
                url: "../product_sub_category_process.html",
                data: 'category_id=' + val,
                success: function(data) {
                    $("#sub_category_id").html(data);
                    $('#sub_category_id').trigger("chosen:updated");
                }
            });
        }
    </script> -->




    <script>
        function get_subcategory() {
            var category_id = $('#category_id').val();
            $.ajax({
                url: "getsub.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                success: function(result) {
                    $("#sub_category_id").html(result);
                }
            });
        }
    </script>
    </body>

    </html>
<?php } ?>