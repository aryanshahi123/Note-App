<?php
session_start();
include("notedata.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Insert Data
    </title>

    <link rel="stylesheet" href="Styles/entrypage.css">


</head>

<body>
    <form action='<?php $_SERVER["PHP_SELF"] ?>' method='post'>
        Title:
        <input type="text" name="title" required>
        Content:
        <textarea name="text-area" id="text-area" maxlength="500" required></textarea>
        <input type="submit" value="Add" class="button">
    </form>
</body>

</html>

<?php

if (!empty($_POST["title"]) && !empty($_POST["text-area"]) && $_SESSION["username"]) {
    $title = $_POST["title"];
    $body = $_POST["text-area"];
    $sql = "INSERT INTO note_data(Title, Body) VALUES('$title', '$body');";

    $query = mysqli_query($noteconn, $sql);
    if (!$query) {
        die(mysqli_connect_error());
    } else {
        header("location:main.php?msg=Added Successfully!");
    }
}
?>