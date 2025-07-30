<?php
$connect = mysqli_connect("localhost", "root", "", "fakecertificate");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}