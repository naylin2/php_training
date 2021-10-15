<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tutorial 1</title>
</head>
<style>
    body{
        margin-left:50px;
    }
</style>
<body>

<?php
echo "<pre>";
for ($i = 1; $i < 6; $i++) {
    for ($j = $i; $j < 6; $j++) {
        echo "&nbsp;&nbsp;";
    }

    for ($j = 2 * $i - 1; $j > 0; $j--) {
        echo ("&nbsp;*");
    }

    echo "<br>";
}
$n = 6;
for ($i = 6; $i > 0; $i--) {
    for ($j = $n - $i; $j > 0; $j--) {
        echo "&nbsp;&nbsp;";
    }

    for ($j = 2 * $i - 1; $j > 0; $j--) {
        echo ("&nbsp;*");
    }

    echo "<br>";
}
echo "</pre>";
?>

</body>
</html>