<?php
	$username = "";

    include "../connection.php";

	session_start();

	if(isset($_SESSION['student'])) {
		$username = $_SESSION['student'];
	}else {
		header('location:../index.html');
	}

    
    $students_query = "SELECT * FROM students WHERE student_username = '$username'";
    $execute_students_query = mysqli_query($con, $students_query);
	$student_values = mysqli_fetch_assoc($execute_students_query);

	$student_bus = $student_values['student_bus'];

	$caretaker_query = "SELECT * FROM caretakers WHERE ct_bus = '$student_bus' LIMIT 1";
	$execute_caretaker_query = mysqli_query($con, $caretaker_query);
	$ct_values = mysqli_fetch_assoc($execute_caretaker_query);

	$driver_query = "SELECT * FROM drivers WHERE driver_bus = '$student_bus' LIMIT 1";
	$execute_driver_query = mysqli_query($con, $driver_query);
	$driver_values = mysqli_fetch_assoc($execute_driver_query);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
        <title>Document</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="./static/css/style.css">
		<link rel="stylesheet" href="../nav.css">
    </head>

    <body style="background: linear-gradient(to right, #9796f0 -20%, #fbc7d4 100%);">

		<nav class="navbar navbar-expand-lg navbar-light nav-color">
			<div class="container-fluid">
				<a class="navbar-brand" href="./index.php" style="color:antiquewhite;font-size:30px">
					STUDENT
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./feeDetails.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Fee Details</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./attendence.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Attendence</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./logout.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Logout</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="#" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;"><?php echo "Welcome " . $username; ?></a>
						</li>
						
					</ul> 
					
				</div>
				
			</div>
		</nav>


		<div class="container">
				<div class="row justify-content-center background">
					<form action="" method="POST"  class = "form1">

						<div class="form-row align-items-center">
							<div class="col-xs-3 col-sm-2">

							</div>
							<div class="col-xs-7 col-sm-7">
								<h4>DETAILS</h4>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-12">
								<div class = "row">
									<label class="col-sm-5">Name</label>
									<input class="col-sm-7" type="text" class="form-control" name="studentName" readonly id="" value = "<?php echo $student_values['student_name']; ?>">
								</div>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-12">
								<div class = "row">
								<label class="col-sm-5">Roll Number</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentRoll" readonly id="" value = "<?php echo $student_values['roll_number']; ?>" >
							</div>
                        </div>
                    </div>


                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Father Name</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentFather" readonly id="" value = "<?php echo $student_values['student_father']; ?>" >
							</div>
                        </div>
                    </div>
						
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
							<div class = "row">
								<label class="col-sm-5">PhoneNumber</label>
								<input class="col-sm-7" type="tel" class="form-control" name="studentNumber" readonly id="" value = "<?php echo $student_values['student_phone_number']; ?>">
							</div>
                        </div>
                    </div>

					<div class="form-row align-items-center">
						<div class="col-sm-12">
							<div class = "row">
								<label class="col-sm-5">Email id</label>
								<input class="col-sm-7" type="email" class="form-control" name="studentEmail" readonly id="" value = "<?php echo $student_values['student_mail']; ?>">
							</div>
                        </div>
                    </div>
						
						
					<div class="form-row align-items-center">
						<div class="col-sm-12">
							<div class = "row">
								<label class="col-sm-5">Class</label>
								<input class="col-sm-7" type="number" class="form-control" name="studentClass" readonly  id="" value = "<?php echo $student_values['student_class']; ?>">
							</div>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Section</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentSection" readonly id="" value = "<?php echo $student_values['student_section']; ?>" >
							</div>
                        </div>
                    </div>
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Gender</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentGender" readonly id="" value = "<?php echo $student_values['student_gender']; ?>" >
							</div>
                        </div>
                    </div>


                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Address</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentAddress" readonly id="" value = "<?php echo $student_values['student_address']; ?>">
							</div>
                        </div>
                    </div>
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">City</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentCity" readonly id="" value = "<?php echo $student_values['student_city']; ?>">
							</div>
                        </div>
                    </div>
						
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Pincode</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentZipCode" readonly id="" value = "<?php echo $student_values['student_pincode']; ?>">
							</div>
                        </div>
                    </div>
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">State</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentState" readonly id="" value = "<?php echo $student_values['student_state']; ?>">
							</div>
                        </div>
                    </div>

						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Bus Number</label>
								<input class="col-sm-7" type="text" class="form-control" name="studentBus" readonly id="" value = "<?php echo $student_values['student_bus']; ?>">
							</div>
                        </div>
                    </div>
					
					<div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Driver Name</label>
								<input class="col-sm-7" type="text" class="form-control" name="driverName" readonly id="" value = "<?php echo $driver_values['driver_name']; ?>" >
							</div>
                        </div>
                    </div>
						
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
							<div class = "row">
								<label class="col-sm-5">Driver Number</label>
								<input class="col-sm-7" type="tel" class="form-control" name="driverNumber" readonly id="" value = "<?php echo $driver_values['driver_phone_number']; ?>">
							</div>
                        </div>
                    </div>

					<div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <div class = "row">
								<label class="col-sm-5">Care Taker Name</label>
								<input class="col-sm-7" type="text" class="form-control" name="careTakerName" readonly id=""  value = "<?php echo $ct_values['ct_name']; ?>">
							</div>
                        </div>
                    </div>
						
						
                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
							<div class = "row">
								<label class="col-sm-5">Care Taker Number</label>
								<input class="col-sm-7" type="tel" class="form-control" name="careTakerNumber" id="" readonly value = "<?php echo $ct_values['ct_phone_number']; ?>">
							</div>
                        </div>
                    </div>
						

					</form>
				</div>
        </div>
        
    </body>
</html>