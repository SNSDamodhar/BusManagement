<?php

include "../connection.php";

$user = $_POST['user'];

if($user == "driver") {
    $driverId = $_POST['id'];
    $busId = $_POST['busid'];

    try {
        $update_bus_query = "UPDATE busses SET bus_driver_id = NULL, bus_driver_name = NULL where bus_id = '$busId'";
        $execute_update_bus_query = mysqli_query($con, $update_bus_query);

        $delete_driver = "DELETE FROM drivers where driver_id = '$driverId'";
        $execute_delete_driver = mysqli_query($con, $delete_driver);

        header('location:./index.php');
    } catch(Exception $e) {
        echo "Some Error Occurred";
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }

} elseif($user == "caretaker") {
    $careTakerId = $_POST['id'];
    $busId = $_POST['busid'];

    try {
        $update_bus_query = "UPDATE busses SET bus_caretaker_id = NULL, bus_caretaker_name = NULL where bus_id = '$busId'";
        $execute_update_bus_query = mysqli_query($con, $update_bus_query);

        $delete_careTaker = "DELETE FROM caretakers WHERE ct_id = '$careTakerId'";
        $execute_delete_careTaker = mysqli_query($con, $delete_careTaker);

        header('location:./index.php');
    } catch(Exception $e) {
        echo "Some Error Occurred";
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }
} elseif ($user == "student") {
    $student_id = $_POST['id'];
    $bus_id = $_POST['busid'];

    try {
        $delete_student = "DELETE FROM students WHERE roll_number = '$student_id'";
        $execute_delete_student = mysqli_query($con, $delete_student);

        $update_student_count_bus = "UPDATE busses SET students_count = students_count - 1 WHERE bus_id = '$bus_id'";
        $execute_update_student_count_bus = mysqli_query($con, $update_student_count_bus);

        $delete_fees_records = "DELETE FROM student_fees WHERE roll_number = '$student_id'";
        $execute_delete_fees_records = mysqli_query($con, $delete_fees_records);

        header('location:./index.php');
    } catch(Exception $e) {
        echo "Some Error Occurred";
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }
} elseif ($user == "student_no_bus") {
    $student_id = $_POST['id'];
    $bus_id = $_POST['busid'];

    try {
        $delete_student = "DELETE FROM students WHERE roll_number = '$student_id'";
        $execute_delete_student = mysqli_query($con, $delete_student);

        $delete_fees_records = "DELETE FROM student_fees WHERE roll_number = '$student_id'";
        $execute_delete_fees_records = mysqli_query($con, $delete_fees_records);

        header('location:./listDeletedBusUsers.php');
    } catch(Exception $e) {
        echo "Some Error Occurred";
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }

} else {
    header('location:./index.php');
}

?>