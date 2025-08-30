<?php
$ conn = new mysqli("localhost", "username", "password", "todo_app");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}