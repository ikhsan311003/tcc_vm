<?php
require 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
$stmt->execute([$id]);
$note = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
  $stmt->execute([$title, $content, $id]);
  header('Location: index.php');
}
?>
<form method="post">
  <input name="title" value="<?= htmlspecialchars($note['title']) ?>"><br>
  <textarea name="content"><?= htmlspecialchars($note['content']) ?></textarea><br>
  <button type="submit">Update</button>
</form>