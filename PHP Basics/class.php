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

?>

</body>
</html>