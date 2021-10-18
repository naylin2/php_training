<?php
include_once "includes/dbh.php";
session_start();
if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM userdb WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'");
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
} else {
    ?> Incorrect Username or Password. Click here to <a href="logout.php" title="Logout">Login</a> again. <?php
}
?>
