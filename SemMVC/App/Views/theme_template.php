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

$sql = "SELECT * FROM post ORDER BY id";
$result = mysqli_query($conn,$sql);

$sqlUser = "SELECT username, id FROM user";
$resultUser = mysqli_query($conn,$sqlUser);

//SElECT meno FROM user WHERE id = creator;
//$postUser=$resultUser->fetch_assoc();
if ($result->num_rows > 0) {

    while($post=$result->fetch_assoc()) {
        echo "<div class=\"card\" style=\"width: 18rem;\">
                <img src=\"" . $post['picPath'] . "\" class=\"card-img-top\" alt=\"...\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">" . $post['titleName'] . "</h5>";
                    if ($post['creator'] == $_SESSION['id'] || $_SESSION['admin'] >= 1) {
                        echo " <textarea id=\"".$post['id']."\" class=\"row information-textarea\">" . $post['text'] . "</textarea> ";
                    } else {
                        echo "<p class=\"card-text\">" . $post['text'] . "</p>";
                    } echo "
                </div>
                <div class=\"card-footer\">
                    <a href=\"#\" id=\"".$post['id']."\" onclick=\"openForum(".$post['id'].")\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#show-forum\">Čítaj viac</a> <br>
                    <span class=\"text-muted\">" . $post['date'] . "</span> <br>";
                    foreach ($resultUser as $username) {
                        //echo print_r($username);
                        if ($post['creator'] == $username['id']) {
                            echo " <span class=\"text-muted\">" . $username['username'] . "</span> <br>";
                        }
                    }
                    if ($post['creator'] == $_SESSION['id'] || $_SESSION['admin'] >= 1) {
                        echo " <a id=\"".$post['id']."\" onclick=\"saveEditTheme(".$post['id'].")\" href=\"#\"><i>Ulož</i></a>
                            <a id=\"".$post['id']."\" onclick=\"delTheme(".$post['id'].")\" href=\"#\"><i>Vymaž</i></a> ";
                    }
                    echo "</div>
                </div>";
                /*
                        echo "

                        <div class=\"col-lg-6 menu-item filter-starters\">
                            <img src=\"images/lieky.jpg\" class=\"card-img-top\" alt=\"...\">
                            <div class=\"pl\">
                            <div class=\"menu-content\">
                            <a>".$post['titleName']."</a>
                            </div>
                            <div class=\"menu-ingredients\">
                            ".$post['text']."<br>".$post['creator']."
                            </div>
                            </div>
                          </div>
                        ";

                        echo "
                        <div class=\"card\">
                          <img src=\"images/lieky.jpg\" class=\"card-img-top\" alt=\"...\">
                          <div class=\"card-body\">
                            <h5 class=\"card-title\">".$post['titleName']."</h5>
                            <p class=\"card-text\">".$post['text']."</p>
                            <p class=\"card-text\">".$post['creator']."</p>
                          </div>
                          <a href=\"#\" class=\"card-text more-info\">Vstúpiť do diskusie</a>
                        <div class=\"card-footer\">
                            <small class=\"text-muted\">Posl. príspevok: 8.3.2021</small>
                          </div>
                        </div>
                    ";*/

    }
}
