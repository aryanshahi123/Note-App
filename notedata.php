<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crud_app";
$noteconn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$noteconn) {
    die("Connection Error.");
}
