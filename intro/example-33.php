<?php
$name = "John Doe";

if (isset($_GET['name'])) {
  $name = $_GET['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>

    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .block {
            display: block;
        }
    </style>
</head>
<body>
<?php if ($name): ?>
    <p>Hello <?= $name ?></p>
<?php else: ?>
    <p>Come on, don't be shy</p>
<?php endif; ?>

<form action="example-33.php">
    <div class="form-group">
        <label for="name" class="block">Name</label>
        <input id="name" name="name" type="text" value="<?= $name ?>"/>
    </div>

    <button>Submit</button>
</form>
</body>
</html>