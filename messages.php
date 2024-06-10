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

// Retrieve messages from database
$sql = "SELECT message FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["message"] . "<br>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>
