<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<title>Login Form</title>
</head>
<body>
<div class="login-form">
    <form name="frmUser" method="post" action="loginProcess.php" align="center">
        <h2 class="text-center">Log in</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" autocomplete="off" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" value="Submit">Log in</button>
        </div>
    </form>
</div>
</body>
</html>
