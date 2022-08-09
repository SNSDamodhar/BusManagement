<?php
	$username = "";

    include "../connection.php";

	session_start();

	if(isset($_SESSION['caretaker'])) {
		$username = $_SESSION['caretaker'];
	}else {
		header('location:../index.html');
	}

    $caretaker_query = "SELECT * FROM caretakers WHERE ct_username = '$username'";
    $execute_caretaker_query = mysqli_query($con, $caretaker_query);
    $caretaker_values = mysqli_fetch_assoc($execute_caretaker_query);
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
                <a class="navbar-brand" href="./index.html" style="color:antiquewhite;font-size:30px">
                    CARETAKER
                </a>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="./index.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="./studentDetails.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Students Details</a>
                        </li>
    
                        <!-- <li class="nav-item">
                            <a class="nav-item nav-link" href="#" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Location</a>
                        </li> -->
    
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link" href="./logout.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Logout</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-item nav-link" href="#" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;"><?php echo "Hello " . $username . " !"; ?></a>
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
    


		<div class="container">
				<div class="row justify-content-center background">
					<form action="" method="POST" class = "form1">

						<div class="form-row align-items-center">
							<div class="col-xs-3 col-sm-2">

							</div>
							<div class="col-xs-7 col-sm-7">
								<h4>DETAILS</h4>
							</div>
						</div>

						<div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerName" readonly id="" value = "<?php echo $caretaker_values['ct_name']; ?>">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">ID</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerId" readonly id="" value = "<?php echo $caretaker_values['ct_id']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">UserName</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerId" readonly  id="" value = "<?php echo $caretaker_values['ct_username']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerId" readonly id="" value = "<?php echo $caretaker_values['ct_password']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">PhoneNumber</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerNumber" readonly id="" value = "<?php echo $caretaker_values['ct_phone_number']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">Gender</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerGender" readonly id="" value = "<?php echo $caretaker_values['ct_gender']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">Address</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerAddress" readonly id="" value = "<?php echo $caretaker_values['ct_address']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">City</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerCity"  readonly id="" value = "<?php echo $caretaker_values['ct_city']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">PinCode</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerZipCode" readonly id="" value = "<?php echo $caretaker_values['ct_pincode']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">State</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerState" readonly id="" value = "<?php echo $caretaker_values['ct_state']; ?> ">
                            </div>
						</div>

                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <label class="col-form-label">BusNumber</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="col-sm-7 form-control" type="text" name="careTakerBus"  readonly id="" value = "<?php echo $caretaker_values['ct_bus']; ?> ">
                            </div>
						</div>

						
					</form>
				</div>
        </div>
        
    </body>
</html>