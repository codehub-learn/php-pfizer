<?php
$kids = [
  'Georgia',
  'Chrisi',
];

$count = count($kids);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>
</head>
<body>
<p>I have <?= $count ?> daughters. These are:</p>
<ul>
  <?php foreach ($kids as $kid): ?>
      <li onclick="alert('Hello <?= $kid ?>')"><?= $kid ?></li>
  <?php endforeach; ?>
</ul>
</body>
</html>