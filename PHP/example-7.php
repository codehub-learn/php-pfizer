<?php
$weight = 0;
$height = 0;
$bmi = 0;

if (isset($_GET['weight']) and isset($_GET['height'])) {
  $weight = $_GET['weight'];
  $height = $_GET['height'];
  
  // ΒΜΙ = W / H^2
  $bmi = $height == 0 ? 0 : $weight / pow($height, 2);
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
<?php if ($bmi > 0): ?>
    <p>BMI: <?= $bmi ?></p>
<?php endif; ?>

<?php if ($bmi > 0 and $bmi < 18.5): ?>
    <p>Category: Underweight</p>
<?php elseif ($bmi >= 18.5 and $bmi < 24.9): ?>
    <p>Category: Normal weight</p>
<?php elseif ($bmi >= 25 and $bmi < 29.9): ?>
    <p>Category: Overweight</p>
<?php elseif ($bmi >= 30): ?>
    <p>Category: Obesity</p>
<?php endif; ?>

<form action="example-7.php">
    <div class="form-group">
        <label for="weight" class="block">Weight (kg)</label>
        <input id="weight" name="weight" type="number" min="0" value="<?= $weight ?>"/>
    </div>

    <div class="form-group">
        <label for="height" class="block">Height (m)</label>
        <input id="height" name="height" type="number" min="0" step="0.1" value="<?= $height ?>"/>
    </div>

    <button>Submit</button>
</form>
</body>
</html>