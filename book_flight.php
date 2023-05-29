<?php
@session_start();
if (isset($_POST['book'])) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "ky_db";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $fname = $_SESSION['fname'];
        $sname = $_SESSION['sname'];
        $lname = $_SESSION['lname'];
        $id = $_SESSION['user_id'];
        $nat = $_SESSION['nationality'];
        $number = $_SESSION['phone_number'];
        $egn = $_SESSION['personal_id'];
        $book = filter_input(INPUT_POST, 'book');
        $sql = "INSERT INTO reservations (id, first_name, second_name, last_name, personal_id, phone_number, nationality, user_id, trip_id)
        VALUES (NULL, '$fname', '$sname', '$lname', '$egn', '$number', '$nat', '$id', '$book')";
       if ($conn->query($sql) === true) {
            echo 'Record inserted successfully.';
            header("Location: flights_view.php");
        } else {
            echo 'Error executing query: ' . $conn->error;
        }
    } catch (Exception $e) {
        print "We had an error: " . $e->getMessage() . "<br/>";
        die();
    }
}
