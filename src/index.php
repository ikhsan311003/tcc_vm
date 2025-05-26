<?php
require 'config.php';
$stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Notes App</title></head>
<body>
<h1>Notes</h1>
<a href="create.php">Add Note</a>
<ul>
<?php foreach ($notes as $note): ?>
  <li>
    <strong><?= htmlspecialchars($note['title']) ?></strong> -
    <?= htmlspecialchars($note['content']) ?>
    [<a href="update.php?id=<?= $note['id'] ?>">Edit</a> |
     <a href="delete.php?id=<?= $note['id'] ?>">Delete</a>]
  </li>
<?php endforeach; ?>
</ul>
</body>
</html>