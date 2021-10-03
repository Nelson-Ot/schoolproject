<?php
     include ("connect.php");
    
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $uname = $_POST['uname'];
     $email = $_POST['email'];
     $number = $_POST['number'];
     $password = $_POST['password'];
        
     $sql_u = "SELECT * FROM users WHERE uname='$username'";
     $sql_e = "SELECT * FROM users WHERE user_email='$email'";
     $res_u = mysqli_query($conn, $sql_u);
     $res_e = mysqli_query($conn, $sql_e);
     if (mysqli_num_rows($res_u) > 0) { 
             echo $name_error;
            
         }else if(mysqli_num_rows($res_e) > 0){

            echo "use another email address";	
        }else{
            $query="INSERT INTO users (first_name,last_name,uname,user_email,user_phone_number,upassword) VALUES ('$fname','$lname','$uname','$email','$number','".md5($password)."')";
           $data= mysqli_query($conn,$query);
           if($data){ 

            echo $success;
            }
        }



?>
<?php 
// require('connect.php');
 
// $fname = $_POST['fname'];
//      $lname = $_POST['lname'];
//      $uname = $_POST['uname'];
//      $email = $_POST['email'];
//      $number = $_POST['number'];
//      $password = $_POST['password'];

// $mysql= $conn->query( "INSERT INTO users (first_name,last_name,uname,user_email,user_phone_number,upassword) VALUES ('$fname','$lname','$uname','$email','$number','".md5($password)."')");
// // $con->query("insert into events(`title`,`description`,`time`,`location`,`phone_no`,`date`,`event_img`)values('".$etitle."','".$edesc."','".$etime."','".$eloc."','".$ephone."','".$edate."','".$url."')");

// if ($mysql) {

// echo "<script type=\"text/javascript\">
//                 alert(\"New member added successfully.\");
//                 window.location = \"login.php\"
//             </script>";

// } else
// die("Failed: error: " . $error);;
?>;