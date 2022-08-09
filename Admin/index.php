<?php
	include "../connection.php";

	$username = "";

	session_start();

	if(isset($_SESSION['admin'])) {
		$username = $_SESSION['admin'];
	}else {
		header('location:../index.html');
	}

	$busses_query = "SELECT * from busses";
	$execute_busses_query = mysqli_query($con, $busses_query);
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
	<script src="./static/js/validate.js"></script>
</head>
<body style="background: linear-gradient(to right, #9796f0 -20%, #fbc7d4 100%);">
    <nav class="navbar navbar-expand-lg navbar-light nav-color">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:antiquewhite;font-size:30px">
                ADMIN
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavAltMarkup">
                 <ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-item nav-link" href="#" style="color:white; margin-left: 20px; margin-right: 20px;">Home</a>
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

        <h3 style="text-align: center; margin-bottom: 60px;">Busses Information</h3>


        <table class="table table-hover">
            <thead>
				<tr>
				<th scope="col">Bus ID</th>
				<th scope="col">Reg No</th>
				<th scope="col">Route</th>
				<th scope="col">Driver</th>
				<th scope="col">Care Taker</th>
				<th scope="col">Capacity</th>
				<th scope="col">Students Count</th>
				<th scope="col">Action 1</th>
				<th scope="col">Action 2</th>
				</tr>
            </thead>
            <tbody>
				<?php 
                    while($row = mysqli_fetch_array($execute_busses_query)) { 
                ?>
					<tr>

						<td>
							<a href="./listUsers.php?user=student&busid=<?php echo $row[1];?>" style="text-decoration: underline;">
								<?php
									echo $row[1];
								?>
							</a>
						</td>

						<td>
							<?php
								echo $row[2];
							?>
						</td>

						<td>
							<?php
								echo $row[3];
							?>
						</td>

						<td>
							<?php
								echo $row[7];
							?>
						</td>

						<td>
							<?php
								echo $row[9];
							?>
						</td>

						<td>
							<?php
								echo $row[4];
							?>
						</td>

						<td>
							<?php
								echo $row[5];
							?>
						</td>
						<td>
							<form action="./updateBus.php" method="post">
								<input type="hidden" name="id" value = "<?php echo $row[1]; ?>">
								<button type="submit" class="btn btn-warning btn-block">Update</button>
							</form>
						</td>
						<td>
							<form action="./deleteBus.php" method="post" onsubmit = "return deleteValidate()">
								<input type="hidden" name="id" value = "<?php echo $row[1]; ?>">
								<input type="hidden" name="driver" value = "<?php echo $row[6]; ?>">
								<input type="hidden" name="careTaker" value = "<?php echo $row[8]; ?>">
								<button type="submit" class="btn btn-danger btn-block">Delete</button>
							</form>
						</td>
					</tr>
				<?php } ?>
            </tbody>
          </table>
    </div>
</body>