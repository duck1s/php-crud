<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
</head>

<body>
    <?php require_once 'process.php'; ?>
    <form action="process.php" method="POST">
        <label for="">Name</label>
        <input type="text" name="name" value="Name">
        <label for="">Score</label>
        <input type="text" name="score" value="Score">
        <button type="submit" name="save">Save</button>
    </form>

    <?php

    $mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

    ?>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['score']; ?></td>
                <td></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>