<?php
include 'text_validation.php';
if ($_POST['Action'] == "dell_theme") {
    $themeId = $_POST['themeId'];
    if(isValid($themeId)) {
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

        $sql = "DELETE FROM post WHERE id = $themeId ";

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
    if ($_POST['Action'] == "edit_theme") {
        $themeId = $_POST['themeId'];
        $editedText = $_POST['editedText'];
        if (isValidText($editedText)) {
            if (isValid($themeId)) {

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

                $sql = "UPDATE post SET text = '$editedText' WHERE id = '$themeId' ";

                if ($conn->query($sql) === TRUE) {
                    echo "1";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            } else {
                echo('Problem s ID');
            }
        } else {
            echo('Nevhodny text');
        }
    }
