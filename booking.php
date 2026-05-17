```php
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

// Check if form data exists
if (
    !isset($_POST['source']) ||
    !isset($_POST['destination']) ||
    !isset($_POST['date'])
) {
    die("Please search for flights first.");
}

$source = $_POST['source'];
$destination = $_POST['destination'];
$date = $_POST['date'];

// Secure query using prepared statements
$stmt = $conn->prepare("SELECT * FROM flights WHERE source = ? AND destination = ? AND date = ?");
$stmt->bind_param("sss", $source, $destination, $date);

$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Flight | Sid Airlines</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <style>

        body {
            background: url('assets/image/1.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
        }

    </style>
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center">

    <div class="container bg-white p-5 rounded shadow-lg" style="max-width: 650px;">

        <h2 class="mb-4 text-center">Select a Flight</h2>

        <?php if ($result && $result->num_rows > 0): ?>

            <form action="book_flight.php" method="POST" class="form-container">

                <div class="form-group mb-3">

                    <label for="flight" class="form-label">
                        Available Flights
                    </label>

                    <select class="form-control" name="flight_id" id="flight" required>

                        <?php while($row = $result->fetch_assoc()): ?>

                            <option value="<?= $row['id'] ?>">

                                <?= $row['airline'] ?>

                                -

                                <?= $row['source'] ?>

                                to

                                <?= $row['destination'] ?>

                                (<?= date('d M Y', strtotime($row['date'])) ?>)

                                -

                                ₹<?= $row['price'] ?>

                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <div class="d-grid">

                    <button type="submit" class="btn btn-primary btn-block">
                        Book Now
                    </button>

                </div>

            </form>

        <?php else: ?>

            <div class="alert alert-warning text-center">
                No flights found.
            </div>

        <?php endif; ?>

        <?php
            $stmt->close();
            $conn->close();
        ?>

    </div>

</body>
</html>
```
