<?php include 'check.php';?>
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
                    <li><a href="../home.php">Home</a></li>
                </ul>
    </header>
    <?php
    @session_start();
    if (!isset($_POST['register'])) { ?>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="div_align">
                <input class="textboxes" type="text" id="fname" name="fname" placeholder="Enter First Name" maxlength="20" required><br><br>
                <input class="textboxes" type="text" id="sname" name="sname" placeholder="Enter Second Name" maxlength="20" required><br><br>
                <input class="textboxes" type="text" id="lname" name="lname" placeholder="Enter Last Name" maxlength="20" required><br><br>
                <input class="textboxes" type="text" id="username" name="username" placeholder="Enter Username" maxlength="12" required><br><br>
                <input class="textboxes" type="text" id="personal_id" name="personal_id" placeholder="Enter Personal ID" maxlength="12" required><br><br>
                <input class="textboxes" type="text" id="number" name="number" placeholder="Enter Phone Number" maxlength="12" required><br><br>
                <input class="textboxes" type="text" id="nat" name="nat" placeholder="Enter Nationality" maxlength="3" required><br><br>
                <input class="textboxes" type="password" id="password" name="password" placeholder="Enter Password" maxlength="10" required><br><br>
                <input class="textboxes" type="password" id="passwordRep" name="passwordRep" placeholder="Repeat Password" maxlength="10" required><br><br>
                <p style="margin-top: 0.5vw;">Already have an account? <a href="login.php">Click here to log in!</a></p>
                <input class="actionbttns" style="margin-top: 2vw;" type="submit" name="register" value="Register">
            </div>
        </form>
    <?php } else {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "database";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $role = "User";
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            $fname = filter_input(INPUT_POST, 'fname');
            $sname = filter_input(INPUT_POST, 'sname');
            $lname = filter_input(INPUT_POST, 'lname');
            $personal_id = filter_input(INPUT_POST, 'personal_id');
            $phone_number = filter_input(INPUT_POST, 'number');
            $nat = filter_input(INPUT_POST, 'nat');

            $sql = "INSERT INTO users (id, username, first_name, second_name, last_name, password, personal_id, phone_number, role, nationality) VALUES 
            (NULL, '$username', '$fname', '$sname', '$lname', '$password', '$personal_id', '$phone_number', '$role', '$nat')";


            if ($conn->query($sql) === TRUE) {
                header("Location: home.php");
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $fname;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } catch (Exception $e) {
            print "We had an error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    ?>
</body>

</html>
