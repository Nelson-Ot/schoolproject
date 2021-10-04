<?php
session_start();
include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {


    include 'includes/header.php';

    // for deleting user
    if (isset($_GET['delete'])) {
        $adminid = $_GET['delete'];
        $msg = mysqli_query($conn, "delete from users where user_id='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    }
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
                    <span class="udb-inst">All User Details</span>
                    <div class="ud-cen-s2">
                        <h2>All Users - <?php echo $conn->query("select * from users")->num_rows; ?></h2>
                        <div class="ad-int-sear">
                            <input type="text" id="pg-sear" placeholder="Search this page..">
                        </div>
                        <a href="admin-add-new-user.php" class="db-tit-btn">Add new user</a>
                        <table class="responsive-table bordered" id="pg-resu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>User ID</th>


                                    <th>No. of products</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Preview</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = mysqli_query($conn, "select * from users");
                                $cnt = 1;


                                while ($row = mysqli_fetch_array($ret)) {




                                ?>
                                    <tr>
                                        <td><?php echo $cnt ?></td>
                                        <td>

                                            <img src="../images/user/475847.jpg" alt=""><?php echo $row['first_name']; ?><span><?php echo $row['user_email']; ?></span>
                                            <span>Joined: <?php
                                                            $currDate = $row['crt_date'];
                                                            $changeDate = date("j F, Y", strtotime($currDate));
                                                            echo  $changeDate;
                                                            ?></span>
                                        </td>
                                        <td>USER <?php echo $row['user_id']; ?> </td>




                                        <td><span class="db-list-rat">0</span></td>

                                        <td><a href="admin-my-profile-edit.php?edit=<?php echo $row['user_id']; ?>" class="db-list-edit">Edit</a></td>
                                        <td><a href="admin-all-users.php?delete=<?php echo $row['user_id']; ?>" class="db-list-edit">Delete</a></td>
                                        <td><a href="http://localhost/directory/bizbook/profile/werwer" class="db-list-edit" target="_blank">Preview</a></td>
                                        <td><a href="admin-user-full-details.html?row=339" class="db-list-edit">More</a></td>
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