<?php

    include './connection.php';

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $loginAs =  mysqli_real_escape_string($con, $_POST['loginAs']);

    //echo $con;

    //echo $username . $password . $loginAs;

    if ($loginAs == "Admin") {

        $username_check_query = "SELECT * from admin where username = '$username'";
        $execute_username_check_query = mysqli_query($con, $username_check_query);
        $count1 = 0;
        $count1 = mysqli_num_rows($execute_username_check_query);
        
        if ($count1 != 0) {

            $user_check_query = "SELECT * from admin where username = '$username' and password = '$password'";
            $execute_user_check_query = mysqli_query($con, $user_check_query);
            $count2 = 0;
            $count2 = mysqli_num_rows($execute_user_check_query);

            if ($count2 != 0) {
                session_start();
	            $_SESSION['admin'] = $username;
                header("location:./Admin/index.php");
            } else {
                echo "<script>alert('Password Wrong!')</script>";
                include './index.html';
            }

        } else {
            echo "<script>alert('User Name incorrect or Not exist!')</script>";
            include './index.html';
        }
    } elseif($loginAs == "Caretaker") {
        $username_check_query = "SELECT * FROM caretakers WHERE ct_username = '$username'";
        $execute_username_check_query = mysqli_query($con, $username_check_query);
        $count1 = 0;
        $count1 = mysqli_num_rows($execute_username_check_query);

        if ($count1 != 0) {

            $user_check_query = "SELECT * FROM caretakers where ct_username = '$username' and ct_password = '$password'";
            $execute_user_check_query = mysqli_query($con, $user_check_query);
            $count2 = 0;
            $count2 = mysqli_num_rows($execute_user_check_query);

            if ($count2 != 0) {
                // $caretaker_values = mysqli_fetch_assoc($execute_user_check_query);
                session_start();
	            $_SESSION['caretaker'] = $username;
                // $_SESSION['ct_busid'] = $caretaker_values['ct_bus'];
                header("location:./CareTaker/index.php");
            } else {
                echo "<script>alert('Password Wrong!')</script>";
                include './index.html';
            }

        } else {
            echo "<script>alert('User Name incorrect or Not exist!')</script>";
            include './index.html';
        }
    }elseif ($loginAs == "Student") {
        $username_check_query = "SELECT * FROM students WHERE student_username = '$username'";
        $execute_username_check_query = mysqli_query($con, $username_check_query);
        $count1 = 0;
        $count1 = mysqli_num_rows($execute_username_check_query);

        if ($count1 != 0) {

            $user_check_query = "SELECT * FROM students where student_username = '$username' and student_password = '$password'";
            $execute_user_check_query = mysqli_query($con, $user_check_query);
            $count2 = 0;
            $count2 = mysqli_num_rows($execute_user_check_query);

            if ($count2 != 0) {
                // $caretaker_values = mysqli_fetch_assoc($execute_user_check_query);
                session_start();
	            $_SESSION['student'] = $username;
                // $_SESSION['ct_busid'] = $caretaker_values['ct_bus'];
                header("location:./Student/index.php");
            } else {
                echo "<script>alert('Password Wrong!')</script>";
                include './index.html';
            }

        } else {
            echo "<script>alert('User Name incorrect or Not exist!')</script>";
            include './index.html';
        }
    } else {
        echo "<script>alert('Select LoginAs from suggestions')</script>";
        include './index.html';
    }


?>

