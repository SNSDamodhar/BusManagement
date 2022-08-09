<?php
	include "../connection.php";

	$username = "";

	session_start();

	if(isset($_SESSION['admin'])) {
		$username = $_SESSION['admin'];
	}else {
		header('location:../index.html');
	}

	if($_GET['user'] == "student") {
		$bus_id = $_GET['busid'];
		$students_query = "SELECT * FROM students WHERE student_bus = '$bus_id'";
		$execute_students_query = mysqli_query($con, $students_query);
	} elseif($_GET['user'] == "driver") {
		$list_drivers_query = "SELECT * from drivers";
		$execute_list_drivers_query = mysqli_query($con, $list_drivers_query);
	} elseif($_GET['user'] == "caretaker") {
		$list_caretakers_query = "SELECT * from caretakers";
		$execute_list_caretakers_query = mysqli_query($con, $list_caretakers_query);
	}
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
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; margin-left: 20px; margin-right: 20px;">
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

		<?php if($_GET['user'] == "student") { ?>

			<h3 style="text-align: center; margin-bottom: 60px;">List Of Students in <?php echo $_GET['busid']; ?></h3>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Roll Number</th>
						<th scope="col">Name</th>
						<th scope="col">Gender</th>
						<th scope="col">Mobile Number</th>
						<th scope="col">Bus Number</th>
						<th scope="col">Class</th>
						<th scope="col">Section</th>
						<th scope="col">Address</th>
						<th scope="col">City</th>
						<th scope="col">Action 1</th>
						<th scope="col">Action 2</th>
						<th scope="col">Action 3</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($row = mysqli_fetch_array($execute_students_query)) { 
					?>
						<tr>
							<th scope="row">
								<?php echo $row[1] ?>
							</th>

							<td>
								<?php echo $row[2] ?>
							</td>

							<td>
								<?php echo $row[10] ?>
							</td>

							<td><?php echo $row[6] ?></td>

							<td><?php echo $row[15] ?></td>

							<td><?php echo $row[8] ?></td>

							<td><?php echo $row[9] ?></td>

							<td><?php echo $row[11] ?></td>

							<td><?php echo $row[12] ?></td>

							<td>
								<form action="./updateUsers.php" method="post">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="userUpdate" value = "student">
									<input type="hidden" name="bus_id" value = "<?php echo $row[15] ?>">
									<button type="submit" class="btn btn-warning btn-block">Update</button>
								</form>
							</td>
							<td>
								<form action="./deleteUsers.php" method="post" onsubmit = "return deleteValidate()">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="user" value = "student">
									<input type = "hidden" name = "busid" value = "<?php echo $row[15] ?>" />
									<button type="submit" class="btn btn-danger btn-block">Delete</button>
								</form>
							</td>
							<td>
								<form action="./attendenceDetails.php" method="post">
									<input type="hidden" name="student_id" value = "<?php echo $row[1] ?>">
									<!-- <input type="hidden" name="user" value = "student">
									<input type = "hidden" name = "busid" value = "<?php echo $row[15] ?>" /> -->
									<button type="submit" class="btn btn-success btn-block">Attendence</button>
								</form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			
		<?php } ?>


		<?php if($_GET['user'] == "driver") { ?>

			<h3 style="text-align: center; margin-bottom: 60px;">List Of Drivers</h3>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">Gender</th>
						<th scope="col">Mobile Number</th>
						<th scope="col">Bus Number</th>
						<th scope="col">Address</th>
						<th scope="col">City</th>
						<th scope="col">Action 1</th>
						<th scope="col">Action 1</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($row = mysqli_fetch_array($execute_list_drivers_query)) { 
					?>
						<tr>
							<th scope="row">
								<?php echo $row[1] ?>
							</th>
							<td>
								<?php echo $row[2] ?>
							</td>
							<td>
								<?php echo $row[4] ?>
							</td>
							<td>
								<?php echo $row[3] ?>
							</td>
							<td>
								<?php echo $row[9] ?>
							</td>
							<td>
								<?php echo $row[5] ?>
							</td>
							<td>
								<?php echo $row[6] ?>
							</td>
							<td>
								<form action="./updateUsers.php" method="post">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="userUpdate" value = "driver">
									<button type="submit" class="btn btn-warning btn-block">Update</button>
								</form>
							</td>
							<td>
								<form action="./deleteUsers.php" method="post" onsubmit = "return deleteValidate()">
									<input type="hidden" name="user" value = "driver">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="busid" value = "<?php echo $row[9] ?>">
									<button type="submit" class="btn btn-danger btn-block">Delete</button>
								</form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		<?php } ?>

		<?php if($_GET['user'] == "caretaker") { ?>

			<h3 style="text-align: center; margin-bottom: 60px;">List Of Care Takers</h3>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">Gender</th>
						<th scope="col">Mobile Number</th>
						<th scope="col">Bus Number</th>
						<th scope="col">Address</th>
						<th scope="col">City</th>
						<th scope="col">Action 1</th>
						<th scope="col">Action 1</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($row = mysqli_fetch_array($execute_list_caretakers_query)) { 
					?>
						<tr>
							<th scope="row">
								<?php echo $row[1] ?>
							</th>
							<td>
								<?php echo $row[2] ?>
							</td>
							<td>
								<?php echo $row[6] ?>
							</td>
							<td>
								<?php echo $row[5] ?>
							</td>
							<td>
								<?php echo $row[11] ?>
							</td>
							<td>
								<?php echo $row[7] ?>
							</td>
							<td>
								<?php echo $row[8] ?>
							</td>
							<td>
								<form action="./updateUsers.php" method="POST">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="userUpdate" value = "caretaker">
									<button type="submit" class="btn btn-warning btn-block">Update</button>
								</form>
							</td>
							<td>
								<form action="./deleteUsers.php" method="post" onsubmit = "return deleteValidate()">
									<input type="hidden" name="user" value = "caretaker">
									<input type="hidden" name="id" value = "<?php echo $row[1] ?>">
									<input type="hidden" name="busid" value = "<?php echo $row[11] ?>">
									<button type="submit" class="btn btn-danger btn-block">Delete</button>
								</form>
								
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		<?php } ?>

        

    </div>

  </body>
</html>