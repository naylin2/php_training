<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class and Objects</title>
</head>
<body>

<?php

class plant {
  public $color;
  public $type;
  public function __construct($a,$b){
    $this->color = $a;
    $this->type = $b;
  }
  public function output(){
    return "The plant is a " .$this->color. " " .$this->type. ".";
  }
}

$myPlant = new plant("white","lotus");
echo $myPlant -> output();
echo "<br>";
$myPlant = new plant("Purple","Orchid");
echo $myPlant -> output();

$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);
    
for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}

?>

</body>
</html>