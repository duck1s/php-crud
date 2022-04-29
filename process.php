<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php-crud";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $score = $_POST['score'];

    $mysqli->query("INSERT INTO data (name, score) VALUES('$name', '$score')") or
        die($mysqli->error);
}
