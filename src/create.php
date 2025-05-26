<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
  $stmt->execute([$title, $content]);
  header('Location: index.php');
}
?>
<form method="post">
  <input name="title" placeholder="Title"><br>
  <textarea name="content" placeholder="Content"></textarea><br>
  <button type="submit">Save</button>
</form>