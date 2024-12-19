<?php
$conn = new mysqli("localhost", "root", "", "p3l");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, service, details FROM contact";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
