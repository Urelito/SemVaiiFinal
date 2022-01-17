<?php
include 'text_validation.php';
$username = $_POST['username'];
$password = $_POST['password'];

if (isValidText($username)) {

    if ((strlen($username) > 2) && (strlen($password) > 6)) {
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

        $check_username = mysqli_query($conn, "SELECT username FROM user where username = '$username' ");
        if (mysqli_num_rows($check_username) > 0) {
            echo('0');
        } else {
            $password = md5($password);
            $sql = "INSERT INTO user (username, password)
              VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "1";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    } else {
        return;
    }
} else {
    echo 'Nevhodny text';
}



/*$control = "SELECT username FROM user";
$result = mysqli_query($conn,$control);
$usernames = array();
while($line_open=$result->fetch_assoc()) {

    array_push($usernames,$line_open);
}
echo print_r($usernames);

for ($i = 0 ; $i< count($usernames); $i++) {
    $usr = implode($usernames[$i]);
    if (preg_match($username, $usr) !== 0) {
        echo '$var1 is not equal to $var2 in a case sensitive string comparison';
    }

}*/

