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
