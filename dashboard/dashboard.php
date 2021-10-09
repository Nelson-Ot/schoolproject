<?php


session_start();
include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	include 'includes/header.php';
	include 'includes/lhs.php';

	 
    /// for deleting product
    if (isset($_GET['delete'])) {
        $adminid = $_GET['delete'];
        $msg = mysqli_query($conn, "delete from products where id='$adminid'");
        if ($msg) {
            echo "<script>alert('Data deleted');</script>";
        }
    }


?>


	<!--CENTER SECTION-->
	<div class="ud-cen">
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">User Dashboard</span>
		<div class="cd-cen-intr">
			<div class="cd-cen-intr-inn">
				<h2>Welcom back, <b><?php echo $_SESSION['login']; ?></b></h2>
				<p>Stay up to date reports in your products reports here</p>
			</div>
		</div>
		<div class="ud-cen-s1">
			<ul>
				<li>
					<div> <b>21</b>
						<h4>All Products</h4>
						<p>Total no of products</p> <a href="db-all-listing.html">&nbsp;</a>
					</div>
				</li>
				<li>
					<div> <b>13</b>
						<h4>Enquiries</h4>
						<p>Total no of enquiry</p> <a href="db-enquiry.html">&nbsp;</a>
					</div>
				</li>
				<li>
					<div> <b>18</b>
						<h4>Followings</h4>
						<p>Total no of followings</p> <a href="db-followings.html">&nbsp;</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- START -->
		<div class="ud-cen-s3 ud-cen-s4">
			<h2>Profile page</h2>
			<a href="db-my-profile-edit.html" class="db-tit-btn">Edit profile page</a>
			<?php
				$usr = mysqli_query($conn, "select * from users where user_id = " . $_SESSION['id'] . " ");
				while ($res = mysqli_fetch_assoc($usr)) {
				?>
			<div class="ud-payment ud-pro-link">
				<div class="pay-lhs">
					<div class="lis-pro-badg">
						<div>
							<img src="<?php echo $res['profpic'];?>" alt="profile picture">
							<h4></h4>
							<p>Member since <?php
									$currDate = $res['crt_date'];
									$changeDate = date("j F, Y", strtotime($currDate));
									echo  $changeDate;
									?></p>
						</div> <a href="profile.php" class="fclick" target="_blank">&nbsp;</a>
					</div>
				</div>
				<div class="pay-rhs">
					<ul>
						<li><b>Name : </b> <?php echo $res['first_name'];?> &nbsp;<?php echo $res['last_name'];?></li>
						
						</li>
						<li><b>County : </b> <?php echo $res['county'];?></li>
						<li><b>Email : </b> <?php echo $res['user_email'];?></li>
						<li class="pro">
							<input type="text" value="profile.php" readonly>
						</li>
						<li class="pre"><a target="_blank" href="profile.php">View my profile page</a>
						</li>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- END -->

		<div class="ud-cen-s2">
			<h2>Product Details</h2>
			<a href="add-new-product.php" class="db-tit-btn">Add New Product</a>
			<table class="responsive-table bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>product Name</th>


						<th>Edit</th>
						<th>Delete</th>
						<!--                    <th>-->
						<!--</th>-->
						<th>Preview</th>
					</tr>
				</thead>
				<?php
				$su = mysqli_query($conn, "select * from products where ucode = " . $_SESSION['id'] . " ");
				while ($res = mysqli_fetch_assoc($su)) {
				?>
					<tbody>
						<tr>
							<td>1</td>
							<td>
								<img src="<?php echo $res['pimg']; ?>"><?php echo $res['pname']; ?> <span>
									<?php
									$currDate = $res['crdate'];
									$changeDate = date("j F, Y", strtotime($currDate));
									echo  $changeDate;
									?>
								</span>
							</td>


							<td><a href="edit-product.php?edit=<?php echo $res['id']; ?>" class="db-list-edit">Edit</a>
							</td>
							<td><a href="dashboard.php?delete=<?php echo $res['id']; ?>" class="db-list-edit">Delete</a>
							</td>

							<td><a href="listing/test6" class="db-list-edit" target="_blank">Preview</a>
							</td>
						</tr>

					</tbody>
				<?php } ?>
			</table>


		</div>

	</div>
	<!--RIGHT SECTION-->
	<?php include 'includes/rhs.php'; ?>
	</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->
<?php  } ?>
<!-- END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
<style>
	.ud-cen .log-bor {
		display: none;
	}
</style>