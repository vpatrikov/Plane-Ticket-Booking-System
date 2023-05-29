<?php
@session_start();

function display()
{
    $host = 'localhost';
    $dbname = 'database';
    $username = 'root';
    $password = '';

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $sql = null;
    $id = $_SESSION['user_id'];

    if ($_SESSION['role'] == "Admin") {
        $sql = "SELECT * FROM reservations";
    } else {
        $sql = "SELECT * FROM reservations WHERE user_id=?";
    }

    $stmt = $mysqli->prepare($sql);

    if ($_SESSION['role'] != "Admin") {
        $stmt->bind_param('i', $id);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $reservations = $result->fetch_all(MYSQLI_ASSOC);

    if (empty($reservations)) {
        echo "<h6>Нямате направени резервации!</h6>";
    } else {
        echo "<br><table border = 1>";

        echo "
<tr>
    <td><b>ID<b></td>
    <td><b>First Name<b></td>
    <td><b>Last Name<b></td>
    <td><b>User ID<b></td>
    <td><b>Trip ID<b></td>
    <td><b>Delete<b></td>
</tr>";

        foreach ($reservations as $row => $data) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "." . "</td>";
            echo "<td>" . $data['first_name'] . "</td>";
            echo "<td>" . $data['last_name'] . "</td>";
            echo "<td>" . $data['user_id'] . "</td>";
            echo "<td>" . $data['trip_id'] . "</td>";
            echo "<td align='center'><a class='a_links' href=\"reservations_delete.php?id=" . $data['id'] . "\">Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyLess</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>FlyLess</h1>
        <div class="menu">
            <ul>
                <li><a id="home" href="home.php">Home</a></li>
                <li><a class="active" id="res_flights">Flights</a></li>
                <li><a id="logout" href="logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <div style="margin-top: 8vw;" class="div_align table">
        <?php
        display();
        ?>
        <form style="margin-top: 2vh;" method="post">
            <input class="actionbttns" type="button" onclick="location.href='flights_view.php'" value="Return">
        </form>
    </div>
</body>

</html>
