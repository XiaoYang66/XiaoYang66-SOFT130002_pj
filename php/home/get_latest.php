<?php
function get_artworks()
{
    $db_hostname = 'localhost';
    $db_database = 'web_course_2021_spring';
    $db_username = 'root';
    $db_password = '';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    $id=array();
    if ($conn->connect_errno) {
        die ($conn->connect_errno);

    }
    $query = "SELECT * FROM artworks ORDER BY timeReleased DESC";
    $results = $conn->query($query);
    if (!$results) {
        die($conn->error);
    }
    $results->data_seek(0);
    $id[0]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);
    $results->data_seek(1);
    $id[1]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);
    $results->data_seek(2);
    $id[2]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);
    $results->data_seek(3);
    $id[3]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);
    $results->data_seek(4);
    $id[4]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);
    $results->data_seek(5);
    $id[5]=array($results->fetch_assoc()['imageFileName'],$results->fetch_assoc()['title'],$results->fetch_assoc()['description']);

    echo json_encode($id);

}
get_artworks();
