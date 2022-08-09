<?php
	$username = "";

    include "../connection.php";

	session_start();

	if(isset($_SESSION['student'])) {
		$username = $_SESSION['student'];
	}else {
		header('location:../index.html');
	}

    $student_query = "SELECT * FROM students WHERE student_username = '$username'";
    $execute_student_query = mysqli_query($con, $student_query);
    $student_values = mysqli_fetch_assoc($execute_student_query);
    $roll_number = $student_values['roll_number'];

    $fees_details = "SELECT * FROM student_fees WHERE roll_number = '$roll_number'";
    $execute_fees_details = mysqli_query($con, $fees_details);
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
            <a class="navbar-brand" href="./index.php" style="color:antiquewhite;font-size:30px">
                STUDENT
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
                        <a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Fee Details</a>
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


    <div class="container" style="margin-top: 50px;">

        <h3 style="text-align: center; margin-bottom: 60px;">Fee Information</h3>


        <table class="table table-hover">
            <thead>
				<tr>
				
				<th scope="col">YEAR</th>
				<th scope="col">First Term</th>
				<th scope="col">First Term paid</th>
				<th scope="col">Second Term</th>
                <th scope="col">Second Term paid</th>
				</tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_array($execute_fees_details)) { 
                ?>
                    <tr>
                        <td scope = "row"><?php echo $row[2] . " - " . $row[3]; ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo $row[7] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
    </div>
</body>