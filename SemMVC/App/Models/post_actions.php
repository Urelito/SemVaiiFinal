<?php
include 'text_validation.php';
session_start();
if (isset($_POST['Action'])) {
    if ($_POST['Action'] == "show_details") {
        $themeId = $_POST['id'];
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

            $sql = "SELECT * FROM comment WHERE post = '$themeId'";
            $result = mysqli_query($conn, $sql);

            $sqlUser = "SELECT username, id FROM user ";
            $resultUser = mysqli_query($conn, $sqlUser);

            if ($result->num_rows > 0) {
                while ($post = $result->fetch_assoc()) {
                    echo "
                    <div id=\"\" class=\"row \">
                        <div class=\"row row-cols-5 main align-items-center\">
                            <div class=\"col-3\">";
                    foreach ($resultUser as $username) {
                        if ($post['creator'] == $username['id']) {
                            echo "<label style='color: black'>" . $username['username'] . "</label>";
                        }
                    }

                    if ($post['creator'] == $_SESSION['id'] || $_SESSION['admin'] >= 1) {
                        echo "</div>
                                        <div class=\"col-6\">
                                        <textarea id=\"" . $post['id'] . "\" class=\"row fw-bolder\">" . $post['text'] . "</textarea> 
                                        </div>
                                        <div class=\"col-2\">" . $post['date'] . "</div>
                                        <div class=\"col-1 fw-bolder\">
                                            <a id=\"" . $post['id'] . "\" onclick=\"delComment(" . $post['id'] . ")\" href=\"#\"><i>Vymaž</i></a> <br>
                                        <a href=\"#\" onclick=\"saveEditComment(" . $post['id'] . ")\"><i>Ulož</i></a>
                                        </div>
                                        </div>";
                    } else {
                        echo "
                                    </div>
                                <div class=\"col-6\">
                                    <div class=\"row fw-bolder\">" . $post['text'] . "</div> 	
                                </div>
                            <div class=\"col-2\">" . $post['date'] . "</div>";
                    }
                    echo "
                               
                        </div>
                        </div>
                        <hr>";
                };
            } else {
                echo "<label style='color: black'>Zatiaľ nebol pridaný žiadny komentár<label>";
            }
        } else {
            echo ('Problem s ID');
        }
    }

    if ($_POST['Action'] == "add_comment") {
        $themeId = $_POST['themeId'];
        $commentText = $_POST['comment'];
        $idUser = $_SESSION['id'];

        if (isValidText($commentText)) {
            if (isValid($themeId) && isValid($idUser)) {

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

                $sql = "INSERT INTO comment (creator, post, text)
              VALUES ('$idUser', ' $themeId', '$commentText')";

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
            echo ('Nevhodny text');
        }

    }

    if ($_POST['Action'] == "dell_comment") {
        $commentId = $_POST['commentId'];
        if(isValid($commentId) ) {


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

            $sql = "DELETE FROM comment WHERE id = $commentId ";

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

    if ($_POST['Action'] == "edit_comment") {
        $commentId = $_POST['commentId'];
        $editedText = $_POST['editedText'];
        if (isValidText($editedText)) {
            if (isValid($commentId)) {

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

                $sql = "UPDATE comment SET text = '$editedText' WHERE id = '$commentId' ";

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

}