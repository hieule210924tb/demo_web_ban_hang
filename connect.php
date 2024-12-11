<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'demo_we_ban_hang';

$conn = new mysqli($server, $user, $pass, $database);
if ($conn->connect_errno) {
    die("Connection failed:" . $conn->connect_errno);
}