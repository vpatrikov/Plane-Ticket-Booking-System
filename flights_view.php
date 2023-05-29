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
    <?php @session_start();

    function display()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "database";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM trips";
        $result = $conn->query($query);

        echo "<br><table border='1'>";
        echo "
<tr>
    <td><b>ID<b></td>
    <td><b>From<b></td>
    <td><b>To<b></td>
    <td><b>Time Of Departure<b></td>
    <td><b>Time Of Arrival<b></td>
    <td><b>Plane Type<b></td>
    <td><b>Ticket Type<b></td>
    <td><b>Ticket Price<b></td>
    <td><b>Empty Seats<b></td>
</tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "." . "</td>";
                echo "<td>" . $row['from'] . "</td>";
                echo "<td>" . $row['to'] . "</td>";
                echo "<td>" . $row['take_off_time'] . "</td>";
                echo "<td>" . $row['time_of_arrival'] . "</td>";
                echo "<td>" . $row['plane_type'] . "</td>";
                echo "<td>" . $row['ticket_type'] . "</td>";
                echo "<td>" . $row['ticket_price'] . "</td>";
                echo "<td>" . $row['empty_seats'] . "</td>";
                echo "</tr>";
            }
        }

        echo "</table>";

        $conn->close();
    }
    ?>
    <header>
        <h1>FlyLess</h1>
        <div class="menu">
            <ul>
                <li><a id="home" href="home.php">Home</a></li>
                <li><a class="active" id="res_flights" href="reserve_flights.php">Flights</a></li>
                <li><a id="logout" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <?php if (!isset($_POST['add'])) { ?>
        <div style="margin-top: 8vw;" class="div_align table">
            <?php
            display();
            ?>
            <form style="margin-top: 2vh;" method="post">
                <input class="actionbttns" type="submit" name="add" id="add" value="Create a reservation">
                <input class="actionbttns" type="button" onclick="location.href='reservations_view.php'" name="view" id="view" value="See reservations">
            </form>
            <?php
        } else {
            ?>
                <form method="post" action="book_flight.php">
                    <div class="div_align">
                        <h6 style="margin-bottom: 2vh;">Create a reservation!</h6>
                        <?php display(); ?>
                        <input class="textboxes" type="number" name="book" id="book" placeholder="Enter the ID of the flight">
                        <input class="actionbttns" style="margin-top: 2vh;" type="submit" value="Reserve this flight">
                    </div>
                </form>
        <?php
        }
        ?>
        </div>
</body>

</html>
