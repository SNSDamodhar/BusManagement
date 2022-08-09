<?php
    include "../connection.php";

    try {
        $id = $_POST['id'];

        $busNumber = $_POST['busNumber'];
        $busNumber = strtoupper($busNumber);

        $busRegNum = $_POST['registrationNo'];
        $busRegNum = strtoupper($busRegNum);

        $busRoute = $_POST['busRoute'];
        $busRoute = strtoupper($busRoute);

        $careTaker = explode("-", $_POST['careTakerId']);
        $careTakerId = strtoupper($careTaker[0]);
        $careTakerName = $careTaker[1];

        $driver = explode("-", $_POST['driverId']);
        $driverId = strtoupper($driver[0]);
        $driverName = $driver[1];

        $busCapacity = $_POST['Capacity'];

        $driID = $_POST['driID'];
        $ctID = $_POST['ctID'];

        if($driID != $driverId && $ctID != $careTakerId) {
            $update_old_ct = "UPDATE caretakers SET ct_bus = NULL WHERE ct_id = '$ctID'";
            $execute_update_old_ct = mysqli_query($con, $update_old_ct);

            $update_old_dri = "UPDATE drivers SET driver_bus = NULL WHERE driver_id = '$driID'";
            $execute_update_old_dri = mysqli_query($con, $update_old_dri);

        } elseif ($driID != $driverId || $ctID != $careTakerId) {
            if ($driID != $driverId) {
                $update_old_dri = "UPDATE drivers SET driver_bus = NULL WHERE driver_id = '$driID'";
                $execute_update_old_dri = mysqli_query($con, $update_old_dri);
            }

            if($ctID != $careTakerId) {
                $update_old_ct = "UPDATE caretakers SET ct_bus = NULL WHERE ct_id = '$ctID'";
                $execute_update_old_ct = mysqli_query($con, $update_old_ct);
            }
        }

        $update_driver_query = "UPDATE drivers SET driver_bus = '$id' WHERE driver_id = '$driverId'";
        $execute_update_driver_query = mysqli_query($con, $update_driver_query);

        $update_caretaker_query = "UPDATE caretakers SET ct_bus = '$id' WHERE ct_id = '$careTakerId'";
        $execute_update_caretaker_query = mysqli_query($con, $update_caretaker_query);

        $update_bus_query = "UPDATE busses SET bus_route = '$busRoute', bus_caretaker_id = '$careTakerId', bus_caretaker_name = '$careTakerName', bus_driver_id = '$driverId', bus_driver_name = '$driverName', total_capacity = '$busCapacity' WHERE bus_id = '$id'";
        $execute_update_bus_query = mysqli_query($con, $update_bus_query);

        header("location:./index.php");

    } catch(Exception $e) {
        echo "Message: " . $e -> errorMessage();
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }

?>