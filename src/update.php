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
<!DOCTYPE html>
<html>
<head>
  <title>Edit Note</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fff5f0;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 3rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #ff6f61;
      margin-bottom: 1.5rem;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      background-color: #ff6f61;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 6px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>✏️ Edit Note</h1>
    <form method="post">
      <input name="title" value="<?= htmlspecialchars($note['title']) ?>" required><br>
      <textarea name="content" rows="6" required><?= htmlspecialchars($note['content']) ?></textarea><br>
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
