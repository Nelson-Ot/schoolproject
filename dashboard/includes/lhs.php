<!-- END -->
	<!-- START -->
	<!--PRICING DETAILS-->
	<section class=" ud">
		<div class="ud-inn">
			<!--LEFT SECTION-->
			<div class="ud-lhs">
			<?php
				$usr = mysqli_query($conn, "select * from users where user_id = " . $_SESSION['id'] . " ");
				while ($res = mysqli_fetch_assoc($usr)) {
				?>
				<div class="ud-lhs-s1">
				<img src="<?php echo $res['profpic'];?>" alt="profile picture">
					
					<h4><?php echo $res['first_name'];?> &nbsp;<?php echo $res['last_name'];?></h4>
					<b>Join on  <?php
									$currDate = $res['crt_date'];
									$changeDate = date("j F, Y", strtotime($currDate));
									echo  $changeDate;
									?></b>
					<a class="ud-lhs-view-pro" target="_blank" href="profile.php">My profile</a>
				</div>
				<?php } ?>
				<div class="ud-lhs-s2">
					<ul>
						<li>
							<a href="dashboard.php" class="db-lact">
								<img src="images/icon/dbl1.png" alt="" />My Dashboard</a>
						</li>

						<li>
							<a href="db-enquiry.html" class="">
								<img src="images/icon/tick.png" alt="" />Lead enquiry</a>
						</li>
						<li>
							<a href="db-products.html" class="">
								<img src="images/icon/cart.png" alt="" />All Products</a>
						</li>

						<li>
							<a href="db-message.html" class="">
								<img src="images/icon/dbl14.png" alt="" />Messages</a>
						</li>
						<li>
							<a href="db-my-profile.html" class="">
								<img src="images/icon/dbl6.png" alt="" />My Profile</a>
						</li>

						<li>
							<a href="db-notifications.html" class="">
								<img src="images/icon/dbl19.png" alt="" />Notifications</a>
						</li>
						<li>
							<a href="how-to.html" class="" target="_blank">
								<img src="images/icon/dbl17.png" alt="" />How to's</a>
						</li>
						<li>
							<a href="db-setting.html" class="">
								<img src="images/icon/dbl210.png" alt="" />Setting</a>
						</li>
						<li>
							<a href="#">
								<img src="images/icon/dbl12.png" alt="" />Log Out</a>
						</li>
					</ul>
				</div>
			</div>