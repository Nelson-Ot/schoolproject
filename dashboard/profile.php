<?php


session_start();
include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	include 'includes/header.php';
	// include 'includes/lhs.php';


	/// for deleting product
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
	<!--PRICING DETAILS-->
	<section class=" us-pro-main">
		<div class="container">
			<div class="row">
				<?php
				$ret = mysqli_query($conn, "select * from users where user_id='" . $_SESSION['id'] . "' ");

				while ($row = mysqli_fetch_array($ret)) {

				?>
					<div class="us-pro">

						<div class="us-pro-sec-1">
							<div class="us-pro-sec-1-lhs">
								<img src="images/user/3.jpg" class="pro" alt="">
								<h1><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h1>
								<p><b>County: <?php echo $row['county']; ?></b> &nbsp;&nbsp;<b>Join:</b> <?php
																											$currDate = $row['crt_date'];
																											$changeDate = date("j F, Y", strtotime($currDate));
																											echo  $changeDate;
																											?></p>
								<!-- <button class="userfollow follow-content44" data-item="44" data-num="37">UN-FOLLOW</button> -->
								<ul class="lis-cou">
									<li><b><?php echo $conn->query("select * from products where ucode = " . $_SESSION['id'] . "")->num_rows; ?></b> products</li>
									<li><b><?php echo $conn->query("select * from reviews where seller_id = " . $_SESSION['id'] . "")->num_rows; ?></b> reviews</li>

								</ul>
								<ul class="pro-soci">
									<li>
										<a target="_blank" href="https://www.facebook.com/directoryfinder.s.7">
											<img src="images/social/3.png" alt="">
										</a>
									</li>
									<li>
										<a target="_blank" href="https://twitter.com/DirectoryFinder">
											<img src="images/social/2.png" alt="">
										</a>
									</li>
									<li>
										<a target="_blank" href="https://www.youtube.com/channel/UCEuC2HN5jb02knjP9o3Q8QA">
											<img src="images/social/5.png" alt="">
										</a>
									</li>
									<li>
										<a target="_blank" href="www.rn53themes.net">
											<img src="images/social/1.png" alt="">
										</a>
									</li>
								</ul>
							</div>
							<div class="us-pro-sec-1-rhs">
								 <img src="images/promo.jpg" class="pro-bg">
							</div>
						</div>
						<div class="us-pro-sec-2">
							<div class="us-pro-nav">
								<ul>
									<li><span class="act">All</span>
									</li>
									<li><span>Listings</span>
									</li>
									<li><span>Blog posts</span>
									</li>
									<li><span>Events</span>
									</li>
									<li><span>Follovers</span>
									</li>
								</ul>
							</div>
							<div class="us-propg-main">
								<div class="us-ppg-com us-ppg-listings">
									<h2>All listings</h2>
									<ul>
										<?php
										$su = mysqli_query($conn, "select * from products where ucode = " . $_SESSION['id'] . " ");
										while ($res = mysqli_fetch_assoc($su)) {
											$cnt = 1;
										?>
											<li>
												<div class="pro-listing-box">
													<div>
														<img src="<?php echo $res['pimg']; ?>">

														<h2><?php echo $res['pname']; ?> </h2>

														<p>


															<i class="material-icons">star</i>


														</p>
														<a href="product-detail-affiliate.php?prod=<?php echo $res['id']; ?>" class="fclick">&nbsp;</a>
													</div>
													<div>
													</div>
												</div>
											</li>
										<?php } ?>

									</ul>
								</div>
								<div class="us-ppg-com us-ppg-blog">
									<h2>Blog posts</h2>
									<ul>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog1.jpeg">
												</div>
												<div> <span>07, Jan 2020</span>
													<h2>12 Days Fitness Chanllege</h2>
												</div>
												<a href="blog-posts.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog2.jpg">
												</div>
												<div> <span>07, Jan 2020</span>
													<h2>Bike Racing Techniques</h2>
												</div>
												<a href="blog-posts.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog3.jpg">
												</div>
												<div> <span>07, Jan 2020</span>
													<h2>Best Island In The World</h2>
												</div>
												<a href="blog-posts.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog3.jpg">
												</div>
												<div> <span>07, Jan 2020</span>
													<h2>Online Marketing 2020</h2>
												</div>
												<a href="blog-posts.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog4.jpg">
												</div>
												<div> <span>07, Jan 2020</span>
													<h2>Home Interior Design Trends</h2>
												</div>
												<a href="blog-posts.html" class="fclick">&nbsp;</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="us-ppg-com us-ppg-event">
									<h2>Events</h2>
									<ul>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/blogs/blog5.jpg">
												</div>
												<div> <span>18 <b>Mar</b></span>
													<h2>Surfing Competition Hawaii</h2>
													<p>4754 Grove Avenue, Hawaii</p>
												</div> <a href="events.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/services/10.jpg">
												</div>
												<div> <span>18 <b>Jan</b></span>
													<h2>Food eating challenge</h2>
													<p>1297 Stuart Street, Pennsylvania</p>
												</div> <a href="events.html" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/services/11.jpg">
												</div>
												<div> <span>18 <b>Jan</b></span>
													<h2>College Volley Ball Tournaments 2021</h2>
													<p>Lynn B Morgan, Garden City, New York</p>
												</div> <a href="event/college-volley-ball-tournaments-2021" class="fclick">&nbsp;</a>
											</div>
										</li>
										<li>
											<div class="pro-eve-box">
												<div>
													<img src="images/services/11.jpg">
												</div>
												<div> <span>25 <b>Jan</b></span>
													<h2>States Soccer World Cup 2022</h2>
													<p>2826 Lamberts Branch Road, Miami, Florida</p>
												</div> <a href="events.html" class="fclick">&nbsp;</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="us-ppg-com us-ppg-follow">
									<h2>Followers</h2>
									<div class="ud-rhs-sec-2">
										<ul>
											<li>
												<div class="pro-sm-box">
													<img src="images/user/1.png" alt="">
													<h5>Rachel</h5>
													<p>City: <b> Arizona</b>
													</p>
													<a href="profile.html">&nbsp;</a>
												</div>
											</li>
											<li>
												<div class="pro-sm-box">
													<img src="images/user/2.jpeg" alt="">
													<h5>Betty D Friedman</h5>
													<p>City: <b> N/A</b>
													</p>
													<a href="profile.html">&nbsp;</a>
												</div>
											</li>
											<li>
												<div class="pro-sm-box">
													<img src="images/user/5.jpeg" alt="">
													<h5>Rn53 Themes</h5>
													<p>City: <b> Sydney</b>
													</p>
													<a href="profile.html">&nbsp;</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="pro-bot-shar">
								<h4>Share this profile</h4>
								<ul>
									<li>
										<div class="sh-pro-shar sh-pro-face">
											<a target="_blank" href="https://www.facebook.com/sharer/sharer.html?u=profile/claude-d-dial?src=facebook&quote=Claude D Dial">
												<img src="images/social/3.png" alt="">Facebook</a>
										</div>
									</li>
									<li>
										<div class="sh-pro-shar sh-pro-twi">
											<a target="_blank" href="http://twitter.com/share?text=&url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%3Fsrc%3Dtwitter">
												<img src="images/social/2.png" alt="">Twitter</a>
										</div>
									</li>
									<li>
										<div class="sh-pro-shar sh-pro-what">
											<a target="_blank" href="whatsapp://send?text=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%3Fsrc%3Dwhatsapp" data-action="share/whatsapp/share">
												<img src="images/social/6.png" alt="">WhatsApp</a>
										</div>
									</li>
									<li>
										<div class="sh-pro-shar sh-pro-link">
											<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%26%26src%3Dlinkedin">
												<img src="images/social/1.png" alt="">Linkedin</a>
										</div>
									</li>
									<li>
										<div style="background-color: #da271a" class="sh-pro-shar sh-pro-pin">
											<a target="_blank" href="https://www.pinterest.com/pin/create/bookmarklet/?media=images/user/33654pexels-photo-91227.jpeg&url=http%3A%2F%2Flocalhost%2Fdirectory%2Fbizbook%2Fprofile%2Fclaude-d-dial%26%26src%3Dpinterest&description=">
												<img src="images/social/1.png" alt="">Pinterest</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="us-pro-sec-3"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->

	<!-- START -->
	<div class="fqui-menu">
		<ul>
			<li>
				<a href="index.html">
					<img src="images/icon/home.png">Home</a>
			</li>
			<li><span class="mob-sear"><img src="images/icon/search1.png">Search</span>
			</li>
			<li>
				<a href="all-category.html" class="act">
					<img src="images/icon/shop.png">Services</a>
			</li>
			<li>
				<a href="events.html">
					<img src="images/icon/calendar.png">Events</a>
			</li>
			<li>
				<a href="all-products.html">
					<img src="images/icon/cart.png">Products</a>
			</li>
			<li>
				<a href="coupons.html">
					<img src="images/icon/coupons.png">Coupons</a>
			</li>
			<li>
				<a href="blog-posts.html">
					<img src="images/icon/blog1.png">Bolgs</a>
			</li>
			<li>
				<a href="community.html">
					<img src="images/icon/11.png">Community</a>
			</li>
			<li><span class="btn-ser-need-ani"><img src="images/icon/how1.png">Support</span>
			</li>
		</ul>
	</div>
	<!-- END -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/custom.js"></script>
	</body>
<?php } ?>

</html>