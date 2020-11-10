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
</body>
</html>