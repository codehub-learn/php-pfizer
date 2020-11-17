<?php
$weight = 100;
$height = 1.80;

// ΒΜΙ = W / H^2
$bmi = $weight / pow($height, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>
</head>
<body>
<?= "Your BMI is: {$bmi}" ?>

<?php if ($bmi > 0 and $bmi < 18.5): ?>
    <p>Category: Underweight</p>
<?php elseif ($bmi >= 18.5 and $bmi < 24.9): ?>
    <p>Category: Normal weight</p>
<?php elseif ($bmi >= 25 and $bmi < 29.9): ?>
    <p>Category: Overweight</p>
<?php elseif ($bmi >= 30): ?>
    <p>Category: Obesity</p>
<?php endif; ?>
</body>
</html>