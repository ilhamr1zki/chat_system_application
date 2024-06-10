<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert message into database
$message = $_POST['message'];
$sql = "INSERT INTO messages (message) VALUES ('$message')";
if ($conn->query($sql) === TRUE) {
    // echo "Message saved successfully!";
    echo json_encode([
        "stat_code" => 200,
        "message" => "Pesan Berhasil Dikirim",
    ]);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
