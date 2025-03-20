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
        Update Data
    </title>

    <link rel="stylesheet" href="Styles/entrypage.css">


</head>

<body>
    <?php
    if (isset($_GET["id"]) && $_SESSION["username"]) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM note_data WHERE ID='$id'";
        $query = mysqli_query($noteconn, $sql);
        $title = "";
        $body = "";
        if (!$query) {
            die("Error detecting.");
        } else {
            $ori_data = mysqli_fetch_assoc($query);
            $id = $ori_data["ID"];
    ?>
            <form action="update.php?id=<?php echo $id ?>" onsubmit="return checkentry()" method='post'>
                Title:
                <input type="text" name="title" required value="<?php echo $ori_data['Title']; ?>">
                Content:
                <textarea name="text-area" id="text-area" maxlength="500" required><?php echo $ori_data['Body']; ?></textarea>
                <input type="submit" value="Update" class="button">
            </form>

            <script src="Scripts/validation.js"></script>
    <?php
        }
    }
    ?>

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
        header("location:main.php");
    }
}
?>