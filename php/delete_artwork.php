<?php
$name = $_GET["name"];
$artworkID = $_GET["artworkID"];



$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_errno) {
    die ($conn->connect_errno);

}


$query = "SELECT * FROM users WHERE name=" . "'" . $name . "'";

$results = $conn->query($query);

if (!$results) {

    die($conn->error);
}

$results->data_seek(0);
$results = $results->fetch_assoc();

$userID = $results['userID'];


$query = "SELECT artworkID FROM artworks WHERE imageFileName=" . "'" . $artworkID . "'";

$results = $conn->query($query);
if (!$results) {

    die($conn->error);
}
$results->data_seek(0);
$artworkID = $results->fetch_assoc()['artworkID'];




$query = "DELETE FROM carts WHERE userID=$userID AND artworkID=$artworkID";
$results = $conn->query($query);
if (!$results) {

    die($conn->error);
}


