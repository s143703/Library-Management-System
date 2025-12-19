<?php
$conn = new mysqli("localhost", "root", "", "lmshelf");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>