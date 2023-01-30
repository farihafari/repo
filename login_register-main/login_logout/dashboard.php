<?php
session_start();

if (isset($_SESSION['username'])) {
    echo 'Hello welcome to your dashboard' . ' ' . $_SESSION['username'];
} else {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Dashboard</title>
</head>

<body>
    <button class="btn btn-primary" type="submit"><a href="logout.php" class="text-light" style="text-decoration: none;">Logout</a></button>
</body>

</html>