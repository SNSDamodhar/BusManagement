<?php

include "../connection.php";


if ( $_POST['user'] == 'driver') {

    $driverName = mysqli_real_escape_string($con, $_POST['driverName']);
    $driverId = mysqli_real_escape_string($con, $_POST['driverId']);
    $driverNumber = mysqli_real_escape_string($con, $_POST['driverNumber']);
    $driverGender = mysqli_real_escape_string($con, $_POST['driverGender']);
    $driverAddress = mysqli_real_escape_string($con, $_POST['driverAddress']);
    $driverCity = mysqli_real_escape_string($con, $_POST['driverCity']);
    $driverZipCode = mysqli_real_escape_string($con, $_POST['driverZipCode']);
    $driverState = mysqli_real_escape_string($con, $_POST['driverState']);

    $user_check_query = "SELECT * from drivers where driver_id = '$driverId' or driver_phone_number = '$driverNumber' LIMIT 1";
    $execute_user_check_query = mysqli_query($con, $user_check_query);
    $count= mysqli_num_rows($execute_user_check_query);


    if ($count > 0 ) {
        echo "<script>alert('User ID or User phone number already exists')</script>";
        include "./index.php";
    } else {
        $user_add_query = "INSERT into drivers(driver_id, driver_name, driver_phone_number, driver_gender, driver_address, driver_city, driver_pincode, driver_state) values ('$driverId', '$driverName', '$driverNumber', '$driverGender', '$driverAddress', '$driverCity', '$driverZipCode', '$driverState')";
        if (mysqli_query($con, $user_add_query) ) {
            header('location:./index.php');
        } else {
            echo mysqli_error($con);
            echo "<a href = './index.php'>Go to Home Screen</a>";
        }
    }


} elseif ($_POST['user'] == 'student') {
    $student_name = mysqli_real_escape_string($con, $_POST['studentName']);
    $student_roll_num = mysqli_real_escape_string($con, $_POST['studentRoll']);
    $student_username= mysqli_real_escape_string($con, $_POST['studentUsername']);
    $student_password = mysqli_real_escape_string($con, $_POST['studentPassword']);
    $student_father_name = mysqli_real_escape_string($con, $_POST['studentFather']);
    $student_phone_number = mysqli_real_escape_string($con, $_POST['studentNumber']);
    $student_mail = mysqli_real_escape_string($con, $_POST['studentEmail']);
    $student_class = mysqli_real_escape_string($con, $_POST['studentClass']);
    $student_section = mysqli_real_escape_string($con, $_POST['studentSection']);
    $student_gender = mysqli_real_escape_string($con, $_POST['studentGender']);
    $student_address = mysqli_real_escape_string($con, $_POST['studentAddress']);
    $student_city = mysqli_real_escape_string($con, $_POST['studentCity']);
    $student_pincode = mysqli_real_escape_string($con, $_POST['studentZipCode']);
    $student_state = mysqli_real_escape_string($con, $_POST['studentState']);
    $student_bus = mysqli_real_escape_string($con, $_POST['busId']);
    $student_year_from = mysqli_real_escape_string($con, $_POST['studentYearFrom']);
    $student_year_to = mysqli_real_escape_string($con, $_POST['studentYearTo']);
    $student_first_term_fee = mysqli_real_escape_string($con, $_POST['studentFirstInstallment']);
    $student_second_term_fee = mysqli_real_escape_string($con, $_POST['studentSecondInstallment']);
    $student_first_term_paid = mysqli_real_escape_string($con, $_POST['studentFirstInstallmentPaid']);
    $student_second_term_paid = mysqli_real_escape_string($con, $_POST['studentSecondInstallmentPaid']);

    $bus_student_count = "SELECT * FROM busses WHERE bus_id = '$student_bus'";
    $execute_bus_student_count = mysqli_query($con, $bus_student_count);
    $bus_count_values = mysqli_fetch_assoc($execute_bus_student_count);
    $total_cap = $bus_count_values['total_capacity'];
    $updated_count = $bus_count_values['students_count'] + 1;

    if($updated_count <= $total_cap) {
        $user_check_query = "SELECT * FROM students WHERE roll_number = '$student_roll_num' OR student_username = '$student_username' LIMIT 1";
        $execute_user_check_query = mysqli_query($con, $user_check_query);
        $count= mysqli_num_rows($execute_user_check_query);

        if($count > 0) {
            echo "Sudent Roll Number or Username already exists!!";
            echo "<a href = './index.php'>Go to Home Screen</a>";
        } else {
            $insert_student_query = "INSERT INTO `students`(`roll_number`, `student_name`, `student_username`, `student_password`, `student_father`, `student_phone_number`, `student_mail`, `student_class`, `student_section`, `student_gender`, `student_address`, `student_city`, `student_pincode`, `student_state`, `student_bus`, `student_year_from`, `student_year_to`) VALUES ('$student_roll_num','$student_name','$student_username','$student_password','$student_father_name','$student_phone_number','$student_mail','$student_class','$student_section','$student_gender','$student_address','$student_city','$student_pincode','$student_state','$student_bus','$student_year_from','$student_year_to')";
            $execute_insert_student_query = mysqli_query($con, $insert_student_query);

            $insert_student_fees_query = "INSERT INTO `student_fees`(`roll_number`, `year_from`, `year_to`, `first_term_fee`, `first_term_paid`, `second_term_fee`, `second_term_paid`) VALUES ('$student_roll_num','$student_year_from','$student_year_to','$student_first_term_fee','$student_first_term_paid','$student_second_term_fee','$student_second_term_paid')";
            $execute_insert_student_fees_query = mysqli_query($con, $insert_student_fees_query);

            $update_student_count_bus = "UPDATE busses SET students_count = students_count + 1 WHERE bus_id = '$student_bus'";
            $execute_update_student_count_bus = mysqli_query($con, $update_student_count_bus);
            
            header('location:./index.php');
        }
    } else {
        echo "Capacity is Full!!";
        echo "<a href = './index.php'>Go to Home Screen</a>";
    }
    
   
}elseif ($_POST['user'] == 'caretaker') {
    $careTakerName = mysqli_real_escape_string($con, $_POST['careTakerName']);
    $careTakerId = mysqli_real_escape_string($con, $_POST['careTakerId']);
    $careTakerUsername = mysqli_real_escape_string($con, $_POST['careTakerUsername']);
    $careTakerPassword = mysqli_real_escape_string($con, $_POST['careTakerPassword']);
    $careTakerNumber = mysqli_real_escape_string($con, $_POST['careTakerNumber']);
    $careTakerGender = mysqli_real_escape_string($con, $_POST['careTakerGender']);
    $careTakerAddress = mysqli_real_escape_string($con, $_POST['careTakerAddress']);
    $careTakerCity = mysqli_real_escape_string($con, $_POST['careTakerCity']);
    $careTakerZipCode = mysqli_real_escape_string($con, $_POST['careTakerZipCode']);
    $careTakerState = mysqli_real_escape_string($con, $_POST['careTakerState']);

    $user_check_query = "SELECT * from caretakers where ct_id = '$careTakerId' or ct_phone_number = '$careTakerNumber' or ct_username = '$careTakerUsername' LIMIT 1";
    $execute_user_check_query = mysqli_query($con, $user_check_query);
    $count= mysqli_num_rows($execute_user_check_query);

    if ($count > 0 ) {
        echo "<script>alert('User ID or User phone number or Username already exists')</script>";
        include "./index.php";
    } else {
        $user_add_query = "INSERT into caretakers(ct_id, ct_name, ct_username, ct_password, ct_phone_number, ct_gender, ct_address, ct_city, ct_pincode, ct_state) values ('$careTakerId', '$careTakerName', '$careTakerUsername', '$careTakerPassword', '$careTakerNumber', '$careTakerGender', '$careTakerAddress', '$careTakerCity', '$careTakerZipCode', '$careTakerState')";
        if (mysqli_query($con, $user_add_query) ) {
            header('location:./index.php');
        } else {
            echo mysqli_error($con);
            echo "<a href = './index.php'>Go to Home Screen</a>";
        }
    }

}else {
    header('location:./index.php');
}


?>