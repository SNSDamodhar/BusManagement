<?php

include "../connection.php";

$busNumber = $_POST['busNumber'];
$busNumber = strtoupper($busNumber);

$busRegNum = $_POST['registrationNo'];
$busRegNum = strtoupper($busRegNum);

$busRoute = $_POST['busRoute'];
$busRoute = strtoupper($busRoute);

$careTaker = explode("-", $_POST['careTakerId']);
$careTakerId = $careTaker[0];
$careTakerName = $careTaker[1];
//echo $_POST['careTakerId'] . $careTakerId . $careTakerName . " ";

$driver = explode("-", $_POST['driverId']);
$driverId = $driver[0];
$driverName = $driver[1];
//echo $_POST['driverId'] . $driverId . $driverId;

$busCapacity = $_POST['Capacity'];
$students_count = 0;



$busNumber_check_query = "SELECT * from busses where bus_id = '$busNumber'";
$execute_busNumber_check_query = mysqli_query($con, $busNumber_check_query);
$count= mysqli_num_rows($execute_busNumber_check_query);

if ($count != 0) {
    echo "<script>alert('Bus Number already exists')</script>";
    include "./addBus.php";
} else {
    try {
        $bus_add_query = "INSERT into busses(bus_id, bus_reg_number, bus_route, total_capacity, students_count, bus_driver_id, bus_driver_name, bus_caretaker_id, bus_caretaker_name) VALUES ('$busNumber', '$busRegNum', '$busRoute', '$busCapacity', '$students_count', '$driverId', '$driverName', '$careTakerId', '$careTakerName')";
        $execute_bus_add_query = mysqli_query($con, $bus_add_query);

        $update_driver = "UPDATE drivers SET driver_bus = '$busNumber' where driver_id = '$driverId'";
        $execute_update_driver = mysqli_query($con, $update_driver);

        $update_careTaker = "UPDATE caretakers SET ct_bus = '$busNumber' where ct_id = '$careTakerId'";
        $execute_update_driver = mysqli_query($con, $update_careTaker);

        header('location: ./addBus.php');
    } catch(Exception $e) {
        echo "Message: " . $e -> errorMessage();
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }
}
?>