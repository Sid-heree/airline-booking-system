<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sid Airlines</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;800&display=swap" rel="stylesheet"/>

  <style>
    body, html {
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
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(10, 25, 47, 0.7);
      z-index: 0;
    }

    /* Updated Navbar */
    .navbar {
      background: transparent;
      backdrop-filter: blur(10px);
      padding: 10px 30px;
      z-index: 10;
      position: absolute;
      width: 100%;
    }

    .navbar .nav-left {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .signature-title {
      font-family: 'Nunito', sans-serif;
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
      position: relative;
      font-weight: 600;
    }

    .live-badge::after {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      background: rgba(0, 184, 148, 0.4);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      animation: pulse 1.5s infinite;
      z-index: -1;
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

    @keyframes pulse {
      0% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 1;
      }
      100% {
        transform: translate(-50%, -50%) scale(1.6);
        opacity: 0;
      }
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

    .form-control, .form-select {
      background-color: rgba(255, 255, 255, 0.95);
      border: 1px solid #ccc;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
      border-color: #0077b6;
      box-shadow: 0 0 6px rgba(0, 119, 182, 0.5);
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

    .welcome-text p {
      font-size: 1.2rem;
      font-weight: 600;
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
      .nav-left {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="d-flex nav-left">
      <h4 class="signature-title m-0">Sid Airlines</h4>
      <span class="live-badge">Live Status</span>
      <button class="booking-btn" onclick="location.href='user.php'">My Trips</button>
    </div>
  </nav>

  <!-- Main Section -->
  <div class="d-flex flex-column flex-md-row flex-column-mobile justify-content-around align-items-center vh-100 px-4" id="divmain">
    
    <form id="flightForm" method="POST" action="booking.php" class="form-container position-relative mb-5 mb-md-0 text-dark">
      <div class="mb-3">
        <label for="source" class="form-label text-white">Departure City</label>
        <select id="source" name="source" class="form-select">
          <option value="">Choose Departure</option>
          <option value="DEL">Delhi</option>
          <option value="MUM">Mumbai</option>
          <option value="HYD">Hyderabad</option>
        </select>
        <div class="invalid-feedback">Please select a departure city.</div>
      </div>

      <div class="mb-3">
        <label for="destination" class="form-label text-white">Arrival City</label>
        <select id="destination" name="destination" class="form-select">
          <option value="">Choose Destination</option>
          <option value="DEL">Delhi</option>
          <option value="MUM">Mumbai</option>
          <option value="HYD">Hyderabad</option>
        </select>
        <div class="invalid-feedback">Please select a destination.</div>
      </div>

      <div class="mb-3">
        <label for="date" class="form-label text-white">Travel Date</label>
        <input type="date" id="date" name="date" class="form-control">
        <div class="invalid-feedback">Please select a travel date.</div>
      </div>

      <div class="mb-3">
        <label for="airline" class="form-label text-white">Preferred Airline</label>
        <input type="text" id="airline" name="airline" class="form-control" placeholder="e.g. Sid Express">
        <div class="invalid-feedback">Please enter an airline.</div>
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-2">Find Flights</button>
    </form>

    <div class="welcome-text text-center text-md-start">
      <h1>Discover the Skies with Sid</h1>
      <p class="lead">Your next adventure begins here. Book seamlessly and fly in style with Sid Airlines.</p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-muted py-3">
    <div class="container">
      <small>&copy; 2025 Sid Airlines. All rights reserved.</small>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/index.js"></script>

</body>
</html>
