<?php
$name=$_GET["name"];




$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_errno) {
    die ($conn->connect_errno);

}


$query = "SELECT * FROM users WHERE name="."'".$name."'";

$results = $conn->query($query);

if (!$results) {

    die($conn->error);
}

$results->data_seek(0);
$results=$results->fetch_assoc();

$userID=$results['userID'];

$query = "SELECT artworkID FROM carts WHERE userID=$userID";
$results = $conn->query($query);
if (!$results) {

    die($conn->error);
}

$array=array();
for($counter=0;$counter<mysqli_num_rows($results);$counter++){
    $results->data_seek($counter);
    $artId=$results->fetch_assoc()['artworkID'];

    $query = "SELECT * FROM artworks WHERE artworkID=$artId";
    $results_ = $conn->query($query);
    if (!$results) {

        die($conn->error);
    }
    $results_->data_seek(0);
    $tem=$results_->fetch_assoc();
    $array[$counter]=array($tem['title'],$tem['timeReleased'],$tem['imageFileName']);

}

echo json_encode($array);

