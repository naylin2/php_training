<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tutorial 2</title>
</head>
<style>
    body{
        margin-left:50px;
    }
</style>
<body>

<?php
echo "<pre>";
for ($row = 1; $row < 6; $row++) {
    for ($col = $row; $col < 6; $col++) {
        echo "&nbsp;&nbsp;";
    }

    for ($col = 2 * $row - 1; $col > 0; $col--) {
        echo ("&nbsp;*");
    }

    echo "<br>";
}
$n = 6;
for ($row = 6; $row > 0; $row--) {
    for ($col = $n - $row; $col > 0; $col--) {
        echo "&nbsp;&nbsp;";
    }

    for ($col = 2 * $row - 1; $col > 0; $col--) {
        echo ("&nbsp;*");
    }

    echo "<br>";
}
echo "</pre>";
?>

</body>
</html>