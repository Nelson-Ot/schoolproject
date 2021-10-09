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
	<!--CENTER SECTION-->
	<div class="ud-cen">
		<div class="log-bor">&nbsp;</div> <span class="udb-inst">Edit User Profile</span>
		<div class="ud-cen-s2 ud-pro-edit">
			<h2>Profile Details</h2>
			<?php
			if (isset($_GET['edit'])) {
				$row = $conn->query("select * from users where user_id=" . $_GET['edit'] . "")->fetch_assoc();



			?>


				<form id="profile_update" name="profile_update" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" value="62736rn53themes.png" autocomplete="off" name="profile_image_old" id="profile_image_old" required class="validate">
					<input type="hidden" value="5f4dcc3b5aa765d61d8327deb882cf99" autocomplete="off" name="password_old" id="password_old" required class="validate">
					<table class="responsive-table bordered">
						<tbody>
							<tr>
								<td>First Name</td>
								<td>
									<div class="form-group">
										<input type="text" required="required" autocomplete="off" name="first_name" id="first_name" class="form-control" value="<?php echo $row['first_name']; ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>Second name</td>
								<td>
									<div class="form-group">
										<input type="text" required="required" autocomplete="off" name="l_name" id="first_name" class="form-control" value="<?php echo $row['last_name']; ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>Username</td>
								<td>
									<div class="form-group">
										<input type="text" required="required" autocomplete="off" name="u_name" id="u_name" class="form-control" value="<?php echo $row['uname']; ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>Email id</td>
								<td>
									<div class="form-group">
										<input type="email" required="required" autocomplete="off" name="email_id" id="email_id" class="form-control" value="<?php echo $row['user_email']; ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>mobile number</td>
								<td>
									<div class="form-group">
										<input type="tel" required="required" autocomplete="off" name="u_number" id="u_number" class="form-control" value="<?php echo $row['user_phone_number']; ?>">
									</div>
								</td>
							</tr>

							<tr>
								<td>Pofile password</td>
								<td>
									<div class="form-group">
										<input type="password" autocomplete="off" required="required" name="password" id="password" class="form-control" value="<?php echo $row['upassword']; ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>county</td>
								<td>
									<div class="form-group">
										<input type="text" name="county" class="form-control" placeholder="County" value="<?php echo $row['county']; ?>">
									</div>
								</td>
							</tr>

							<tr>
								<td>Profile picture</td>
								<td>
									<div class="form-group">
										<input type="file" name="f_up" class="form-control">
									</div>
								</td>
							</tr>

							<tr>
								<td>
									<button type="submit" name="register_up" class="db-pro-bot-btn">Update User</button>
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>
					<?php
					if (isset($_POST['register_up'])) {
						$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
						$l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
						$u_name = mysqli_real_escape_string($conn, $_POST['u_name']);
						$email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
						$u_number = mysqli_real_escape_string($conn, $_POST['u_number']);
						$password = mysqli_real_escape_string($conn, $_POST['password']);
						$county = mysqli_real_escape_string($conn, $_POST['county']);
						// $sql_e = mysqli_query($conn, "select user_id from users where user_email != '".$email_id."' ");
						// $row_e = mysqli_num_rows($sql_e);
						// $sql_u = mysqli_query($conn, "select user_id from users where uname != '".$u_name."' ");
						// $row_u = mysqli_num_rows($sql_u);
						// if ($row_e > 0) {
						// 	$extra = "db-my-profile.php";
						// 	echo "<script>alert('Email id already exist with another account. Please try with other email id');
							
							
						// 	window.location.href='" . $extra . "'</script>
							
						// 	";
						// 	exit();
						// } else if ($row_u > 0) {




						// 	echo "<script>alert('username id already exist with another account. Please try with other email id');</script>";
						// 	exit();

						// } else {

							if (!empty($_FILES["f_up"]["name"])) {
								$fileName = $_FILES['f_up']['tmp_name'];
								$sourceProperties = getimagesize($fileName);
								$resizeFileName = time();
								$uploadPath = "admin/images/users-profile-pic/";
								$fileExt = pathinfo($_FILES['f_up']['name'], PATHINFO_EXTENSION);
								$uploadImageType = $sourceProperties[2];
								$sourceImageWidth = $sourceProperties[0];
								$sourceImageHeight = $sourceProperties[1];
								$new_width = $sourceImageWidth;
								$new_height = $sourceImageHeight;
								switch ($uploadImageType) {
									case IMAGETYPE_JPEG:
										$resourceType = imagecreatefromjpeg($fileName);
										$imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
										imagejpeg($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
										break;

									case IMAGETYPE_GIF:
										$resourceType = imagecreatefromgif($fileName);
										$imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
										imagegif($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);
										break;

									case IMAGETYPE_PNG:

										$resourceType = imagecreatefrompng($fileName);
										$imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight, $new_width, $new_height);
										imagepng($imageLayer, $uploadPath . "thump_" . $resizeFileName . '.' . $fileExt);

										break;


									default:
										$imageProcess = 0;
										break;
								}

								$url = $uploadPath . "thump_" . $resizeFileName . "." . $fileExt;


								$mysql = $conn->query("update users set first_name='" . $first_name . "',last_name='" . $l_name . "',uname='" . $u_name . "',user_email='" . $email_id . "',user_phone_number='" . $u_number . "',upassword='" . $password . "',county='" . $county . "',profpic='" . $url . "' where user_id='" . $_GET['edit'] . "' ");
								if ($mysql) {
									$extra = "db-my-profile.php";
									echo "<script>window.location.href='" . $extra . "'</script>";
									exit();
								} else {
									echo "Something went wrong";
								}
							}else{
								$conn->query("update users set first_name='" . $first_name . "',last_name='" . $l_name . "',uname='" . $u_name . "',user_email='" . $email_id . "',user_phone_number='" . $u_number . "',upassword='" . $password . "',county='" . $county . "' where user_id='" . $_GET['edit'] . "' ");

								$extra = "db-my-profile.php";
								echo "<script>window.location.href='" . $extra . "'</script>";
								exit();

							}
						
					
						}
					//}
					?>
				</form>
			<?php  } ?>
		</div>
	</div>
	<?php include 'includes/rhs.php';?>
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