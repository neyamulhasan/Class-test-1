<?php
include 'db.php';
$id = $_GET['id'];

if (isset($_GET['delete'])) {
    $conn->query("DELETE FROM tasks WHERE id=$id");
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];
    $tags = $_POST['tags'];
    $tags_str = is_array($tags) ? implode(',', $tags) : $tags;
    $conn->query("UPDATE tasks SET title='$title', description='$desc', status='$status', tags='$tags_str' WHERE id=$id");
}

$res = $conn->query("SELECT * FROM tasks WHERE id=$id");
$task = $res->fetch_assoc();
?>

<h2>Edit Task</h2>
<form>
    
</form>
<a href="index.php">Back to list</a>
