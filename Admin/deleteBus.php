<?php
    include "../connection.php";

    $bus_id = mysqli_real_escape_string($con, $_POST['id']);
    $driver_id = mysqli_real_escape_string($con, $_POST['driver']);
    $careTaker_id = mysqli_real_escape_string($con, $_POST['careTaker']);
    
    try {
        if($driver_id == null && $careTaker_id == null) {
            $bus_delete_query = "DELETE FROM busses WHERE bus_id = '$bus_id'";
            $execute_bus_delete_query = mysqli_query($con, $bus_delete_query);

            $students_delete_query = "UPDATE students SET student_bus = 'NO BUS' WHERE student_bus = '$bus_id'";
            $execute_students_delete_query = mysqli_query($con, $students_delete_query);

            header("location:./index.php");
        } elseif ($driver_id == null || $careTaker_id == null) {
            if($driver_id == null) {
                $careTaker_update_query = "UPDATE caretakers SET ct_bus = NULL WHERE ct_id = '$careTaker_id'";
                $execute_careTaker_update_query = mysqli_query($con, $careTaker_update_query);
            } elseif ($careTaker_id == null) {
                $driver_update_query = "UPDATE drivers SET driver_bus = NULL WHERE driver_id = '$driver_id'";
                $execute_driver_update_query = mysqli_query($con, $driver_update_query);
            }

            $bus_delete_query = "DELETE FROM busses WHERE bus_id = '$bus_id'";
            $execute_bus_delete_query = mysqli_query($con, $bus_delete_query);

            $students_delete_query = "UPDATE students SET student_bus = 'NO BUS' WHERE student_bus = '$bus_id'";
            $execute_students_delete_query = mysqli_query($con, $students_delete_query);

            header("location:./index.php");
        } else {

            $careTaker_update_query = "UPDATE caretakers SET ct_bus = NULL WHERE ct_id = '$careTaker_id'";
            $execute_careTaker_update_query = mysqli_query($con, $careTaker_update_query);

            $driver_update_query = "UPDATE drivers SET driver_bus = NULL WHERE driver_id = '$driver_id'";
            $execute_driver_update_query = mysqli_query($con, $driver_update_query);

            $bus_delete_query = "DELETE FROM busses WHERE bus_id = '$bus_id'";
            $execute_bus_delete_query = mysqli_query($con, $bus_delete_query);

            $students_delete_query = "UPDATE students SET student_bus = 'NO BUS' WHERE student_bus = '$bus_id'";
            $execute_students_delete_query = mysqli_query($con, $students_delete_query);

            header("location:./index.php");
        }
    } catch (Exception $e) {
        echo "Message: " . $e -> errorMessage();
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }
?>