<?php

	include "../connection.php";

	$username = "";

	session_start();

	if(isset($_SESSION['admin'])) {
		$username = $_SESSION['admin'];
	}else {
		header('location:../index.html');
	}

	$addUser = $_GET['user'];

	$bus_query = "SELECT * FROM busses";
	$execute_bus_query = mysqli_query($con, $bus_query);
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

        <link rel="stylesheet" href="./static/css/addUser.css">
        <link rel="stylesheet" href="../nav.css">

		<script src="./static/js/validate.js"></script>
    </head>

    <body style="background: linear-gradient(to right, #9796f0 -20%, #fbc7d4 100%);">

		<nav class="navbar navbar-expand-lg navbar-light nav-color">
			<div class="container-fluid">
				<a class="navbar-brand" href="./index.php" style="color:antiquewhite;font-size:30px">
					ADMIN
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-item nav-link" href="./index.php" style="color:antiquewhite;margin-left: 20px; margin-right: 20px;">Home</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; margin-left: 20px; margin-right: 20px;">
								Add User
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./addUser.php?user=student">Add Student</a>
								<a class="dropdown-item" href="./addUser.php?user=driver">Add Driver</a>
								<a class="dropdown-item" href="./addUser.php?user=caretaker">Add CareTaker</a>
							</div>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">
								List Users
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="./listDeletedBusUsers.php">No Bus Students</a>
								<a class="dropdown-item" href="./listUsers.php?user=driver">List Drivers</a>
								<a class="dropdown-item" href="./listUsers.php?user=caretaker">List CareTakers</a>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./addBus.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">AddBus</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./logout.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Logout</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="#" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;"><?php echo $username ?></a>
						</li>
					</ul> 
					
				</div>
				
			</div>
		</nav>


		<div class="container">


			<?php if($_GET['user'] == "student") { ?>

				<div class="row justify-content-center background">
					<form action="./addUserDB.php" method="POST" onsubmit="return validate1()">

						<div class="form-row align-items-center">
							<div class="col-xs-3 col-sm-3">

							</div>
							<div class="col-xs-7 col-sm-7">
								<h4>ADD STUDENT</h4>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentName" placeholder="Enter Name" id="" maxlength="40" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentRoll" placeholder="Enter Roll Number" id="" maxlength="10" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentUsername" placeholder="Set Username" id="" maxlength="10" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="password" class="form-control" name="studentPassword" placeholder="Set Password" id="" minlength="8" maxlength="16" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentFather" placeholder="Enter Father Name" id="" maxlength="40" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="tel" class="form-control" name="studentNumber" placeholder="Enter Phone Number" id="" pattern="[7-9][0-9]{9}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="email" class="form-control" name="studentEmail" placeholder="Enter Mail" id="" maxlength="40">
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentClass" placeholder="Enter Class" id="" maxlength="13" required>
							</div>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="studentSection" placeholder="Enter Section" id="" maxlength="1" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="radio" class="form-control" name="studentGender" id="male" value="Male" style="height: 20px;" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="male">Male</label>
							</div>

							<div class="col-sm-5">
								<input type="radio" class="form-control" name="studentGender" id="female" style="height: 20px;" value="Female" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="female">Female</label>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentAddress" placeholder="Enter Address" id="" maxlength="40" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="text" class="form-control" name="studentCity" placeholder="Enter City" id="" maxlength="40" required>
							</div>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="studentZipCode" placeholder="Enter PinCode" maxlength="6" id="" pattern="[1-9][0-9]{5}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="studentState" placeholder="Enter State" id="" list="StudentState" maxlength="40" required>
								<datalist id="StudentState">
									<option value="Andhra Pradesh">
									<option value="Arunachal Pradesh">
									<option value="Assam">
									<option value="Bihar">
									<option value="Chhattisgarh">
									<option value="Goa">
									<option value="Gujarat">
									<option value="Haryana">
									<option value="Himachal pradesh">
									<option value="Jharkhand">
									<option value="Karnataka">
									<option value="Kerala">
									<option value="Madhya Pradesh">
									<option value="Maharastra">
									<option value="Manipur">
									<option value="Meghalaya">
									<option value="Mizoram">
									<option value="Nagaland">
									<option value="Odisha">
									<option value="Punjab">
									<option value="Rajasthan">
									<option value="Sikkim">
									<option value="Tamilnadu">
									<option value="Telangana">
									<option value="Tripura">
									<option value="Utter Pradesh">
									<option value="Uttarkhand">
									<option value="West Bengal">
								</datalist>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name = "busId">
									<option selected>Select Bus</option>
									<?php 
										while($row = mysqli_fetch_array($execute_bus_query)) { 
									?>
											<option value = "<?php echo $row[1]?>">
												<?php echo $row[1] . ' ===> ' . $row[3]; ?>
											</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentYearFrom" placeholder="Academic Yr From" id="" min="2000" max="2099" step="1" value="2020" required>
							</div>

							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentYearTo" placeholder="Academic Yr To" id="" min="2000" max="2099" step="1" value="2021" pattern="[2][0-9]{3}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentFirstInstallment" placeholder="1st Term Fee" id="" min="1" required>
							</div>

							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentSecondInstallment" placeholder="2nd Term Fee" id="" min="1" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentFirstInstallmentPaid" placeholder="1st Term Paid" id="" min="0" required>
							</div>

							<div class="col-sm-5">
								<input type="number" class="form-control" name="studentSecondInstallmentPaid" placeholder="2nd Term Paid" id="" min="0" required>
							</div>
						</div>

						<input type = "hidden" value = "<?php echo $addUser; ?>" name = "user"/>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 30px; margin-top: 20px;">Submit</button>
							</div>
						</div>
						

					</form>
				</div>
			
			<?php } ?>






			<?php if($_GET['user'] == "driver") { ?>
				<div class="row justify-content-center background">
					<form action="./addUserDB.php" method="POST">

						<div class="form-row align-items-center">
							<div class="col-xs-3 col-sm-3">

							</div>
							<div class="col-xs-7 col-sm-7">
								<h4>ADD DRIVER</h4>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="driverName" placeholder="Enter Name" id="" maxlength="50" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="driverId" placeholder="Enter Id" id="" maxlength="10" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="tel" class="form-control" name="driverNumber" placeholder="Enter Phone Number" maxlength = "10" pattern="[6-9][0-9]{9}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="radio" class="form-control" name="driverGender" id="male" value="Male" style="height: 20px;" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="male">Male</label>
							</div>

							<div class="col-sm-5">
								<input type="radio" class="form-control" name="driverGender" id="female" style="height: 20px;" value="Female" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="female">Female</label>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="driverAddress" placeholder="Enter Address" id="" maxlength="50" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="text" class="form-control" name="driverCity" placeholder="Enter City" id="" maxlength="15" required>
							</div>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="driverZipCode" placeholder="Enter PinCode" maxlength="6" id="" pattern="[1-9][0-9]{5}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="driverState" placeholder="Enter State" id="" list="driverState" maxlength="40" required>
								<datalist id="driverState">
									<option value="Andhra Pradesh">
									<option value="Arunachal Pradesh">
									<option value="Assam">
									<option value="Bihar">
									<option value="Chhattisgarh">
									<option value="Goa">
									<option value="Gujarat">
									<option value="Haryana">
									<option value="Himachal pradesh">
									<option value="Jharkhand">
									<option value="Karnataka">
									<option value="Kerala">
									<option value="Madhya Pradesh">
									<option value="Maharastra">
									<option value="Manipur">
									<option value="Meghalaya">
									<option value="Mizoram">
									<option value="Nagaland">
									<option value="Odisha">
									<option value="Punjab">
									<option value="Rajasthan">
									<option value="Sikkim">
									<option value="Tamilnadu">
									<option value="Telangana">
									<option value="Tripura">
									<option value="Utter Pradesh">
									<option value="Uttarkhand">
									<option value="West Bengal">
								</datalist>
							</div>
						</div>

						<input type = "hidden" value = "<?php echo $addUser ?>" name = "user"/>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 30px; margin-top: 20px;">Submit</button>
							</div>
						</div>

					</form>
				</div>
			<?php } ?>
       

			
			
			<?php if($_GET['user'] == "caretaker") { ?>

				<div class="row justify-content-center background">
					<form action="./addUserDB.php" method="POST">

						<div class="form-row align-items-center">
							<div class="col-xs-3 col-sm-3">

							</div>
							<div class="col-xs-7 col-sm-7">
									<h4>ADD CARETAKER</h4>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="careTakerName" placeholder="Enter Name" id="" maxlength="40" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="careTakerId" placeholder="Enter Id" id="" maxlength="10" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="careTakerUsername" placeholder="Set Username" id="" maxlength="10" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="password" class="form-control" name="careTakerPassword" placeholder="Set Password" id="" minlength="8" maxlength="16" required>
							</div>
						</div>

						

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="tel" class="form-control" name="careTakerNumber" placeholder="Enter Phone Number" id="" pattern="[7-9][0-9]{9}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="radio" class="form-control" name="careTakerGender" id="male" value="Male" style="height: 20px;" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="male">Male</label>
							</div>

							<div class="col-sm-5">
								<input type="radio" class="form-control" name="careTakerGender" id="female" style="height: 20px;" value="Female" required>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="form-check-label" for="female">Female</label>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="careTakerAddress" placeholder="Enter Address" id="" maxlength="40" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-5">
								<input type="text" class="form-control" name="careTakerCity" placeholder="Enter City" id="" maxlength="40" required>
							</div>

							<div class="col-sm-5">
								<input type="text" class="form-control" name="careTakerZipCode" placeholder="Enter PinCode" maxlength="6" id="" pattern="[1-9][0-9]{5}" required>
							</div>
						</div>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<input type="text" class="form-control" name="careTakerState" placeholder="Enter State" id="" list="careTakerState" maxlength="40" required>
								<datalist id="careTakerState">
									<option value="Andhra Pradesh">
									<option value="Arunachal Pradesh">
									<option value="Assam">
									<option value="Bihar">
									<option value="Chhattisgarh">
									<option value="Goa">
									<option value="Gujarat">
									<option value="Haryana">
									<option value="Himachal pradesh">
									<option value="Jharkhand">
									<option value="Karnataka">
									<option value="Kerala">
									<option value="Madhya Pradesh">
									<option value="Maharastra">
									<option value="Manipur">
									<option value="Meghalaya">
									<option value="Mizoram">
									<option value="Nagaland">
									<option value="Odisha">
									<option value="Punjab">
									<option value="Rajasthan">
									<option value="Sikkim">
									<option value="Tamilnadu">
									<option value="Telangana">
									<option value="Tripura">
									<option value="Utter Pradesh">
									<option value="Uttarkhand">
									<option value="West Bengal">
								</datalist>
							</div>
						</div>

						<input type = "hidden" value = "<?php echo $addUser ?>" name = "user"/>

						<div class="form-row align-items-center">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 30px; margin-top: 20px;">Submit</button>
							</div>
						</div>

					</form>
				</div>
			<?php } ?>



			
        </div>
        
    </body>
</html>