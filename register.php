<?php
include 'connect.php';

	//pick value from the form
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$unumber = $_POST['number'];
	$upwd = $_POST['password'];
	

	
	//insert values into db
	$sql = "INSERT INTO users(first_name, last_name, uname, user_email, user_phone_number, upassword,profpic,county ) VALUES('$fname','$lname','$uname','$email','$unumber','$upwd','','')";

	if ($conn->query($sql) === TRUE) {
		echo "<script type=\"text/javascript\">
        alert(\"New member added successfully.\");
        window.location = \"signin.php\"
    </script>";
	}else{
		echo "Request failled";
	}

	$conn->close();
?>