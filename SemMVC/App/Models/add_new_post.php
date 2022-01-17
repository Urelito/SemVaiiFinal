<?php
include 'text_validation.php';
session_start();
$postName = $_POST['postName'];
$postText = $_POST['postText'];
if ((isValidText($postName)) && (isValidText($postText))) {
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

    /*    $check_username = mysqli_query($conn, "SELECT username FROM user where username = '$username' ");
        if (mysqli_num_rows($check_username) > 0) {
            echo('0');
        } else {*/
    $loggedUserId = intval($_SESSION['id']);
    $sql = "INSERT INTO post (titleName, text, creator)
            VALUES ('$postName', '$postText', '$loggedUserId')";

    if ($conn->query($sql) === TRUE) {

        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo 'Nevhodny text';
}

