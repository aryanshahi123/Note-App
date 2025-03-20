<?php
session_start();
include("notedata.php");
if (isset($_GET["id"]) && $_SESSION["username"]) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM note_data WHERE ID='$id'";
    $query = mysqli_query($noteconn, $sql);
    if (!$query) {
        die("Error finding.");
    } else {
        $delquery = mysqli_query($noteconn, "DELETE FROM note_data WHERE ID='$id'");
        if ($delquery) {
            header("location: main.php?msg=Deleted Successfully");
        } else {
            die("Error");
        }
    }
}
