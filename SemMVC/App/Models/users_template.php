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
/*
$sql = "SELECT * FROM post ORDER BY id";
$resultPost = mysqli_query($conn,$sql);

$sql = "SELECT * FROM comment ORDER BY id";
$resultComments = mysqli_query($conn,$sql);
*/

$sqlUser = "SELECT * FROM user";
$resultUser = mysqli_query($conn,$sqlUser);

//SElECT meno FROM user WHERE id = creator;
//$postUser=$resultUser->fetch_assoc();
if ($resultUser->num_rows > 0) {
    while($user=$resultUser->fetch_assoc()) {
        if ($user['admin'] != 2) {
            echo "<div class=\"row\">
                    <ol>
                        <li class=\"list-group-item d-flex justify-content-between align-items-start\" style=\"text-align: center\">
                            <div class=\"fw-bold col-8 text-size\">" . $user['username'] . "</div>
                            <div class=\"fw-bold col-2\"><a onclick=\"delUser(" . $user['id'] . ")\" class=\"btn-align btn btn-secondary\" href=\"#\">Vymazať</a></div>";
                            if ($user['admin'] == 1) {
                               echo "<div class=\"fw-bold col-2\"><input onclick=\"isAdmin(" . $user['id'] . ")\" class=\"form-check-input\" type=\"checkbox\" id=\"" . $user['id'] . "\" checked></div>";
                            } else {
                                echo "<div class=\"fw-bold col-2\"><input onclick=\"isAdmin(" . $user['id'] . ")\" class=\"form-check-input\" type=\"checkbox\" id=\"" . $user['id'] . "\"></div>";
                            }
                            echo "
                        </li>
                    </ol>
                  </div>";
        } else {
            continue;
        }
           /*
            <div class=\"card\" style=\"width: 18rem;\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">" . $user['username'] . "</h5>
            </div>
        </div>*/
    }

           /*

                    <li class="list-group-item d-flex justify-content-between align-items-start" style="text-align: center">
                        <div class="fw-bold col-6">Meno</div>
                        <div class="fw-bold col-2"><span class="badge bg-primary rounded-pill">14</span></div>
                        <div class="fw-bold col-2"><span class="badge bg-primary rounded-pill">1</span></div>
                        <div class="fw-bold col-2"
    <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        <div>
                    </li>
                </div>
*/
}