<?php
@session_start();
include 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>FlyLess</title>
</head>

<body>
    <header>
        <h1>Login</h1>
        <ul>
            <li><a href="home.php">Home</a></li>
        </ul>
    </header>
    <?php

    function display_incorrect_pass()
    {
    ?>
        <div class="div_align">
            <p style="font-size:25px">Incorrect username or password</p>
            <input onclick="location.href='../index.php'" class="actionbttns" type="submit" value="Home">
        </div>
    <?php
    }

    if (!isset($_POST['submit'])) { ?>
        <form id="login" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="div_align">
                <input class="textboxes" type="text" id="username" name="username" placeholder="Enter Username" maxlength="10"><br><br>
                <input class="textboxes" type="password" id="pass" name="pass" placeholder="Enter Password" maxlength="10"><br><br>
                <p style="margin-top: 0.5vw;">Don't have an account? <a href="register.php">Click here to make one!</a></p>
                <input class="actionbttns" style="margin-top: 2vw;" type="submit" name="submit" id="submit" value="Log in"><br><br>
        </form>
        <div id="login">
            <input onclick="location.href='home.php'" style="margin-top: 2vw;" type="submit" class="actionbttns" name="return" value="Home">
        </div>
        </div>
    <?php
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "database";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $password = $_POST['pass'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                display_incorrect_pass();
            } else {
                display_incorrect_pass();
            }
        }

        $conn->close();
    }
    ?>
</body>

</html>