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

<h2>Add Task</h2>
<form method="post">
    Title: <input name="title" required><br>
    Description: <input name="description"><br>
    Tag: <input name="tags"><br>
    <button type="submit">Add</button>
</form>

<h2>Tasks</h2>
<form method="get">
    Filter by tag: <input name="tag">
    <button type="submit">GO</button>
</form>
<table border="1">
    <tr>
        <th>ID</th><th>Title</th><th>Status</th><th>Tags</th><th>Created</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['tags'] ?></td>
        <td><?= $row['createdAt'] ?></td>
        <td>
            <a href="task.php?id=<?= $row['id'] ?>">View/Edit</a>
            <a href="task.php?id=<?= $row['id'] ?>&delete=1" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>