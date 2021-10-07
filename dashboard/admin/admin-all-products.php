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
    <!-- END -->

    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">All Products</span>
                    <div class="ud-cen-s2">
                        <h2>Product details</h2>
                        <a href="admin-add-new-product.php" class="db-tit-btn">Add new product</a>
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>

                                    <th>Created by</th>
                                    
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Preview</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $products = mysqli_query($conn, "select * from products");
                                $cnt = 1;


                                while ($row = mysqli_fetch_array($products)) {




                                ?>
                                    <tr>
                                        <td><?php echo $cnt ?></td>
                                        <td><img src="<?php echo $row['pimg']; ?>"><?php echo $row['pname']; ?> <span><?php
                                                                                                                        $currDate = $row['crdate'];
                                                                                                                        $changeDate = date("j F, Y", strtotime($currDate));
                                                                                                                        echo  $changeDate;
                                                                                                                        ?></span></td>

                                        <td>
                                            <a href="http://localhost/directory/bizbook/profile/rn53-themes" class="db-list-ststus" target="_blank">
                                            <?php $usr= $conn->query("select * from users where user_id=".$row['ucode']."")->fetch_assoc(); echo $usr['uname'];?>
                                            </a>

                                        </td>
                                       
                                        <td><a href="admin-edit-product.php?edit=<?php echo $row['id'];?>" class="db-list-edit">Edit</a></td>
                                        <td><a href="admin-all-products.php?delete=<?php echo $row['id'];?>" class="db-list-edit">Delete</a></td>
                                        <td><a href="../product-details.html?code=PROD036" class="db-list-edit" target="_blank">Preview</a></td>
                                    </tr>
                                <?php $cnt = $cnt + 1;
                                } ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="ad-pgnat">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
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
    <script src="js/admin-custom.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    </body>

    </html>
<?php } ?>