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
    $bus_id = $caretaker_values['ct_bus'];
    
    $students_query = "SELECT * FROM students WHERE student_bus = '$bus_id'";
    $execute_students_query = mysqli_query($con, $students_query);
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

        <link rel="stylesheet" href="../nav.css">
        <link rel="stylesheet" href="./static/css/style.css">

        <script src="./static/js/validate.js"></script>
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
							<a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Home</a>
						</li>

						<li class="nav-item">
							<a class="nav-item nav-link" href="./studentDetails.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Students Details</a>
						</li>

                        <!-- <li class="nav-item">
							<a class="nav-item nav-link" href="#" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Location</a>
						</li> -->

                        <li class="nav-item">
							<a class="nav-item nav-link" href="./profile.php" style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Profile</a>
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
            <div class="row justify-content-center" style = "margin-top: 70px">
                <form action="./attendenceDB.php" method="POST" class = "form" onsubmit="return validate()">

                    <div class="form-row align-items-center">
                        <div class="col-xs-12 col-sm-12">
                            <h4>Attendence</h4>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name = "student">
                                <option selected>Student Roll Number</option>
                                <?php 
                                    while($row = mysqli_fetch_array($execute_students_query)) { 
                                ?>
                                        <option value = "<?php echo $row[1]; ?>"><?php echo $row[1] . " -> " . $row[2]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" name = "attendence">
                                <option selected>Attendence</option>
                                <option value = "IN">IN</option>
                                <option value = "OUT">OUT</option>
                                <option value = "Absent">Absent</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <input type="time" class="form-control" name="time" id = "time" required>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 30px; margin-top: 20px;">Submit</button>
                        </div>
                    </div>
                    

                </form>
			</div>
        </div>



        
    </body>
</html>