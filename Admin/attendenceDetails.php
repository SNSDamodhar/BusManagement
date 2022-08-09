<?php
	include "../connection.php";

	$username = "";

	session_start();

	if(isset($_SESSION['admin'])) {
		$username = $_SESSION['admin'];
	}else {
		header('location:../index.html');
	}

    $student_id = $_POST['student_id'];
    $attendence_query = "SELECT * FROM student_attendence WHERE roll_number = '$student_id' ORDER BY id";
    $execute_attendence_query = mysqli_query($con, $attendence_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<a class="nav-item nav-link" href="./index.php"  style="color:antiquewhite; margin-left: 20px; margin-right: 20px;">Home</a>
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

    <div class="container" style="margin-top: 50px;">
        <h3 style="text-align: center; margin-bottom: 60px;">Attendence Details for <?php echo $student_id; ?></h3>
        <table class="table table-hover">
            <thead>
				<tr>
                    <th scope="col">Date</th>
                    <th scope="col">In Time</th>
                    <th scope="col">Out Time</th>
				</tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_array($execute_attendence_query)) { 
                ?>
                    <tr>
                        <th scope="row"><?php echo $row[2]; ?></th>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
    </div>
    
</body>
</html>