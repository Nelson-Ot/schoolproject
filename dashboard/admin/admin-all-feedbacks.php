<?php
session_start();

include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {


    include 'includes/header.php';


    /// for deleting 
    if (isset($_GET['delete'])) {
        $adminid = $_GET['delete'];
        $msg = mysqli_query($conn, "delete from feedbacks where id='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    }



?>
    <section>
        <div class="ad-com">
            <div class="ad-dash leftpadd">
                <div class="ud-cen">
                    <div class="log-bor">&nbsp;</div>
                    <span class="udb-inst">All Feedback</span>
                    <div class="ud-cen-s2">
                        <h2>All Feedback details</h2>
                        <table class="responsive-table bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>

                                    <th>Email Id</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $feedback = mysqli_query($conn, "select * from feedbacks");
                                $cnt = 1;


                                while ($row = mysqli_fetch_array($feedback)) {




                                ?>
                                    <tr>
                                        <td><?php echo $cnt ?></td>
                                        <td><?php echo $row['cname']; ?></td>

                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['cmessage']; ?></td>
                                        <td><span class="db-list-rat"><?php
                                                                        $currDate = $row['crt_date'];
                                                                        $changeDate = date("j F, Y", strtotime($currDate));
                                                                        echo  $changeDate;
                                                                        ?></span></td>
                                        <td><a href="admin-all-feedback.php?delete=<?php echo $row['id'] ?>" class="db-list-edit">Delete</a></td>
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