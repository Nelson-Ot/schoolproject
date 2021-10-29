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
		$msg = mysqli_query($conn, "delete from enquiry where id='$adminid'");
		if ($msg) {
			echo "<script>alert('Data deleted');</script>";
		}
	}


?>
	<style>
		.ud-rhs {
			display: none;
		}

		.ud-cen {
			width: 77%;
		}

		@media screen and (max-width: 992px) {
			.ud-cen {
				width: 100%;
			}
		}
	</style>
	<!--CENTER SECTION-->
	<div class="ud-cen">
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">Leads</span>
		<div class="ud-cen-s2">
			<h2>Enquiry Details</h2>
			<table class="responsive-table bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Message</th>
						
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$su = mysqli_query($conn, "select * from enquiry where sellers_id = " . $_SESSION['id'] . " ");
				while ($res = mysqli_fetch_assoc($su)) {
					$cnt = 1;
					?>
					<tr>
						<td><?php echo $cnt;?></td>
						<td><?php echo $res['name'];?><span><?php
									$currDate = $res['crt_date'];
									$changeDate = date("j F, Y", strtotime($currDate));
									echo  $changeDate;
									?></span>
						</td>
						<td><?php echo $res['email'];?></td>
						<td><?php echo $res['mobile_number'];?></td>
						<td><?php echo $res['message'];?></td>
						
						<td><a href="db-enquiry.php?delete=<?php echo $res['id'];?>" class="db-list-edit">Delete</a>
						</td>
					</tr>
					<?php  $cnt = $cnt + 1; } ?>
				</tbody>
			</table>
		</div>
	</div>
	
	</div>
	</section>
	
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
<?php } ?>