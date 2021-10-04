<?php 

include 'connect.php';

$category_id = $_REQUEST['category_id'];

$sql = mysqli_query($conn,"SELECT * FROM sub_cat WHERE cat_id = '$category_id'");
?>

<?php 
 while ($sql_fetch = mysqli_fetch_assoc($sql)){?>
 <option value="<?=$sql_fetch['subcatid']?>"><?=$sql_fetch['sub_cat_name']?></option>

<?php } ?>
