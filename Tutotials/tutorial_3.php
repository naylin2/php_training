<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 3</title>
</head>
<body>

<?php
function getAge($dob)
{
    $bday = new DateTime($dob);
    $today = new Datetime(date('m.d.y'));
    if ($bday > $today) {
        return 'You are not born yet';
    }
    $diff = $today->diff($bday);
    return 'Your Current Age is : ' . $diff->y . ' Years, ' . $diff->m . ' month, ' . $diff->d . ' days';
}
?>
    <h1 class="center">Calculate Age</h1>
    <form>
      <label>Date of Birth</label>
      <input type="date" name="dob" value="<?php echo (isset($_GET['dob'])) ? $_GET['dob'] : ''; ?>">
      <input type="submit" value="Calculate Age">
  </form>
<?php
if (isset($_GET['dob']) && $_GET['dob'] != '') {
    echo getAge($_GET['dob']);
}
?>

</body>
</html>