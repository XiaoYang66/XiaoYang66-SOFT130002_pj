<?php
function get_artworks()
{
    $db_hostname = 'localhost';
    $db_database = 'web_course_2021_spring';
    $db_username = 'root';
    $db_password = '';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_errno) {
        die ($conn->connect_errno);

    }
    $query = "SELECT * FROM artworks";
    $results = $conn->query($query);
    if (!$results) {
        die($conn->error);
    }
    $results->data_seek(0);
    echo $results->fetch_assoc()['imageFileName'];

}
get_artworks();




