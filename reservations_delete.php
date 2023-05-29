<?php
$host = 'localhost';
$dbname = 'database';
$username = 'root';
$password = '';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$id = $_REQUEST['id'];

$sql = 'DELETE FROM reservations '
    . 'WHERE id = ' . $id;

$stmt = $mysqli->prepare($sql);

$success = $stmt->execute();

if ($success) {
    $stmt->close();
    $mysqli->close();
    header("Location: reservations_view.php");
} else {
    $stmt->close();
    $mysqli->close();
    echo "There was an error";
}
?>
