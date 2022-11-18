<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "map";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM markers ORDER BY log_id DESC LIMIT 10";
$result = mysqli_query($conn, $query);
// var_dump($result);
$positions = [];
while ($row = mysqli_fetch_array($result)) {
    // array_push(array($row['longitude'], $row['latitude']));
    array_push($positions, array($row['longitude'], $row['latitude']));
    // array_push($positions, $long_lat);
}
echo json_encode($positions);
?>