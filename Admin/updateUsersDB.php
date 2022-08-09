<?php
    include "../connection.php";

    if($_POST['user'] == "driver") {
        try {
            $id = $_POST['id'];
            $driverName = mysqli_real_escape_string($con, $_POST['driverName']);
            $driverNumber = mysqli_real_escape_string($con, $_POST['driverNumber']);
            $driverGender = mysqli_real_escape_string($con, $_POST['driverGender']);
            $driverAddress = mysqli_real_escape_string($con, $_POST['driverAddress']);
            $driverCity = mysqli_real_escape_string($con, $_POST['driverCity']);
            $driverZipCode = mysqli_real_escape_string($con, $_POST['driverZipCode']);
            $driverState = mysqli_real_escape_string($con, $_POST['driverState']);

            $update_driver_query = "UPDATE drivers SET driver_name = '$driverName', driver_phone_number = '$driverNumber', driver_gender = '$driverGender', driver_address = '$driverAddress', driver_city = '$driverCity', driver_pincode = '$driverZipCode' WHERE driver_id = '$id'";
            $execute_update_driver_query = mysqli_query($con, $update_driver_query);
            
            header("location:./index.php");
        } catch(Exception $e) {
            echo "Something went Wrong!";
            echo "<a href = './index.php'>Go to Home Screen</a>";
        }
    } elseif($_POST['user'] == "caretaker") {
        try {
            $id = $_POST['id'];
            $careTakerName = mysqli_real_escape_string($con, $_POST['careTakerName']);
            $careTakerUsername = mysqli_real_escape_string($con, $_POST['careTakerUsername']);
            $careTakerPassword = mysqli_real_escape_string($con, $_POST['careTakerPassword']);
            $careTakerNumber = mysqli_real_escape_string($con, $_POST['careTakerNumber']);
            $careTakerGender = mysqli_real_escape_string($con, $_POST['careTakerGender']);
            $careTakerAddress = mysqli_real_escape_string($con, $_POST['careTakerAddress']);
            $careTakerCity = mysqli_real_escape_string($con, $_POST['careTakerCity']);
            $careTakerZipCode = mysqli_real_escape_string($con, $_POST['careTakerZipCode']);
            $careTakerState = mysqli_real_escape_string($con, $_POST['careTakerState']);

            echo $careTakerGender;

            $update_caretaker_query = "UPDATE caretakers SET ct_name = '$careTakerName', ct_username = '$careTakerUsername', ct_password = '$careTakerPassword', ct_phone_number = '$careTakerNumber', ct_gender = '$careTakerGender', ct_address = '$careTakerAddress', ct_city = '$careTakerCity', ct_state = '$careTakerState', ct_pincode = '$careTakerZipCode' WHERE ct_id = '$id'";
            $execute_update_caretaker_query = mysqli_query($con, $update_caretaker_query);
            
            header("location:./index.php");
        } catch(Exception $e) {
            echo "Something went Wrong!";
            echo "<a href = './index.php'>Go to Home Screen</a>";
        }

    } elseif ($_POST['user'] == "student") {
        $old_bus = $_POST['old_bus'];
        $student_id = $_POST['student_id'];
        
        try {
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
            $student_bus = mysqli_real_escape_string($con, $_POST['studentBus']);
            $student_year_from = mysqli_real_escape_string($con, $_POST['studentYearFrom']);
            $student_year_to = mysqli_real_escape_string($con, $_POST['studentYearTo']);
            $student_first_term_fee = mysqli_real_escape_string($con, $_POST['studentFirstInstallment']);
            $student_second_term_fee = mysqli_real_escape_string($con, $_POST['studentSecondInstallment']);
            $student_first_term_paid = mysqli_real_escape_string($con, $_POST['studentFirstInstallmentPaid']);
            $student_second_term_paid = mysqli_real_escape_string($con, $_POST['studentSecondInstallmentPaid']);

            if($old_bus != $student_bus) {
                $bus_student_count = "SELECT * FROM busses WHERE bus_id = '$student_bus'";
                $execute_bus_student_count = mysqli_query($con, $bus_student_count);
                $bus_count_values = mysqli_fetch_assoc($execute_bus_student_count);
                $total_cap = $bus_count_values['total_capacity'];
                $updated_count = $bus_count_values['students_count'] + 1;

                
                if($updated_count <= $total_cap) {
                    $update_student_query = "UPDATE `students` SET student_bus = '$student_bus', `student_name`='$student_name',`student_username`='$student_username',`student_password`='$student_password',`student_father`='$student_father_name',`student_phone_number`='$student_phone_number',`student_mail`='$student_mail',`student_class`='$student_class',`student_section`='$student_section',`student_gender`='$student_gender',`student_address`='$student_address',`student_city`='$student_city',`student_pincode`='$student_pincode',`student_state`='$student_state',`student_year_from`='$student_year_from',`student_year_to`='$student_year_to' WHERE roll_number = '$student_id'";
                    $execute_update_student_query = mysqli_query($con, $update_student_query);

                    $update_fees_details = "UPDATE `student_fees` SET `year_from`='$student_year_from',`year_to`='$student_year_to',`first_term_fee`='$student_first_term_fee',`first_term_paid`='$student_first_term_paid',`second_term_fee`='$student_second_term_fee',`second_term_paid`='$student_second_term_paid' WHERE roll_number = '$student_id'";
                    $execute_update_fees_details = mysqli_query($con, $update_fees_details);

                    $update_student_count_old_bus = "UPDATE busses SET students_count = students_count - 1 WHERE bus_id = '$old_bus'";
                    $execute_update_student_count_old_bus = mysqli_query($con, $update_student_count_old_bus);

                    $update_student_count_new_bus = "UPDATE busses SET students_count = students_count + 1 WHERE bus_id = '$student_bus'";
                    $execute_update_student_count_new_bus = mysqli_query($con, $update_student_count_new_bus);

                    header("location:./index.php");
                } else {
                    echo "Capacity is Full in new Bus!!";
                    echo "<a href = './index.php'>Go to Home Screen</a>";
                }
            } else {
                $update_student_query = "UPDATE `students` SET student_bus = '$student_bus', `student_name`='$student_name',`student_username`='$student_username',`student_password`='$student_password',`student_father`='$student_father_name',`student_phone_number`='$student_phone_number',`student_mail`='$student_mail',`student_class`='$student_class',`student_section`='$student_section',`student_gender`='$student_gender',`student_address`='$student_address',`student_city`='$student_city',`student_pincode`='$student_pincode',`student_state`='$student_state',`student_year_from`='$student_year_from',`student_year_to`='$student_year_to' WHERE roll_number = '$student_id'";
                $execute_update_student_query = mysqli_query($con, $update_student_query);

                $update_fees_details = "UPDATE `student_fees` SET `year_from`='$student_year_from',`year_to`='$student_year_to',`first_term_fee`='$student_first_term_fee',`first_term_paid`='$student_first_term_paid',`second_term_fee`='$student_second_term_fee',`second_term_paid`='$student_second_term_paid' WHERE roll_number = '$student_id'";
                $execute_update_fees_details = mysqli_query($con, $update_fees_details);

                header("location:./index.php");
            }

            // $update_student_query = "UPDATE `students` SET student_bus = '$student_bus', `student_name`='$student_name',`student_username`='$student_username',`student_password`='$student_password',`student_father`='$student_father_name',`student_phone_number`='$student_phone_number',`student_mail`='$student_mail',`student_class`='$student_class',`student_section`='$student_section',`student_gender`='$student_gender',`student_address`='$student_address',`student_city`='$student_city',`student_pincode`='$student_pincode',`student_state`='$student_state',`student_year_from`='$student_year_from',`student_year_to`='$student_year_to' WHERE roll_number = '$student_id'";
            // $execute_update_student_query = mysqli_query($con, $update_student_query);

            // $update_fees_details = "UPDATE `student_fees` SET `year_from`='$student_year_from',`year_to`='$student_year_to',`first_term_fee`='$student_first_term_fee',`first_term_paid`='$student_first_term_paid',`second_term_fee`='$student_second_term_fee',`second_term_paid`='$student_second_term_paid' WHERE roll_number = '$student_id'";
            // $execute_update_fees_details = mysqli_query($con, $update_fees_details);

            // if($old_bus != $student_bus) {
            //     $update_student_count_old_bus = "UPDATE busses SET students_count = students_count - 1 WHERE bus_id = '$old_bus'";
            //     $execute_update_student_count_old_bus = mysqli_query($con, $update_student_count_old_bus);

            //     $update_student_count_new_bus = "UPDATE busses SET students_count = students_count + 1 WHERE bus_id = '$student_bus'";
            //     $execute_update_student_count_new_bus = mysqli_query($con, $update_student_count_new_bus);
            // }

            // header("location:./index.php");
        } catch(Exception $e) {
            echo "Something went Wrong!";
            echo "<a href = './index.php'>Go to Home Screen</a>";
        }

    } else {
        header("location:./index.php");
    }
?>