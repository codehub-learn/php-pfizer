<?php

$name = 'Marios';

function salute() {
  global $name;
  
  return "Hello {$name}";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>
</head>
<body>
<p><?= salute() ?></p>
<p><?= $name ?></p>
</body>
</html>