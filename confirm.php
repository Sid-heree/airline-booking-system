```php id="n4s8lm"
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

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$source = $_POST['source'];
$destination = $_POST['destination'];

$airline = $_POST['airline'];

$seatno = $_POST['seatno'];

$price = $_POST['price'];

$date = $_POST['date'];

$sql = "INSERT INTO booked
(
    name,
    email,
    source,
    destination,
    airline,
    seatno,
    price,
    date,
    phone
)
VALUES
(
    ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssisss",
    $name,
    $email,
    $source,
    $destination,
    $airline,
    $seatno,
    $price,
    $date,
    $phone
);

if ($stmt->execute()) {

    ?>

    <!DOCTYPE html>
    <html>
    <head>

        <title>Booking Success</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        >

    </head>

    <body
        class="d-flex justify-content-center align-items-center vh-100"
        style="background:#0f172a;"
    >

        <div class="card p-5 text-center shadow-lg">

            <h1 class="text-success">
                Booking Successful!
            </h1>

            <p class="mt-3">
                Your flight has been booked successfully.
            </p>

            <a
                href="index.php"
                class="btn btn-primary mt-3"
            >
                Go Home
            </a>

        </div>

    </body>
    </html>

    <?php

} else {

    echo "Database Error: " . $stmt->error;

}

$stmt->close();

$conn->close();

?>
```
