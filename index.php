<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $tags = $_POST['tags'];
    $tags_str = is_array($tags) ? implode(',', $tags) : $tags;
    $sql = "INSERT INTO tasks (title, description, tags) VALUES ('$title', '$desc', '$tags_str')";
    $conn->query($sql);
}

$tag = isset($_GET['tag']) ? $_GET['tag'] : '';
if ($tag) {
    $sql = "SELECT * FROM tasks WHERE FIND_IN_SET('$tag', tags)";
} else {
    $sql = "SELECT * FROM tasks";
}
$result = $conn->query($sql);
?>