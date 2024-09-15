<?php
session_start();

if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
} else {
	header("Location: signin.php");
}
//establish a MySQL connection
$connection = mysqli_connect("localhost", "root", "", "moviehub");
//verifying the connection
if (!$connection) {
	die("Connection failed : " . mysqli_connect_error());
}

if (isset($_POST['movieID'])){
	$movieID = $_POST['movieID'];
	$query = "SELECT seatID FROM booking WHERE movieID = $movieID";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0) {
		$seatIDsArray = array();

		while ($seatRow = mysqli_fetch_assoc($result)) {
			// Split the seat_numbers into an array assuming they are comma-separated
			$seatNumbers = explode(',', $seatRow['seatID']);
			$seatIDsArray = array_merge($seatIDsArray, $seatNumbers);
		}
		// Convert $seatNumbersArray to a JSON string
		$seatNumbersJSON = json_encode($seatIDsArray);

		// Output the JSON string as JavaScript variable
		echo "<script>var seatNumbers = $seatNumbersJSON;</script>";
	} else {
		// Handle the case where there are no seat numbers for the showtime
		echo "<script>var seatNumbers = [];</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/booking.css">
</head>

<body>
	<nav>
		<ul>
			<nav class="top-right-nav">
				<li><a href="index.php" id="home-link">Home</a></li>
				<li><a href="booking.php" id="tickets-link">Tickets</a></li>
				<li><a href="contact.html" id="contact-link">Contact</a></li>
		</ul>
	</nav>

	<div class="background">
		<div class="container">
			<br>
			<div class="selectedmovienameanddate">
				<?php
				if (isset($_POST['movieID'])) {
					
					$query = "SELECT movieName, showTime FROM movies WHERE movieID = $movieID";
					$result = mysqli_query($connection, $query);

					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$movieName = $row['movieName'];
						$showTime = $row['showTime'];
						echo '<h3 class="movieName">Movie:&nbsp</h3>';
						echo '<select name="" id=""><option value = "$movieName">' . $movieName . '</option></select>';
						echo '&nbsp &nbsp &nbsp';
						echo '<h3 class="dates">Date:&nbsp</h3>';
						echo '<select>';
						$today = date("Y-m-d");
						for ($i = 0; $i < 7; $i++) {
							$date = date("Y-m-d", strtotime($today . " + $i days"));
							echo "<option value='$date'>$date</option>";
						}
						echo '</select>';
						echo '<h3 class="time_label">Show Time: </h3>';
						echo '<h3 class="showTime">' . $showTime . '</h3>';
					}
				} else {
					$query = "SELECT movieID, movieName, showTime FROM movies";
					$result = mysqli_query($connection, $query);

					if (mysqli_num_rows($result) > 0) {
						echo '<h3 class="movieName">Movie : &nbsp</h3>';
						echo '<form action = "booking.php" method = "post">
						<select name="movieID" id="movieID">
						<option value = "">Select a movie & press submit</option>';
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<option value = '{$row['movieID']}'>" . $row['movieName'] . "</option>";
						}
						echo '</select>';
						echo '&nbsp &nbsp';
						echo '<input type = "submit" name = "submit">';
					}
				}

				?>

			</div>

		</div>

		<div class="movie-container">


			<div class="container">

				<div class="pickyourspot">
					<h3>Select Your Seats</h3>
				</div>

				<div class="screen"></div>

				<div class="row">
					<div class="seat" id="A1">A1</div>
					<div class="seat" id="A2">A2</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="A3">A3</div>
					<div class="seat" id="A4">A4</div>
					<div class="seat" id="A5">A5</div>
					<div class="seat" id="A6">A6</div>
					<div class="seat" id="A7">A7</div>
					<div class="seat" id="A8">A8</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="A9">A9</div>
					<div class="seat" id="A10">A10</div>
				</div>

				<div class="row">
					<div class="seat" id="B1">B1</div>
					<div class="seat" id="B2">B2</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="B3">B3</div>
					<div class="seat" id="B4">B4</div>
					<div class="seat" id="B5">B5</div>
					<div class="seat" id="B6">B6</div>
					<div class="seat" id="B7">B7</div>
					<div class="seat" id="B8">B8</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="B9">B9</div>
					<div class="seat" id="B10">B10</div>
				</div>

				<div class="row">
					<div class="seat" id="C1">C1</div>
					<div class="seat" id="C2">C2</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="C3">C3</div>
					<div class="seat" id="C4">C4</div>
					<div class="seat" id="C5">C5</div>
					<div class="seat" id="C6">C6</div>
					<div class="seat" id="C7">C7</div>
					<div class="seat" id="C8">C8</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="C9">C9</div>
					<div class="seat" id="C10">C10</div>
				</div>

				<div class="row">
					<div class="seat" id="D1">D1</div>
					<div class="seat" id="D2">D2</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="D3">D3</div>
					<div class="seat" id="D4">D4</div>
					<div class="seat" id="D5">D5</div>
					<div class="seat" id="D6">D6</div>
					<div class="seat" id="D7">D7</div>
					<div class="seat" id="D8">D8</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="D9">D9</div>
					<div class="seat" id="D10">D10</div>
				</div>

				<div class="row">
					<div class="seat" id="E1">E1</div>
					<div class="seat" id="E2">E2</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="E3">E3</div>
					<div class="seat" id="E4">E4</div>
					<div class="seat" id="E5">E5</div>
					<div class="seat" id="E6">E6</div>
					<div class="seat" id="E7">E7</div>
					<div class="seat" id="E8">E8</div>
					&nbsp &nbsp &nbsp
					<div class="seat" id="E9">E9</div>
					<div class="seat" id="E10">E10</div>
				</div>
				
			</div>

			

			<form id="reservation_form" method="post" action="bookingProcess.php">

				<div class="total_calculation">
					<h4 class=tickets_label>Seats :&nbsp </h4> &nbsp &nbsp
					<h4 id="no_of_tickets"></h4> &nbsp &nbsp
					<input type="hidden" name="ticketCount" id="ticketCount" required>
					<h4 class="total_label">Total :&nbsp </h4> &nbsp &nbsp
					<h4 id="total"></h4>
					<input type="hidden" name="totalPrice" id="totalPrice" required>
					<input type="hidden" name="userid" id="userid" value="<?php echo $userid ?>" required>
					<input type="hidden" name="seatIDs" id="seatIDs">
					<?php
					if (isset($_POST['movieID'])) {
						echo '<input type="hidden" name="movieID" id="movieID" value="' . $movieID . '" required>';
					}
					?>
				</div>
				<div class=confirm>
				<button type="submit" class="submit-button" id="confirmbutton" onclick="updateReservedSeats()">Confirm Booking</button>
				</div>
				
			</form>
		</div>


	</div>
	<!-- <script>
		// Step 3: Use JavaScript to mark reserved seats as "reserved" with a CSS class
		var reservedSeats = <?php echo $reservedSeatsjson; ?>;
		reservedSeats.forEach(seatID => {
			const seatElement = document.getElementById(seatID);
			if (seatElement) {
				seatElement.style.backgroundColor = 'red';
				seatElement.classList.add('reserved');
				// Add a CSS class to mark it as reserved
			}
		});
	</script> -->

	<footer>
		<div class="footer-content">

			<div class="footer-links">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="booking.php">Booking</a></li>
					<li><a href="Privacy.html">Privacy Policy</a></li>
				</ul>
			</div>

			<div class="footer-social">
				<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
				<a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
				<a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
				<a href="https://www.whatsapp.com"><i class="fa">&#xf232;</i></i></a>
				<a href="https://www.youtube.com"><i class="fa">&#xf16a;</i></a>
			</div>

			<div class="footer-info">
				&copy; 2023 CinemaPlex."
			</div>

		</div>

	</footer>

	<script src="js/booking.js"></script>

</body>

</html>