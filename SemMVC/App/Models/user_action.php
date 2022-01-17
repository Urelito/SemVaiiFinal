<?php
include 'text_validation.php';
if ($_POST['Action'] == "del_user") {
    $idUser = $_POST['idUser'];
    if(isValid($idUser)) {

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

        $sql = "DELETE FROM user WHERE id = '$idUser'";

        if ($conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo ('Problem s ID');
    }
}
if ($_POST['Action'] == "add_user_admin") {
        $userId = $_POST['idUser'];
        $isAlredyAdmin = $_POST['isAlredyAdmin'];
    if(isValid($userId)) {

        $servername = "localhost";
        $usernameDB = "root";
        $passwordDB = "dtb456";
        $dbname = "dbforum";

        // Create connection
        $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }/*
        $sql = "SELECT * FROM user WHERE id = '$userId'";*/
        if ($isAlredyAdmin == 1) {
            $sql = "UPDATE user SET admin = '1' WHERE id = '$userId' ";
        } else {
            $sql = "UPDATE user SET admin = '0' WHERE id = '$userId' ";
        }
        if ($conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo ('Problem s ID');
    }


}