<?php
$delPostName = $_POST['postName'];

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "dtb456";
$dbname = "dbforum";

// Create connection
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM post WHERE titleName = '$delPostName'";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
