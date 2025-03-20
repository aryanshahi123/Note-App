<?php
session_start();

include("notedata.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="Styles/style.css">
</head>

<body>
    <?php
    include('header.php');
    ?>

    <a href="noteForm.php" class="add-button"> Add Note</a>
    <div class="container">
        <?php
        if (!isset($noteconn)) {
            die("Database connection not established.");
        }


        $sql = "SELECT * FROM note_data;";
        $data = mysqli_query($noteconn, $sql);

        if ($row = mysqli_fetch_assoc($data)) {
            do {
        ?>
                <div class="note">
                    <p class="Title"><?php echo htmlspecialchars($row["Title"]); ?></p>
                    <p class="Body"><?php echo htmlspecialchars($row["Body"]); ?></p>
                    <div class="buttons">
                        <a href="updateform.php?id=<?php echo $row['ID'] ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['ID'] ?>">Delete</a>
                    </div>
                </div>
        <?php
            } while ($row = mysqli_fetch_assoc($data));
        }

        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo "<p class='msg'>$msg</p>";
        }
        ?>



    </div>

    <script src=" handler.js"></script>

    <?php
    include('footer.php');
    ?>
</body>

</html>

<?php
if ($_SESSION["username"]) {
} else {
    header("location: index.php");
}

?>