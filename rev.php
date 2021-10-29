<?php
include 'connect.php';

if (isset($_POST['review'])) {
    $rating = $_POST['rating'];
    // $review = $_POST['review'];
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    $rname = $_POST['reviewer-name'];
    $remail = $_POST['reviewer-email'];
    $rprod = $_POST['prod'];
    $rseller = $_POST['sellerscode'];






    $msg = mysqli_query($conn, "insert into reviews(rating,review,name,email,product,seller_id) values('$rating','$review','$rname','$remail','$rprod','$rseller')");

    if ($msg) {
        echo "<script>alert('review submitted successfully');</script>";
        $extra = "index.php";
        echo "<script>window.location.href='" . $extra . "'</script>";
        exit();
    }else{
        echo "<script>alert('failed! please try again');</script>";
    }
}
?>