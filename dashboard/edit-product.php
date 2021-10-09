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

	<!--PRICING DETAILS-->
	<section class=" login-reg">
		<div class="container">
			<div class="row">
				<div class="login-main add-list">
					<div class="log-bor">&nbsp;</div> <span class="steps">Edit Product</span>
					<div class="log">
						<?php
						if (isset($_GET['edit'])) {
							$prodetails = $conn->query("select * from products where id=" . $_GET['edit'] . "")->fetch_assoc();
						?>
							<div class="login add-list-off">
								<h4>Edit this product</h4>
								<form action="" class="product_form" id="product_form" name="product_form" method="post" enctype="multipart/form-data">

									<ul>
										<li>
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<input type="hidden" name="user_code" id="product_name" class="form-control" value="<?php echo $_SESSION['id'] ?>" />
													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $prodetails['pname']; ?>">
													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<select name="category_id" id="category_id" class="chosen-select form-control">
															<?php
															$cat = mysqli_fetch_assoc(mysqli_query($conn, "select * from product_category where cat_id=" . $prodetails['catnameid'] . ""));
															?>
															<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
															<?php
															$sk = mysqli_query($conn, "select * from product_category where cat_id !=" . $prodetails['catnameid'] . "");
															while ($res = mysqli_fetch_assoc($sk)) {
															?>
																<option value="<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name']; ?></option>
															<?php } ?>



														</select>

													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<select data-placeholder="Select Sub Category" name="sub_category" id="sub_category_id" class="chosen-select form-control">
															<?php
															$scat = mysqli_fetch_assoc(mysqli_query($conn, "select * from sub_cat where subcatid=" . $prodetails['subcatname'] . ""));
															?>
															<option value="<?php echo $scat['subcatid']; ?>"><?php echo $scat['sub_cat_name']; ?></option>
															<?php
															$sk = mysqli_query($conn, "select * from sub_cat where subcatid !=" . $prodetails['subcatname'] . "");
															while ($res = mysqli_fetch_assoc($sk)) {
															?>
																<option value="<?php echo $res['subcatid']; ?>"><?php echo $res['sub_cat_name']; ?></option>
															<?php } ?>

														</select>
													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" name="product_price" id="product_price" class="form-control" onkeypress="return isNumber(event)" value="<?php echo $prodetails['pprice']; ?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" name="discount_percentage" onkeypress="return isNumber(event)" id="product_price_offer" class="form-control" value="<?php echo $prodetails['discount']; ?>">
													</div>
												</div>
											</div>
											<!--FILED END-->

											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<textarea class="form-control" name="product_description" id="product_description"><?php echo $prodetails['pdesc']; ?></textarea>
													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Product image</label>
														<input type="file" name="pimg" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<img src="<?php echo $prodetails['pimg']; ?>" width="150" height="150" />

													</div>
												</div>
											</div>

											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Product images(max 5 images)</label>
														<input type="file" name="prel[]" class="form-control" accept="image/png, image/jpeg" multiple>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<?php $sb = explode(',', $prodetails['prel']);


														foreach ($sb as $bb) {
															if ($bb == '') {
															} else {
														?>
																<img src="<?php echo $bb; ?>" width="100" height="100" />
														<?php
															}
														}
														?>

													</div>
												</div>
											</div>
											<!--FILED END-->


											<!--FILED END-->
											<!--FILED START-->
											<div class="row">
												<div class="col-md-12">
													<div class="log">
														<div class="login add-prod-oth">

															<h4>Specifications</h4>
															<span class="add-list-add-btn prod-add-oad" title="add new offer">+</span>
															<span class="add-list-rem-btn prod-add-ore" title="remove offer">-</span>

															<ul>
																<?php
																$products_a_row_product_info_question = $prodetails['product_info_question'];
																$products_a_row_product_info_answer = $prodetails['product_info_answer'];

																$products_a_row_product_info_question_Array = explode(',', $products_a_row_product_info_question);
																$products_a_row_product_info_answer_Array = explode(',', $products_a_row_product_info_answer);

																$zipped = array_map(null, $products_a_row_product_info_question_Array, $products_a_row_product_info_answer_Array);

																foreach ($zipped as $tuple) {
																	$tuple[0]; // Info question
																	$tuple[1]; // Info Answer

																?>
																	<li>
																		<!--FILED START-->
																		<div class="row">
																			<div class="col-md-5">
																				<div class="form-group">
																					<input type="text" class="form-control" name="product_info_question[]" value="<?php echo $tuple[0]; ?>" placeholder="(i.e) Serial Number">
																				</div>
																			</div>
																			<div class="col-md-2">
																				<div class="form-group">
																					<i class="material-icons">arrow_forward</i>
																				</div>
																			</div>
																			<div class="col-md-5">
																				<div class="form-group">
																					<input type="text" class="form-control" name="product_info_answer[]" value="<?php echo $tuple[1]; ?>" placeholder="(i.e) qwerty3421">
																				</div>
																			</div>
																		</div>
																		<!--FILED END-->
																	</li>
																<?php
																}
																?>
															</ul>

														</div>
													</div>
												</div>
											</div>
											<!--FILED END-->
											<!--FILED START-->

											<!--FILED END-->
										</li>
									</ul>
									<!--FILED START-->
									<div class="row">
										<div class="col-md-12">
											<button type="submit" name="edit_product" class="btn btn-primary">Update & Submit</button>
										</div>
										<div class="col-md-12"> <a href="dashboard.php" class="skip">Go to user dashboard >></a>
										</div>
									</div>
									<?php
									if (isset($_POST['edit_product'])) {
										$data = $conn->query("select * from products where id=" . $_GET['edit'] . "")->fetch_assoc();
										$ucode = $_POST['user_code'];

										$pname = mysqli_real_escape_string($conn, $_POST['product_name']);

										$catname = $_POST['category_id'];
										$subcatname = $_POST['sub_category'];
										$pprice =  $_POST['product_price'];
										$discount = $_POST['discount_percentage'];
										$pdesc = mysqli_real_escape_string($conn, $_POST['product_description']);

										if ($_FILES["pimg"]["name"] == '') {
											$pimg = $data['pimg'];
										} else {
											$fileName = $_FILES['pimg']['tmp_name'];
											echo $_FILES['pimg']['name'];
											$sourceProperties = getimagesize($fileName);
											$resizeFileName = uniqid() . time();
											$uploadPath = "admin/images/products/";

											$fileExt = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
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

											$pimg = $uploadPath . "thump_" . $resizeFileName . "." . $fileExt;
										}


										if (empty($_FILES['prel']['name'][0])) {
											$related = $data['prel'];
										} else {
											$arr = array();
											foreach ($_FILES['prel']['tmp_name'] as $key => $tmp_name) {
												$file_name = $key . $_FILES['prel']['name'][$key];
												$file_size = $_FILES['prel']['size'][$key];
												$file_tmp = $_FILES['prel']['tmp_name'][$key];

												$file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
												if (
													$file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
													&& $file_type != "gif"
												) {
													$related = '';
												} else {

													move_uploaded_file($file_tmp, "admin/images/products/related_images/" . $file_name);
													$arr[] = "admin/images/products/related_images/" . $file_name;
												}
											}
											$related = implode(',', $arr);
										}

										if ($related == '') {
											$related = $data['prel'];
										}


										$sql =   $conn->query("update products set ucode=" . $ucode . ",pname='" . $pname . "',catnameid=" . $catname . ",subcatname=" . $subcatname . ",pprice='" . $pprice . "',discount=" . $discount . ",pdesc='" . $pdesc . "',pimg='" . $pimg . "',prel='" . $related . "',product_info_question='" . $product_info_question . "',product_info_answer='" . $product_info_answer . "' where id=" . $_GET['edit'] . "");

										if ($sql) {
											$extra = "dashboard.php";

											echo "<script>
                                            alert('edited succesfully');
                                            
                                            window.location.href='" . $extra . "'
                                            </script>";
											exit();
										} else {
											echo "<script>
                                               alert('something went wrong);";
										}





									?>


									<?php

									}
									?>
									<!--FILED END-->
								</form>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--END PRICING DETAILS-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/select-opt.js"></script>
	<script type="text/javascript">
		var webpage_full_link = '';
	</script>
	<script type="text/javascript">
		var login_url = 'login?src=edit-product?code=PROD034';
	</script>
	<script src="js/custom.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/custom_validation.js"></script>
	
	</body>

	</html>
<?php } ?>