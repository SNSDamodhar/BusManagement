<?php 
    include "../connection.php";
    echo $_POST['time'];
    echo $_POST['date'];

    $attendence = $_POST['attendence'];
    $student_id = $_POST['student'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if($attendence === "IN") {
        $check_record = "SELECT * FROM student_attendence WHERE roll_number = '$student_id' and date = '$date'";
        $execute_check_record = mysqli_query($con, $check_record);
        $count = mysqli_num_rows($execute_check_record);
        
        if($count != 0) {
            $update_in_time = "UPDATE student_attendence SET in_time = '$time' WHERE roll_number = '$student_id' and date = '$date'";
            $execute_update_in_time = mysqli_query($con, $update_in_time);

            header("location:./index.php");
        } else {
            $insert_attendence = "INSERT INTO `student_attendence`(`roll_number`, `date`, `in_time`) VALUES ('$student_id','$date','$time')";
            $execute_insert_attendence = mysqli_query($con, $insert_attendence);

            header("location:./index.php");
        }
        
    } elseif ($attendence === "OUT") {
        $check_record = "SELECT * FROM student_attendence WHERE roll_number = '$student_id' and date = '$date'";
        $execute_check_record = mysqli_query($con, $check_record);
        $count = mysqli_num_rows($execute_check_record);

        if($count != 0) {
            $update_in_time = "UPDATE student_attendence SET out_time = '$time' WHERE roll_number = '$student_id' and date = '$date'";
            $execute_update_in_time = mysqli_query($con, $update_in_time);

            header("location:./index.php");
        } else {
            echo "<script>alert('Capture In Attendence')</script>";
            include './index.php';
        }


    } elseif ($attendence === "Absent") {
        $check_record = "SELECT * FROM student_attendence WHERE roll_number = '$student_id' and date = '$date'";
        $execute_check_record = mysqli_query($con, $check_record);
        $count = mysqli_num_rows($execute_check_record);

        if($count != 0) {
            $update_in_time = "UPDATE student_attendence SET out_time = 'ABSENT' WHERE roll_number = '$student_id' and date = '$date'";
            $execute_update_in_time = mysqli_query($con, $update_in_time);

            header("location:./index.php");
        } else {
            $insert_attendence = "INSERT INTO `student_attendence`(`roll_number`, `date`, `in_time`, `out_time`) VALUES ('$student_id','$date','ABSENT', 'ABSENT')";
            $execute_insert_attendence = mysqli_query($con, $insert_attendence);

            header("location:./index.php");
        }
    }
?>