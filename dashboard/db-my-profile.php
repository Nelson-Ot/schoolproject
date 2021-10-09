<?php


session_start();
include 'connect.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	include 'includes/header.php';
	include 'includes/lhs.php';

?>


	<div class="ud-cen">
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">User Profile</span>
		<div class="ud-cen-s2">
			<h2>Profile Details</h2>
			<a href="db-my-profile-edit.php?edit=<?php echo $_SESSION['id'];?>" class="db-tit-btn">Edit profile page</a>

			<table class="responsive-table bordered">
				<tbody>
				<?php
                                    $ret = mysqli_query($conn, "select * from users where user_id='" . $_SESSION['id'] . "' ");

                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?>
					
					<tr>
						<td>Name</td>
						<td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
					</tr>
					<tr>
						<td>Email Id</td>
						<td><?php echo $row['user_email']; ?></td>
					</tr>
					<tr>
						<td>Profile Password</td>
						<td><?php echo $row['upassword']; ?></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><?php echo $row['user_phone_number']; ?></td>
					</tr>
					<tr>
						<td>Profile Picture</td>
						<td>
							<img src="<?php echo $row['profpic']; ?>" alt="">
						</td>
					</tr>
					<tr>
						<td>County</td>
						<td><?php echo $row['county']; ?></td>
					</tr>
					<tr>
						<td>Join date</td>
						<td><?php
                                                            $currDate = $row['crt_date'];
                                                            $changeDate = date("j F, Y", strtotime($currDate));
                                                            echo  $changeDate;
                                                            ?></td>
					</tr>
					
					
					<tr>
						<td>Profile Link</td>
						<td><a href="profile.html" target="_blank">profile.html</a>
						</td>
					</tr>
					
					<tr>
						<td> <a href="db-my-profile-edit.php?edit=<?php echo $row['user_id'];?>" class="db-pro-bot-btn">Edit profile page</a>
						</td>
						<td></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!--RIGHT SECTION-->
	<?php include 'includes/rhs.php'; ?>
	</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- START -->
	<span class="btn-ser-need-ani">Help & Support</span>
	<div class="ani-quo-form"> <i class="material-icons ani-req-clo">close</i>
		<div class="tit">
			<h3>What service do you need? <span>BizBook will help you</span></h3>
		</div>
		<div class="hom-col-req">
			<div id="home_slide_enq_success" class="log" style="display: none;">
				<p>Your Enquiry Is Submitted Successfully!!!</p>
			</div>
			<div id="home_slide_enq_fail" class="log" style="display: none;">
				<p>Something Went Wrong!!!</p>
			</div>
			<div id="home_slide_enq_same" class="log" style="display: none;">
				<p>You cannot make enquiry on your own listing</p>
			</div>
			<form name="home_slide_enquiry_form" id="home_slide_enquiry_form" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="listing_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="listing_user_id" value="0" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_sender_id" value="" placeholder="" required>
				<input type="hidden" class="form-control" name="enquiry_source" value="Website" placeholder="" required>
				<div class="form-group">
					<input type="text" name="enquiry_name" value="" required="required" class="form-control" placeholder="Enter name*">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Enter email*" required="required" value="" name="enquiry_email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Invalid email address">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" value="" name="enquiry_mobile" placeholder="Enter mobile number *" pattern="[7-9]{1}[0-9]{9}" title="Phone number starting with 7-9 and remaing 9 digit with 0-9" required="">
				</div>
				<div class="form-group">
					<select name="enquiry_category" id="enquiry_category" class="form-control">
						<option value="">Select Category</option>
						<option value="19">Wedding halls</option>
						<option value="18">Hotel & Food</option>
						<option value="17">Pet shop</option>
						<option value="16">Digital Products</option>
						<option value="15">Spa and Facial</option>
						<option value="10">Real Estate</option>
						<option value="8">Sports</option>
						<option value="7">Education</option>
						<option value="6">Electricals</option>
						<option value="5">Automobiles</option>
						<option value="3">Transportation</option>
						<option value="2">Hospitals</option>
						<option value="1">Hotels And Resorts</option>
					</select>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3" name="enquiry_message" placeholder="Enter your query or message"></textarea>
				</div>
				<input type="hidden" id="source">
				<button type="submit" id="home_slide_enquiry_submit" name="home_slide_enquiry_submit" class="btn btn-primary">Submit Requirements</button>
			</form>
		</div>
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

	</html>
<?php } ?>