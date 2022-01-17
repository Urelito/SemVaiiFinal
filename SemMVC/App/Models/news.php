<?php
include 'text_validation.php';
session_start();
if ($_POST['Action'] == "add_news") {
    $newsName = $_POST['newsName'];
    $newsSummary = $_POST['newsSummary'];
    $newsText = $_POST['newsText'];

    if ((isValidText($newsName)) && (isValidText($newsSummary)) && (isValidText($newsText))) {
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
        $sql = "INSERT INTO news (headline, text, summary)
            VALUES ('$newsName', '$newsText', '$newsSummary')";

        if ($conn->query($sql) === TRUE) {

            echo "1";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo 'Nevhodny text';
    }
}

if ($_POST['Action'] == "dell_news") {
   $idNews = $_POST['idNews'];
    if(isValid($idNews)) {
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
        $sql = "DELETE FROM news WHERE id = '$idNews'";

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

if ($_POST['Action'] == "edit_news") {
    $idNews = $_POST['idNews'];
    $editedSummaryText = $_POST['editedSummaryText'];

    if (isValidText($editedSummaryText)) {
        if (isValid($idNews)) {

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

            $sql = "UPDATE news SET summary = '$editedSummaryText' WHERE id = '$idNews' ";

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
        echo 'Nevhodny text';
    }
}

if ($_POST['Action'] == "show_details") {
    $newsId = $_POST['id'];
    if(isValid($newsId)) {

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

        $sql = "SELECT * FROM news WHERE id = '$newsId'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            while ($news = $result->fetch_assoc()) {

                if ($_SESSION['admin'] >= 1) {
                    echo "<textarea id=\"textareaNewText\" class='news-textarea'>" . $news['text'] . "</textarea>";

                } else {
                    echo " <p class=\"card-text\">" . $news['text'] . "</p>";
                }
            }
        } else {
            echo "<label style='color: black'>Zatiaľ nebol pridaný žiadny text<label>";
        }
    } else {
        echo ('Problem s ID');
    }
}

if ($_POST['Action'] == "edit_news_modal") {
    $idNews = $_POST['idNews'];
    $newEditedText = $_POST['editedText'];

    if (isValidText($newEditedText)) {
        if (isValid($idNews)) {

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

            $sql = "UPDATE news SET text = '$newEditedText' WHERE id = '$idNews' ";

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
        echo 'Nevhodny text';
    }
}

