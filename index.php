<?php
session_start();
require("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="Styles/app.css">
</head>

<body>
    <div class="form">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="user">User Name:</label>
            <input type="text" name="user" id="user" required autocomplete="off"><br>
            <label for="pwd">Password:</label>
            <input type="password" name="password" id="pwd" required> <br>
            <input type="submit" class="button" value="Login">
        </form>

        <p>Not Registered? <a href="signup.php">Sign Up</a></p>

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


if (!empty($_POST["user"]) && !empty($_POST["password"])) {

    $username = filter_input(
        INPUT_POST,
        "user",
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $password = $_POST["password"];

    $query = "SELECT * FROM user_info WHERE username='$username'";
    $data = mysqli_query($conn, $query);
    $count = mysqli_num_rows($data);

    if ($count > 0) {
        $userdata = mysqli_fetch_assoc($data);
        if ($userdata["username"] == $username && password_verify($password, $userdata["password"])) {

            $_SESSION["username"] = $username;
            header("location:main.php");
        } else {
            header("location:index.php?msg=Invalid Credentials");
        }
    } else {
        header("location:index.php?msg=Not Registered");
    }
}
?>