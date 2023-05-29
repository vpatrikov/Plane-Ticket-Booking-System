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
    <title>FlyLess</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    ?>
    <header>
        <h1>FlyLess</h1>
        <div class="menu">
            <?php if (@$_SESSION['logged_in']) {
            ?>
                <ul>
                    <li><a class="active" id="home" href="home.php">Home</a></li>
                    <li><a id="res_flights" href="flights_view.php">Flights</a></li>
                    <li><a id="logout" href="logout.php">Logout</a></li>
                <?php
            } else {
                ?>
                    <ul>
                        <li><a id="register" href="register.php">Register</a></li>
                        <li><a id="login" href="login.php">Login</a></li>
                    </ul>
                <?php
            } ?>
                </ul>
        </div>
    </header>
    <?php
    if (@$_SESSION['logged_in']) {
    ?>
        <h2 class="div_align" style="margin-top: 10vw; color: aliceblue;">Welcome, <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>!</h2>
    <?php } ?>
</body>

</html>