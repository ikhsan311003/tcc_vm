<?php
// src/config.php
$host = 'db';
$db = 'notesdb';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $user, $pass, $options);
?>

<!-- src/index.php -->
<?php
require 'config.php';
$stmt = $pdo->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Notes App</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fff5f0;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #ff6f61;
      color: white;
      padding: 1rem;
      text-align: center;
    }
    .container {
      max-width: 800px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    a.button {
      display: inline-block;
      padding: 10px 16px;
      background-color: #ff9a76;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      margin-bottom: 1rem;
    }
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      background: #ffe8dc;
      margin-bottom: 1rem;
      padding: 1rem;
      border-radius: 8px;
    }
    li strong {
      display: block;
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
    }
    li a {
      color: #ff6f61;
      margin-right: 1rem;
    }
  </style>
</head>
<body>
  <header>
    <h1>📓 Notes App</h1>
  </header>
  <div class="container">
    <a class="button" href="create.php">➕ Add Note</a>
    <ul>
      <?php foreach ($notes as $note): ?>
        <li>
          <strong><?= htmlspecialchars($note['title']) ?></strong>
          <div><?= nl2br(htmlspecialchars($note['content'])) ?></div>
          <div style="margin-top: 0.5rem;">
            <a href="update.php?id=<?= $note['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $note['id'] ?>">Delete</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
