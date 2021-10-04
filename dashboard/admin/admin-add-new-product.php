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
                <div class="login-reg">
                    <div class="container">
                        <form action="insert_product.html" class="product_form" id="product_form" name="product_form" method="post" enctype="multipart/form-data">
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
                                                                <select onchange="get_subcategory()" name="category_id" id="category_id" class="chosen-select form-control">
                                                                    

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
                                                                <select data-placeholder="Select Sub Category" name="sub_category_id[]" id="sub_category_id" multiple class="chosen-select form-control">
                                                                    <!-- <option value="">Select Sub Category</option> -->
                                                                    
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
                                                                <input type="text" name="product_price_offer" onkeypress="return isNumber(event)" id="product_price_offer" class="form-control" placeholder="Offer (i.e) 50">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                   
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" required="required" name="product_description" id="product_description" placeholder="Product details"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                    <!--FILED START-->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Product images(max 5 images)</label>
                                                                <input type="file" name="gallery_image[]" required="required" class="form-control" accept="image/png, image/jpeg" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--FILED END-->
                                                  
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="log">
                                                                <div class="login add-prod-high-oth">

                                                                    <h4>Highlights</h4>
                                                                    <span class="add-list-add-btn prod-add-high-oad" title="add new offer">+</span>
                                                                    <span class="add-list-rem-btn prod-add-high-ore" title="remove offer">-</span>
                                                                    <ul>
                                                                        <li>
                                                                            <!--FILED START-->
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="product_highlights[]" class="form-control" placeholder="(i.e) 1 Year Onsite Warranty">
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
                                                                                        <input type="text" name="product_info_question[]" class="form-control" placeholder="(i.e) Serial Number">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <i class="material-icons">arrow_forward</i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="product_info_answer[]" class="form-control" placeholder="(i.e) qwerty3421">
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
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="product_tags" id="product_tags" placeholder="Product Tags (i.e) electronics,laptop,hp,canon"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <a href="dashboard.html" class="skip">Go to User Dashboard >></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FILED END-->
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
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('product_description');
    </script>
 


    <script>
        function get_subcategory(){
            var category_id = $('#category_id').val();
            $.ajax({
                url: "getsub.php",
                type: "POST",
                data: {category_id:category_id},
                success: function (result){
                    $("#sub_category_id").html(result);
                }
            }); 
        }
    </script>
    </body>

    </html>
<?php } ?>