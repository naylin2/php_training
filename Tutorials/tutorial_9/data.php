<?php
require_once "includes/dbh.php";

if ($stmt = $conn->query("SELECT name, salary, budget FROM people")) {
    $php_data_array = array(); // create PHP array
    while ($row = $stmt->fetch_row()) {
        $php_data_array[] = $row; // Adding to array
    }
} else {
    echo $connection->error;
}

echo "<script>

        var my_2d = " . json_encode($php_data_array) . ";
</script>";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'name');
        data.addColumn('number', 'salary');
        data.addColumn('number', 'budget');
        for(i = 0; i < my_2d.length; i++)
            {
                data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
            }
       var options1 = {
          title: 'Graph',
          hAxis: {title: 'Name',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          height: 350,
          backgroundColor: '#f7e2d1',
          colors:['#d14234','#d3685e']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options1);

       var options2 = {
          title: 'Graph',
          hAxis: {title: 'Name',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          height: 350,
          backgroundColor: '#f7e2d1',
          colors:['#d14234','#d3685e']
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
            chart.draw(data, options2);

       }

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Graph</title>
    <style>
        body{
            background: #f7e2d1;
        }
        .wrapper{
            width: 60%;
            margin: 30px auto;
        }
        .btn{
            background: #d3685e;
            border-color: #d3685e;
            color: #fff;
        }
        .btn:hover{
            background: #d3685e;
            opacity: 0.7;
            color: #fff;
        }
        .btn:focus{
            box-shadow: none;
            outline: none;
            border-color: #d3685e;
        }
        .chart{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="mt-5 mb-3 clearfix">
            <h2 class="pull-left">Budget Details Column-Graph</h2>
            <a href="../tutorial_8/index.php" class="btn pull-right">Back to Table</a>
        </div>
        <div id="chart_div" class="chart"></div>
    </div>
    <div class="wrapper">
        <div class="mt-5 mb-3 clearfix">
            <h2 class="pull-left">Budget Details Bar-Graph</h2>
        </div>
        <div id="chart_div2" class="chart"></div>
    </div>
</body>
</html>
