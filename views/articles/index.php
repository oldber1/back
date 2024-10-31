<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
<h1>Articles</h1>
<?php foreach ($articles as $article): ?>
    <h2><?= htmlspecialchars($article['title']); ?></h2>
    <p><?= htmlspecialchars($article['content']); ?></p>
<?php endforeach; ?>
</body>
</html>
