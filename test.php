<html>

    <head>
    <style>
    table, th, td {
      border: 1px solid black;
    }
    </style>
        <title>GroupProject1</title>
    </head>

    <body>


    <h1>Chart Creator</h1>


    <form method = "post">

    Chart Name: <input type = 'text' name = "name"\>


    <br> <br>
    <span>Please select a type of graph: </span>
    <select name = 'selection'>
    <option value="">Select an option</option>
    <optgroup label="Chart Type">
        <option value="Stat">Stat</option>
        <option value="Bar">Bar</option>
        <option value="Line">Line</option>
        <option value="Pie">Pie</option>
    </optgroup>
    </select>

    <br><br>

    <span>Please select a way to sort: </span>
    <select name = 'sort'>
    <option value="">Sort by:</option>
    <optgroup label="Sort Type">
        <option value="None">None</option>
        <option value="Score">Score</option>
        <option value="First Name">Name</option>
        <option value="Last Name">Last Name</option>
    </optgroup>
    </select>

    <br><br>

    <span>Chart Data: </span>
    <textarea name="data" rows="5" cols="40">

    </textarea>



        <input name ="mysubmit" type = submit value ="Submit">

    </form>

<h2>
  <?php
    echo "<br>";
    echo htmlspecialchars($_POST['name']);
  ?>
</h2>

<?php
  $selectOption = $_POST['selection'];
  $selectOption2 = $_POST['sort'];
  $chartData = $_POST['data'];

  echo "<br>";
  echo "<br>";
  echo "Chart Type: ";
  echo $selectOption;
  echo "<br>";
  echo "<br>";
  echo "Sorted by: ";
  echo $selectOption2;
  echo "<br>";
  echo "<br>";
  echo "Raw Data:";
  echo "<br>";
  echo $chartData;
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<table><tr><th>Name</th><th>Grade</th></tr><tr>".implode("</tr><tr>",array_map(function($test)
  {return "<td>".implode("</td><td>",explode(",",trim($test)))."</td>";},explode("\n",$chartData)))."</tr></table>";
?>

    </body>






















</html>
