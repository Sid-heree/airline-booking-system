
<?php

$conn =  new mysqli(
    "sql302.infinityfree.com",
    "if0_41946592",
    "eKj2YjvmVuMUs0",
    "if0_41946592_airline"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Sid Airlines</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;800&display=swap" rel="stylesheet"/>

  <style>

    body,
    html {

      height: 100%;
      margin: 0;
      font-family: 'Nunito', sans-serif;
      background-color: #f5f9fc;

    }

    #divmain {

      background: url('assets/image/oki.jpeg') no-repeat center center fixed;
      background-size: cover;
      position: relative;

    }

    #divmain::before {

      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(10, 25, 47, 0.7);
      z-index: 0;

    }

    .navbar {

      background: transparent;
      backdrop-filter: blur(10px);
      padding: 10px 30px;
      z-index: 10;
      position: absolute;
      width: 100%;

    }

    .signature-title {

      font-weight: 800;
      font-size: 2rem;
      color: #ffffff;

    }

    .live-badge {

      background-color: #00c896;
      color: white;
      border-radius: 50px;
      font-size: 0.8rem;
      padding: 4px 10px;
      font-weight: 600;

    }

    .booking-btn {

      background-color: #0077b6;
      border: none;
      padding: 6px 16px;
      border-radius: 20px;
      color: white;
      font-weight: 600;
      font-size: 0.9rem;

    }

    .booking-btn:hover {

      background-color: #023e8a;

    }

    .form-container {

      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      padding: 35px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.25);
      z-index: 1;
      width: 100%;
      max-width: 450px;

    }

    .form-control,
    .form-select {

      background-color: rgba(255, 255, 255, 0.95);
      border-radius: 10px;

    }

    .welcome-text {

      color: white;
      z-index: 1;
      max-width: 500px;

    }

    .welcome-text h1 {

      font-size: 3rem;
      font-weight: 800;

    }

    footer {

      background-color: #ffffffdd;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.05);
      position: relative;
      z-index: 1;

    }

    @media (max-width: 768px) {

      .flex-column-mobile {

        flex-direction: column !important;

      }

    }

  </style>

</head>

<body>

  <!-- Navbar -->

  <nav class="navbar">

    <div class="d-flex align-items-center gap-3">

      <h4 class="signature-title m-0">
        Sid Airlines
      </h4>

      <span class="live-badge">
        Live Flights
      </span>

      <button
        class="booking-btn"
        onclick="location.href='user.php'"
      >
        My Trips
      </button>

    </div>

  </nav>

  <!-- Main Section -->

  <div
    class="d-flex flex-column flex-md-row justify-content-around align-items-center vh-100 px-4"
    id="divmain"
  >

    <!-- Flight Search Form -->

    <form
      id="flightForm"
      method="POST"
      action="booking.php"
      class="form-container position-relative mb-5 mb-md-0 text-dark"
    >

      <!-- Departure -->

      <div class="mb-3">

        <label class="form-label text-white">
          Departure City
        </label>

        <select
          id="source"
          name="source"
          class="form-select"
          required
        >

          <option value="">Choose Departure</option>

          <option value="DEL">Delhi</option>

          <option value="MUM">Mumbai</option>

          <option value="HYD">Hyderabad</option>

          <option value="BLR">Bangalore</option>

          <option value="GOA">Goa</option>

          <option value="CHE">Chennai</option>

        </select>

      </div>

      <!-- Destination -->

      <div class="mb-3">

        <label class="form-label text-white">
          Arrival City
        </label>

        <select
          id="destination"
          name="destination"
          class="form-select"
          required
        >

          <option value="">Choose Destination</option>

          <option value="DEL">Delhi</option>

          <option value="MUM">Mumbai</option>

          <option value="HYD">Hyderabad</option>

          <option value="BLR">Bangalore</option>

          <option value="GOA">Goa</option>

          <option value="CHE">Chennai</option>

        </select>

      </div>

      <!-- Date -->

      <div class="mb-3">

        <label class="form-label text-white">
          Travel Date
        </label>

        <input
          type="date"
          id="date"
          name="date"
          class="form-control"
          required
        >

      </div>

      <!-- Airline -->

      <div class="mb-3">

        <label class="form-label text-white">
          Preferred Airline
        </label>

        <select
          id="airline"
          name="airline"
          class="form-select"
        >

          <option value="">Any Airline</option>

          <option value="Sid Express">
            Sid Express
          </option>

          <option value="Air India">
            Air India
          </option>

        </select>

      </div>

      <!-- Search Button -->

      <button
        type="submit"
        class="btn btn-primary w-100 mt-2"
      >

        Find Flights

      </button>

      <!-- View All Flights Button -->

      <div class="mt-3">

        <a
          href="all_flights.php"
          class="btn btn-success w-100"
        >

          View All Available Flights

        </a>

      </div>

    </form>

    <!-- Welcome Text -->

    <div class="welcome-text text-center text-md-start">

      <h1>
        Discover the Skies with Sid
      </h1>

      <p class="lead">
        Your next adventure begins here.
        Book seamlessly and fly in style with Sid Airlines.
      </p>

    </div>

  </div>

  <!-- Footer -->

  <footer class="text-center text-muted py-3">

    <div class="container">

      <small>
        &copy; 2025 Sid Airlines. All rights reserved.
      </small>

    </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

