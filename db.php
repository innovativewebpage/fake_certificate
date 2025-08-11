<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "fakecertificate", 3306);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
