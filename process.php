<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php-crud";

session_start();

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

$name = '';
$score = '';
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $score = $_POST['score'];

    $mysqli->query("INSERT INTO data (name, score) VALUES('$name', '$score')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved.";

    header("location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted.";

    header("location: index.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
    if ($result) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $score = $row['score'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $score = $_POST['score'];

    $mysqli->query("UPDATE data SET name='$name', score='$score' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated.";

    header("location: index.php");
}
