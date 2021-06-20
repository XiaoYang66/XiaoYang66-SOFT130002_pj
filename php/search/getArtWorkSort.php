<?php
$type = $_GET["type"];
$keyword = $_GET["keyword"];
$number=$_GET["number"];
$sort=$_GET["sort"];


$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$id=array();
if ($conn->connect_errno) {
    die ($conn->connect_errno);

}
$query = "SELECT * FROM artworks WHERE $type LIKE "."'%".$keyword."%' ORDER BY $sort";

$results = $conn->query($query);
if (!$results) {
    die($conn->error);
}

$length=mysqli_num_rows($results);


$re=array();
$index=0;
for($i=$number*4;$i<$number*4+4;$i++){
    $results->data_seek($i);
    $tem=$results->fetch_assoc();
    $re[$index]=array($tem['title'],$tem['description'],$tem['artist'],$tem['imageFileName'],$tem['price'],$tem['view']);
    $index++;
}

echo json_encode($re);

