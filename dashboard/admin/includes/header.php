<!doctype html>
<html lang="en">

<head>
	<title>Bizbook Admin Panel</title>
	<!--== META TAGS ==-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#76cef1" />
	<!--== FAV ICON(BROWSER TAB ICON) ==-->
	<link rel="shortcut icon" href="../images/fav.ico" type="image/x-icon">
	<!--== GOOGLE FONTS ==-->
	<link href="https://fonts.googleapis.com/css?family=Oswald:700|Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
	<!--== WEB ICON FONTS ==-->
	<link rel="preload" as="font" href="css/icon.woff2" type="font/woff2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--== CSS FILES ==-->
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<link rel="stylesheet" href="../css/fonts.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!-- START -->
	<section>
		<div class="ad-head">
			<div class="head-s1">
				<div class="menu"> <i class="material-icons mopen">menu</i>
					<i class="material-icons mclose">close</i>
				</div>
				<div class="logo">
					<!-- <img src="images/logo-b.png"> -->
				</div>
			</div>
			
			<div class="head-s3">
				<div class="head-pro">
				<?php
                                    $ret = mysqli_query($conn, "select * from admin where id='" . $_SESSION['id'] . "' ");

                                    while ($row = mysqli_fetch_array($ret)) {

                                    ?>
					<img src="<?php echo $row['profilepicture'];?>" alt=""> <b>Profile by</b>
					<?php } ?>
					<br>
					<h4><?php echo $_SESSION['login'];?></h4>
					<a href="admin-setting.php" class="fclick"></a>
				</div>
			</div>
		</div>
	</section>