<?php
	$username = "";

    include "../connection.php";

	session_start();

	if(isset($_SESSION['admin'])) {
		$username = $_SESSION['admin'];
	}else {
		header('location:../index.html');
	}

    $bus_id = $_POST['id'];
    $bus_query = "SELECT * FROM busses WHERE bus_id = '$bus_id'";
    $execute_bus_query = mysqli_query($con, $bus_query);
    $bus_values = mysqli_fetch_assoc($execute_bus_query);

    $driver_query = "SELECT * from drivers";
    $execute_driver_query = mysqli_query($con, $driver_query);

    $careTaker_query = "SELECT * from caretakers";
    $execute_careTaker_query = mysqli_query($con, $careTaker_query);
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
				<a class="navbar-brand" href="./index.html" style="color:antiquewhite;font-size:30px">
					ADMIN
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-item nav-link" href="./index.php"  style="color:antiquewhite;margin-left: 20px; margin-right: 20px;">Home</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">
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
							<a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">AddBus</a>
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
        <div class="row justify-content-center background">
            <form action="./updateBusDB.php" method="POST" class = "form1" onsubmit="return validate()">

                <div class="form-row align-items-center">
                    <div class="col-xs-3 col-sm-3">

                    </div>
                    <div class="col-xs-7 col-sm-7">
                        <h4>Update Bus</h4>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="busNumber" placeholder="Enter Bus Number" id="" maxlength="3" value = "<?php echo $bus_values['bus_id']; ?>" readonly>
                    </div>
                </div>

                
                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="registrationNo" placeholder="Enter Registration No" maxlength="15" value = "<?php echo $bus_values['bus_reg_number']; ?>" readonly>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <textarea type="textarea" class="form-control" name="busRoute" placeholder="Enter bus Route" id="" rows="3" required><?php echo $bus_values['bus_route']; ?></textarea>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name = "driverId">
                            <option>Select Driver</option>
                            <?php 
                                while($row = mysqli_fetch_array($execute_driver_query)) { 
                            ?>
                                    <option value = "<?php echo $row[1] . '-' . $row[2]; ?>" <?php if($row[1] == $bus_values['bus_driver_id']) { echo "selected"; } ?>>
                                        <?php echo $row[1] . '->' . $row[2]; ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name = "careTakerId" required>
                            <option>Select CareTaker</option>
                            <?php 
                                while($row = mysqli_fetch_array($execute_careTaker_query)) { 
                            ?>
                                    <option value = "<?php echo $row[1] . '-' . $row[2]; ?>" <?php if($row[1] == $bus_values['bus_caretaker_id']) { echo "selected"; } ?>>
                                        <?php echo $row[1] . '->' . $row[2]; ?>
                                    </option>
                            <?php } ?>
                        </select>
                        
                    </div>
                </div>


                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="Capacity" placeholder="Total Capacity" id="" maxlength="10" value = "<?php echo $bus_values['total_capacity']; ?>" required>
                    </div>
                </div>

                <input type = "hidden" value = "<?php echo $bus_values['bus_id'] ?>" name = "id" />
                <input type = "hidden" value = "<?php echo $bus_values['bus_driver_id'];?>" name = "driID" />
                <input type = "hidden" value = "<?php echo $bus_values['bus_caretaker_id'];?>" name = "ctID" />
                
                <div class="form-row align-items-center">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 30px; margin-top: 20px;">Update</button>
                    </div>
                </div>

            </form>
        </div>
      <div>

    </body>
</html>