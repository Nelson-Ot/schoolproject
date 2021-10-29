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
        $msg = mysqli_query($conn, "delete from sub_cat where subcatid='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
            exit();
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

    <!-- START -->
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">Product Sub Categories</span>
                    <div class="ud-cen-s2 hcat-cho">
                        <h2>All Product Sub Categories</h2>
                        <div class="ad-int-sear">
                            <input type="text" id="pg-sear" placeholder="Search this page..">
                        </div>
                        <a href="admin-add-new-product-sub-category.php" class="db-tit-btn">Add new product sub category</a>
                        <table class="responsive-table bordered" id="pg-resu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Main Category Name</th>

                                    <th>Sub Category Name</th>
                                    <th>Created date</th>
                                    <th>Products</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $scat = mysqli_query($conn, "select * from sub_cat");
                                $cnt = 1;


                                while ($row = mysqli_fetch_array($scat)) {




                                ?>
                                    <tr>
                                        <td><?php echo $cnt ?></td>
                                        <td><b class="db-list-rat">
                                                <?php
                                                $cat = $conn->query("select * from product_category where cat_id=" . $row['cat_id'] . "  ")->fetch_assoc();
                                                echo $cat['cat_name'];


                                                ?>
                                            </b></td>
                                        <td><b class="db-list-rat"><?php echo $row['sub_cat_name'] ?></b></td>

                                        <td><?php
                                            $currDate = $row['crt-date'];
                                            $changeDate = date("j F, Y", strtotime($currDate));
                                            echo  $changeDate;
                                            ?></td>
                                        <td><span class="db-list-ststus" data-toggle="tooltip" title="Total number of products"><?php echo $conn->query("select * from products where subcatname =".$row['subcatid']."")->num_rows;?></span></td>
                                        <td><a href="admin-product-sub-category-edit.php?edit=<?php echo $row['subcatid'];?>" class="db-list-edit">Edit</a></td>
                                        <td><a href="admin-all-product-sub-category.php?delete=<?php echo $row['subcatid']; ?>" class="db-list-edit">Delete</a></td>
                                    </tr>
                                <?php
                                    $cnt = $cnt + 1;
                                } ?>
                            </tbody>
                        </table>
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
    <script src="js/admin-custom.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    </body>

    </html>
<?php } ?>