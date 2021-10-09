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
                    <span class="udb-inst">All Slider</span>
                    <div class="ud-cen-s2 ad-table-inn">
                        <h2>All Slider Photos</h2>
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Slider</th>
                                   
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $slider = mysqli_query($conn, "select * from slider");
                                $cnt = 1;


                                while ($row = mysqli_fetch_array($slider)) {




                                ?>
                                <tr>
                                    <td><?php echo $cnt ?></td>
                                    <td>
                                        <img src="<?php echo $row['slimg'];?>" alt="">
                                    </td>
                                    
                                    <td><a href="admin-slider-edit.html?row=10" class="db-list-edit">Edit</a></td>
                                    <td><a href="admin-slider-delete.html?row=10" class="db-list-edit">Delete</a></td>
                                </tr>
                               <?php $cnt = $cnt + 1; } ?>

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