<?php
$name=$_GET["name"];
$password=$_GET["artwork"];



$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$id=array();
if ($conn->connect_errno) {
    die ($conn->connect_errno);

}


$query = "SELECT userID FROM users WHERE name="."'".$name."'";
$results = $conn->query($query);

if (!$results) {

    die($conn->error);
}

$results->data_seek(0);
$userID=$results->fetch_assoc()['userID'];

$query = "SELECT artworkID FROM artworks WHERE imageFileName="."'".$password."'";
$results = $conn->query($query);
if (!$results) {

    die($conn->error);
}





$results->data_seek(0);
$artworkID=$results->fetch_assoc()['artworkID'];


$query = "SELECT * FROM carts WHERE userID=$userID AND artworkID=$artworkID";
$results = $conn->query($query);

if (!$results) {


    die($conn->error);

}
if(mysqli_num_rows($results)==0){
    echo "true";
}
else{
    echo "false";
}




