<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tutorial 1</title>
</head>
<body>

  <h3>Chess Board</h3>
  <table cellspacing="0px" cellpadding="0px" border="1px">
     <?php
for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 8; $col++) {
        $total = $row + $col;
        if ($total % 2 == 0) {
            echo "<td height=30px width=30px bgcolor=#fff></td>";
        } else {
            echo "<td height=30px width=30px bgcolor=#000></td>";
        }
    }
    echo "</tr>";
}
?>
</table>

</body>
</html>