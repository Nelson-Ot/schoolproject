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
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">Reviews</span>
		<div class="ud-cen-s2">
			<h2>All Listings - Received review details</h2>
			<ul class="nav nav-tabs">
				<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#received">All Received Reviews</a>
				</li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sent">All Sent Reviews</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div id="received" class="container tab-pane active">
					<br>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>product Name</th>
								<th>reviewer name</th>
								<th>Email</th>

								<th>Ratings</th>
								<th>Message</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php
				$su = mysqli_query($conn, "select * from reviews where seller_id = " . $_SESSION['id'] . " ");
				$cnt = 1;

				while ($res = mysqli_fetch_assoc($su)) {
				?>
							<tr>
								<td><?php echo $cnt ?></td>
								<td><?php echo $res['product'] ?></td>
								<td><?php echo $res['name'];?></td>
								<td><?php echo $res['email'];?></td>
								
								<td>
									<label class="rat"> 
										<!-- <i class="material-icons">star</i>
										 <i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i> --> 
										<?php
									$rrating = $res['rating'];
                                        for ($i = 1; $i <= $rrating; $i++) {
                                            ?>
                                            <i class="material-icons">star</i>
                                            <?php
                                        }
                                        ?>
								</td>
										
									</label>
									
								<td><?php echo $res['review']; ?></td>
								<td> <a href="review_trash?way=1&&reviewreviewreviewreviewreviewreview=104"><span class="db-list-edit">Delete</span> </a>
								</td>
							</tr>
							<?php $cnt = $cnt + 1; } ?>
						</tbody>
					</table>
				</div>
				<div id="sent" class="container tab-pane fade">
					<br>
					<table class="responsive-table bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Listing Name</th>
								<th>User</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>Ratings</th>
								<th>Message</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Rolexo Villas in California</td>
								<td>Rn53 Themes</td>
								<td>rn53themes@gmail.com</td>
								<td>5522114422</td>
								<td></td>
								<td>
									<label class="rat"> <i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star_half</i>-->
									</label>
								</td>
								<td>verified_userRolexo Villas is well-known to all as a premier builder of villas and apartments. Even though they have various departments they stay united in giving the customers the best service. I really had a good service right from on time delivery, quality of work, perfection in work completion. The relationship does not end in just in hand over but they stand strong in all tuff times for the commitment given. After 3+ years of handover they addressed the compound wall cracks which expanded and in a week condition. They still respond to any queries / faults on time and track it to closure.</td>
								<td> <a href="review_trash?way=1&&reviewreviewreviewreviewreviewreview=102"><span class="db-list-edit">Delete</span> </a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>The Royal Spa Center for Women</td>
								<td>Rn53 Themes</td>
								<td>rn53themes@gmail.com</td>
								<td>5522114422</td>
								<td>Sydney</td>
								<td>
									<label class="rat"> <i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star</i>-->
										<!--                                            <i class="material-icons">star_half</i>-->
									</label>
								</td>
								<td>Perfect facial.. i strongly recommended Writing great reviews may help others discover the places that are just apt for them. Here are a few tips to write a good review:</td>
								<td> <a href="review_trash?way=1&&reviewreviewreviewreviewreviewreview=35"><span class="db-list-edit">Delete</span> </a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--RIGHT SECTION-->
	<?php include 'includes/rhs.php'; ?>
	</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->




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