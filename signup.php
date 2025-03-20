<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Styles/app.css">
</head>

<body>
    <div class="form">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="user">User Name:</label>
            <input type="text" name="user" id="user" required autocomplete="off"><br>
            <label for="pwd">Password:</label>
            <input type="password" name="password" id="pwd" required> <br>
            <label for="cpwd">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpwd" required> <br>
            <input type="submit" class="button" value="Sign Up">
        </form>
        <p>Already Registered?<a href="index.php">Log In</a></p>
    </div>

    <?php
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo "<p class='msg'>$msg</p>";
    }
    ?>
</body>

</html>

<?php
require("database.php");
error_reporting(0);
if (!empty($_POST["user"]) && !empty($_POST["password"]) && !empty($_POST["cpassword"])) {
    if (($_POST["password"] == $_POST["cpassword"])) {
        $username = filter_input(
            INPUT_POST,
            "user",
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $query = "SELECT * FROM user_info WHERE username='$username'";
        $data = mysqli_query($conn, $query);
        $count = mysqli_num_rows($data);

        if ($count > 0) {
            // echo ("Username Already Taken.");
            header("location:signup.php?msg=Username Already Taken.");
        } else {
            $query = "INSERT INTO user_info(username, `password`) VALUES('$username', '$password')";

            $valid = mysqli_query($conn, $query);


            if ($valid) {
                header("location:index.php?");
            } else {
                header("location:signup.php?msg=Error in storing data.");
            }
        }
    } else {
        header("location:signup.php?msg=Passwords Dont Match.");
    }
}
?>