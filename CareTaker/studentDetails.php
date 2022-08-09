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


<html>
<head>

     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                        <a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Students Details</a>
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

    <div class="container" style="margin-top: 50px;">

        <h3 style="text-align: center; margin-bottom: 60px;">Students Information</h3>


        <table class="table table-hover">
            <thead>
				<tr>
				<th scope="col">Student Roll</th>
				<th scope="col">Name</th>
				<th scope="col">Father</th>
                <th scope="col">Phone Number</th>
				<th scope="col">Address</th>
				<th scope="col">City</th>
                <th scope="col">Attendence</th>
				</tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_array($execute_students_query)) { 
                ?>
                    <tr>
                        <th scope="row"><?php echo $row[1]; ?></th>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><?php echo $row[6]; ?></td>
                        <td><?php echo $row[11]; ?></td>
                        <td><?php echo $row[12]; ?></td>
                        <td>
							<form action="./studentAttendenceDetails.php" method="post">
								<input type="hidden" name="student_id" value = "<?php echo $row[1]; ?>">
								<button type="submit" class="btn btn-warning btn-block">Details</button>
							</form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
    </div>
</body>