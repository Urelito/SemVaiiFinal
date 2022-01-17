<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


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

$password = md5($password);

$sql = "SELECT id, admin FROM user where username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    /*    echo "id: ". $row["id"];*/
        $_SESSION["id"] = $row['id'];
        $_SESSION["admin"] = $row['admin'];
        echo $_SESSION["id"];
        echo $_SESSION["admin"];
    }
} else {
    echo "0";
}

$conn->close();

/*
$check_username = mysqli_query($conn, "SELECT username FROM user where id = '3' ");
    echo($check_username);

$password = md5($password);

$checkUser = "SELECT username FROM user WHERE id = '3'";
echo $checkUser;

$conn->close();*/