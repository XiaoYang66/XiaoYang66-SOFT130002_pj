<?php
$p= $_GET['file_id'];
$db_hostname = 'localhost';
$db_database = 'web_course_2021_spring';
$db_username = 'root';
$db_password = '';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_errno) {
    die ($conn->connect_errno);

}


$query = "SELECT * FROM artworks WHERE imageFileName="."'".$p."'";

$results = $conn->query($query);
$results->data_seek(0);
$title=$results->fetch_assoc()['title'];
$results->data_seek(0);
$description=$results->fetch_assoc()['description'];
$results->data_seek(0);
$artist=$results->fetch_assoc()['artist'];
$results->data_seek(0);
$price=$results->fetch_assoc()['price'];
$results->data_seek(0);
$view=$results->fetch_assoc()['view']+1;
$results->data_seek(0);
$artworkId=$results->fetch_assoc()['imageFileName'];

$query = "UPDATE artworks SET view=$view WHERE imageFileName="."'".$p."'";
$retval = mysqli_query( $conn, $query );
if(! $retval )
{
    die('无法更新数据: ' . mysqli_error($conn));
}

mysqli_close($conn);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>product details</title>
    <link rel="icon" type="image/x-icon" href="resources/img/logo.jpeg">
    <link rel="stylesheet" type="text/css" href="resources/css/header&nav.css">
    <link rel="stylesheet" type="text/css" href="resources/css/button.css">

    <!-- Font Awesome -->
    <link
            href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.css"
            rel="stylesheet"
    />




</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="../.././homepage.html">Brand</a>

        <!-- Toggle button -->
        <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active"  href="../.././homepage.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../.././login.html">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../.././register.html">register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../.././collections.html">collections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../.././search.html">search</a>
                </li>


            </ul>
            <!-- Left links -->

            <!-- Search form -->
            <form class="d-flex input-group w-auto">
                <input
                        type="search"
                        class="form-control"
                        placeholder="Type query"
                        aria-label="Search"
                />
                <button
                        class="btn btn-outline-primary"
                        type="button"
                        data-mdb-ripple-color="dark"
                >
                    Search
                </button>
            </form>
            <span class="fas fa-user-circle"><span id="user" class="badge bg-primary"></span></span>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<script>
    let user=localStorage.getItem("user");

    if (user===null){
        document.getElementById("user").innerText="";
    }
    else {
        document.getElementById("user").innerText=user;
    }



</script>
<div class="card mb-3" style="max-width: 540px; margin: auto">
    <div class="row g-0 align-items-center">
        <div class="col-md-4 " >
            <img
                    src="../.././resources/img/'.$p.'"
                    alt="..."
                    class="img-fluid"
            />
        </div>
        <div class="col-md-8 ">
            <div class="card-body">
                <h5 class="card-title">'.$title.'</h5>
                <p class="card-text">'.$artist.

                '</p>
                <p class="card-text">'.$description.

                '</p>
                <p class="card-text">
                    <small class="text-muted">viewed: '.$view.' times </small>
                    <small class="text-muted">$'.$price.'</small>
                </p>
                
                <button type="button" class="btn btn-primary" onclick="collect()" style="visibility: hidden" id="collect"> collect</button>
                
            </div>
        </div>
    </div>
</div>
<footer class="bg-primary text-white text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>

                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                    molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                    voluptatem veniam, est atque cumque eum delectus sint!
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 4</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="text-white">Link 1</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 2</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 3</a>
                    </li>
                    <li>
                        <a href="#!" class="text-white">Link 4</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
></script>
<script>
    localStorage.setItem("artwork",'.'"'.$p.'"'.');
    let artwork='.'"'.$p.'"'.';
    
    if (user===null){
        
    }
    else {
        var xmlhttp;
        xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                
                document.getElementById("collect").style.visibility="visible";
                let te=xmlhttp.responseText;
                console.log(te);
                if (te==="true"){
                    
                }
                else {
                    document.getElementById("collect").innerText="collected";
                    document.getElementById("collect").onclick="";
                    
                }
            }
        }
        xmlhttp.open("GET", "./chect_art_work.php?name=" + user + "&artwork=" + artwork, false);
        console.log("./chect_art_work.php?name=" + user + "&artwork=" + artwork);
        xmlhttp.send();
            
    }
</script>
<script>
function collect(){
    user=localStorage.getItem("user");
    let artwork=localStorage.getItem("artwork");
    var xmlhttp;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let te=xmlhttp.responseText;
            if(te==="true"){
                document.getElementById("collect").innerText="collected";
                document.getElementById("collect").onclick="";
            }
            
        }
    }
    xmlhttp.open("GET", "./collect.php?name=" + user + "&artwork=" + artwork, true);
    xmlhttp.send();
}


</script>

</body>
</html>';



