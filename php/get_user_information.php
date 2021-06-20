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
$email=$results['email'];
$tel=$results['tel'];
$address=$results['address'];
$balance=$results['balance'];

$query = "SELECT * FROM carts WHERE userID=$userID";
$results = $conn->query($query);
if (!$results) {

    die($conn->error);
}
$items=mysqli_num_rows($results);

$array=array();
$array['userId']=$userID;
$array['email']=$email;
$array['tel']=$tel;
$array['address']=$address;
$array['balance']=$balance;
$array['items']=$items;

echo json_encode($array);






