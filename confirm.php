<?php
// Database connection
require_once('config.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted to confirm booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize POST data
    $seatno      = $conn->real_escape_string($_POST['seatno']);
    $price       = (float)$_POST['price'];
    $source      = $conn->real_escape_string($_POST['source']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $name        = $conn->real_escape_string($_POST['name']);
    $email       = $conn->real_escape_string($_POST['email']);
    $date        = $conn->real_escape_string($_POST['date']);
    $phone       = $conn->real_escape_string($_POST['phone']);
    $flight_id   = (int)$_POST['id']; // ID of flight (not the booking ID!)
    $airline     = $conn->real_escape_string($_POST['airline']);

    // Check if seat is already booked
    $check_sql = "SELECT * FROM booked WHERE seatno = '$seatno' AND id = '$flight_id' AND date = '$date'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-warning'>⚠️ Seat already booked for this flight and date!</div>";
    } else {
        if (isset($_POST['termsCheck']) && $_POST['termsCheck'] == 'on') {
            // INSERT booking WITHOUT specifying primary key id
            $stmt = $conn->prepare("INSERT INTO booked (seatno, price, source, destination, name, email, date, phone, id, airline) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) {
                $stmt->bind_param("sdssssssss", $seatno, $price, $source, $destination, $name, $email, $date, $phone, $flight_id, $airline);

                if ($stmt->execute()) {
                    $booking_success = true;
                    $booking_id = $conn->insert_id; // Get the auto-generated booking ID
                } else {
                    $booking_success = false;
                    error_log("Booking failed: " . $stmt->error); // Log the error
                }
                $stmt->close();
            } else {
                $booking_success = false;
                error_log("Prepare failed: " . $conn->error); // Log the error
            }
        } else {
            $booking_success = false;
            echo "<div class='alert alert-danger'>You must accept the terms and conditions to complete your booking.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/image/bg1.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Booking Status</h4>
        </div>
        <div class="card-body">
            <?php if (isset($booking_success)): ?>
                <?php if ($booking_success): ?>
                    <div class="alert alert-success">
                        <h4>✅ Thank you for booking with us!</h4>
                        <p>Your booking has been successfully confirmed with reference #<?php echo $booking_id; ?>.</p>
                        <p>We've sent a confirmation email to <?php echo htmlspecialchars($email); ?>.</p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <h4>❌ Booking failed!</h4>
                        <p>There was an issue with your booking. Please try again later or contact customer support.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary btn-lg">Go to Homepage</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
