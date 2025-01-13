<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='update_task.php?id={$row['id']}'>Update</a> |
                            <a href='delete_task.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No tasks found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
