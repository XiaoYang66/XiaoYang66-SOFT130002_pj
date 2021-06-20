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
    $tem=$results->fetch_assoc();
    $id[0]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(1);
    $tem=$results->fetch_assoc();
    $id[1]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(2);
    $tem=$results->fetch_assoc();
    $id[2]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(3);
    $tem=$results->fetch_assoc();
    $id[3]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(4);
    $tem=$results->fetch_assoc();
    $id[4]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(5);
    $tem=$results->fetch_assoc();
    $id[5]=array($tem['imageFileName'],$tem['title'],$tem['description']);

    $query = "SELECT * FROM artworks ORDER BY view DESC";
    $results = $conn->query($query);
    if (!$results) {
        die($conn->error);
    }
    $results->data_seek(0);
    $tem=$results->fetch_assoc();
    $id[6]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(1);
    $tem=$results->fetch_assoc();
    $id[7]=array($tem['imageFileName'],$tem['title'],$tem['description']);
    $results->data_seek(2);
    $tem=$results->fetch_assoc();
    $id[8]=array($tem['imageFileName'],$tem['title'],$tem['description']);




    echo json_encode($id);

}
get_artworks();
