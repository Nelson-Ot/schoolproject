<?php

include 'connect.php';

        if (isset($_POST['enq'])) {
            $sellers_id = $_POST['sname'];
            $prod_id = $_POST['prod_id'];
            $name = $_POST['enqname'];
            $email = $_POST['enqmail'];
            $mobile_no = $_POST['phone'];
            $message = $_POST['message'];






            $msg = mysqli_query($conn, "insert into enquiry(sellers_id,prod_id,name,email,mobile_number,message) values('$sellers_id','$prod_id','$name','$email','$mobile_no','$message')");

            if ($msg) {
                echo "<script>alert('enquiry submitted successfully');</script>";
                $extra = "index.php";
                echo "<script>window.location.href='" . $extra . "'</script>";
                exit();
            }else{
                echo "<script>alert('failed! lease try again');</script>";
            }
        }

        
        ?>