<?php
if (!isset($_POST['flight_id'])) {
    die("No flight selected.");
}

$flight_id = $_POST['flight_id'];
$conn = new mysqli("localhost", "root", "", "airline");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM flights WHERE id = ?");
$stmt->bind_param("i", $flight_id);
$stmt->execute();
$result = $stmt->get_result();
$flight = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Flight Details | Sid Airlines</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;800&display=swap" rel="stylesheet"/>

  <style>
    body {
      background: url('assets/image/oki.jpeg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Nunito', sans-serif;
      margin: 0;
      color: #fff;
    }

    .container-box {
      background: rgba(0, 0, 0, 0.75);
      backdrop-filter: blur(14px);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
      max-width: 750px;
      margin: auto;
      margin-top: 60px;
      color: #fff;
    }

    .form-control, .form-select {
      background-color: rgba(255, 255, 255, 0.95);
      border: none;
      border-radius: 12px;
      color: #000;
    }

    .btn-outline-light {
      color: #000;
      background-color: #fff;
      border: 2px solid #ccc;
    }

    .btn-outline-light:hover {
      background-color: #adb5bd;
      color: #000;
    }

    .seat-section input[type="radio"]:checked + label {
      background-color: #00b4d8;
      color: white !important;
      border-color: #00b4d8;
    }

    .btn-success {
      background-color: #38b000;
      border: none;
    }

    .btn-success:hover {
      background-color: #2d6a4f;
    }

    .list-group-item {
      background-color: transparent;
      border: none;
      color: #fff;
    }

    h2, h4 {
      color: #fff;
    }

    @media (max-width: 576px) {
      .container-box {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container container-box">
    <?php if ($flight): ?>
      <h2 class="mb-4 text-center">Flight Details - Sid Airlines</h2>
      <ul class="list-group mb-4">
        <li class="list-group-item"><strong>Airline:</strong> <?= $flight['airline'] ?></li>
        <li class="list-group-item"><strong>From:</strong> <?= $flight['source'] ?></li>
        <li class="list-group-item"><strong>To:</strong> <?= $flight['destination'] ?></li>
        <li class="list-group-item"><strong>Date:</strong> <?= date('d M Y', strtotime($flight['date'])) ?></li>
        <li class="list-group-item"><strong>Price:</strong> $<?= number_format($flight['price'], 2) ?></li>
      </ul>

      <form id="bookingForm" action="confirm_booking.php" method="POST">
        <input type="hidden" name="id" value="<?= $flight['id'] ?>">
        <input type="hidden" name="airline" value="<?= $flight['airline'] ?>">
        <input type="hidden" name="source" value="<?= $flight['source'] ?>">
        <input type="hidden" name="destination" value="<?= $flight['destination'] ?>">
        <input type="hidden" name="date" value="<?= $flight['date'] ?>">
        <input type="hidden" name="price" value="<?= $flight['price'] ?>">

        <div class="form-group mb-3">
          <label for="name">Full Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group mb-3">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group mb-4">
          <label for="phone">Phone Number</label>
          <input type="tel" class="form-control" name="phone" id="phone" required>
        </div>

        <h4 class="mb-3 text-center">Select Your Seat</h4>
        <div class="seat-section d-flex flex-wrap justify-content-center mb-4">
          <?php for ($i = 1; $i <= 78; $i++): ?>
            <div class="form-check m-1">
              <input type="radio" name="seatno" class="btn-check" id="seat<?= $i ?>" value="<?= $i ?>" autocomplete="off" required>
              <label class="btn btn-outline-light btn-sm" for="seat<?= $i ?>"><?= $i ?></label>
            </div>
          <?php endfor; ?>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-success">Confirm Booking</button>
        </div>
      </form>
    <?php else: ?>
      <div class="alert alert-danger text-center">Flight not found.</div>
    <?php endif; ?>

    <?php $conn->close(); ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("bookingForm").addEventListener("submit", function(event) {
      const selectedSeat = document.querySelector("input[name='seatno']:checked");
      if (!selectedSeat) {
        alert("Please select a seat before submitting.");
        event.preventDefault();
      }
    });
  </script>
</body>
</html>
