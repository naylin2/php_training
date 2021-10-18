<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<title>Login Success</title>
</head>
<body>
<div class="login-form">
<?php

if ($_SESSION["name"]) {

    ?>
Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" title="Logout">Logout.
<?php

} else {
    echo "<h1>Please login first .</h1>";
}

?>
</div>
</body>
</html>