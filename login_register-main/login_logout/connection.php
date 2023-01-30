<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_register';


$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    echo 'Does not connect to database';
}
