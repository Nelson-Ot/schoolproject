<?php
include 'connect.php';
// //db credentials
// $servername = 'localhost';
// $dbusername = "root";
// $dbpassword = "";
// $dbname = "schoolproject";

// //connecting to the database
// $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// if ($conn->connect_error) {
// 	die("Connection error".$conn->connect_error);
// }
// else{
// 	echo "Connected successfully";
// }
	//pick value from the form
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$unumber = $_POST['number'];
	$upwd = $_POST['password'];
	

	
	//insert values into db
	$sql = "INSERT INTO users(first_name, last_name, uname, user_email, user_phone_number, upassword ) VALUES('$fname','$lname','$uname','$email','$unumber','$upwd')";

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