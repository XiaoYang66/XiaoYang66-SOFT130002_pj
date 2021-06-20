<?php
$type = $_GET["type"];
$keyword = $_GET["keyword"];



$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$id=array();
if ($conn->connect_errno) {
    die ($conn->connect_errno);

}
$query = "SELECT * FROM artworks WHERE $type LIKE "."'%".$keyword."%'";

$results = $conn->query($query);
if (!$results) {
    die($conn->error);
}
$length=mysqli_num_rows($results);


echo $length."";

