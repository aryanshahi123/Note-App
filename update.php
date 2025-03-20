<?php
session_start();
include("notedata.php");
if (!empty($_POST["title"]) && !empty($_POST["text-area"])) {
    $id = $_GET["id"];
    $title = $_POST["title"];
    $body = $_POST["text-area"];
    $sql = "SELECT * FROM note_data WHERE ID='$id'";
    $query = mysqli_query($noteconn, $sql);
    if (!$query) {
        die("Error finding.");
    } else {
        $updquery = mysqli_query($noteconn, "UPDATE note_data SET Title ='$title', Body = '$body' WHERE ID='$id'");
        if ($updquery) {
            header("location: main.php?msg=Updated Successfully.");
        } else {
            die("Error");
        }
    }
}
