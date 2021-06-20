<?php
$name=$_GET["name"];
$password=$_GET["password"];

$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$id=array();
if ($conn->connect_errno) {
    die ($conn->connect_errno);

}

$query = "SELECT * FROM users WHERE name="."'".$name."'";
$results = $conn->query($query);
if (!$results) {
    echo $query;
    die($conn->error);
}
if(mysqli_num_rows($results)==0){





    echo "no the user";

}
else{
    $results->data_seek(0);
    $tem=$results->fetch_assoc();
    $save_password=$tem['password'];
    if ($password===$save_password){
        echo "true";
    }
    else{
        echo "wrong password";
    }


}

