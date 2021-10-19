<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>QR Generator</title>
  <style>
  body{
      background: #fafafa;
      font-family: sans-serif;
      color: #242424;
  }
  h2{
      color: #2e7eff;
  }
  .form{
      width: 50%;
      margin: 0 auto;
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.10), 0 1px 2px rgba(0,0,0,0.10);
      border-radius: 15px;
      padding: 30px;
      margin-top: 30px;
      text-align: center;
  }
</style>
</head>

<body>
  <div class="form">
    <h2>Generate QR</h2>
    <form method="post" action="index.php">
      <input type="text" name="qr_text">
      <input type="submit" name="generate_text" value="Generate">
  </form>
  <br><br>

<?php

if (isset($_POST["generate_text"])) {
    include "phpqrcode/qrlib.php";
    $text = $_POST["qr_text"];
    $folder = "images/";
    $file_name = "qr.png";
    $file_name = $folder . $file_name;
    QRcode::png($text, $file_name);
    echo "<img src='images/qr.png'>";
}

?>

</div>


</body>
</html>