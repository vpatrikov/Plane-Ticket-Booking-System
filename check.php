<?php
@session_start();
$logged_in;
@$var = $_SESSION['logged_in'];
if ($var) {
    $logged_in = true;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ky_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name_query = "SELECT id, first_name, second_name, last_name, password, nationality, personal_id, phone_number, role FROM users WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($name_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['fname'] = $row["first_name"];
        $_SESSION['lname'] = $row["last_name"];
        $_SESSION['sname'] = $row["second_name"];
        $_SESSION['user_id'] = $row["id"];
        $_SESSION['nationality'] = $row["nationality"];
        $_SESSION['role'] = $row['role'];
        $_SESSION['personal_id'] = $row['personal_id'];
        $_SESSION['phone_number'] = $row['phone_number'];
    } else {
        echo "There is an error.";
    }

    $conn->close();
} else {
    $logged_in = false;
}
?>
