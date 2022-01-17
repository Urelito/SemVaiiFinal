<?php
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

$sql = "SELECT * FROM news ORDER BY id";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    while($post=$result->fetch_assoc()) {

        echo "
        <div class=\"card\" style=\"width: 18rem;\">
            <img src=\"" . $post['picPath'] . "\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
            <h5 class=\"card-title\">" . $post['headline'] . "</h5>";
            if ($_SESSION['admin'] >= 1) {
                echo "<textarea id=\"".$post['id']."\" class=\"information-textarea\">" . $post['summary'] . "</textarea>
                <a onclick=\"saveEditSummaryNews(".$post['id'].")\" href=\"#\"><i>Ulož</i></a>
                  <a onclick=\"delNews(".$post['id'].")\" href=\"#\"><i>Vymaž</i></a> ";
            } else {
                echo "<p class=\"card-text\">" . $post['summary'] . "</p>";
            } echo "
                
            </div>
            <div class=\"card-footer\">
                <a href=\"#\" class=\"btn btn-primary\" onclick=\"openNews(".$post['id'].")\" data-bs-toggle=\"modal\" data-bs-target=\"#show-news\">Čítaj viac</a> <br>
                <span class=\"text-muted\">" . $post['date'] . "</span> <br>
                 
            </div>
        </div>";
    }
}