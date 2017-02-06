<html>

    <head>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
    
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
        <option value="Name">Name</option>
        <option value="Last Name">Last Name</option>
    </optgroup>
    </select>

    <br><br>

    <span>Chart Data: </span>
    <textarea name="data" rows="5" cols="40">

    </textarea>



        <input name ="mysubmit" type = submit value ="Submit">

    </form>

<h1>
  <?php
    echo "<br>";
    echo htmlspecialchars($_POST['name']);
  ?>
</h1>




<?php
  $selectOption = $_POST['selection'];
  $selectOption2 = $_POST['sort'];
  $chartData = $_POST['data'];
  $explode1 = explode("\n", $chartData);
  $implode1 = implode(",", $explode1);
  $explode2 = explode(",", $implode1);

  
  $array = $explode2;
  $size = count($explode2);
  $result = array();
  for ($i = 0; $i < $size; $i += 2) {
    unset($array[$i]);
  }
  $average = array_sum($array) / count($array);
  
  if ($selectOption2 == "None") { 
  echo "Highest: (index = ";
  for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == max($array)) {
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo max($array);
  echo "<br>";
  echo "Lowest: (index = ";
    for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == min($array)) {  
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo min($array);
  echo "<br>";
  echo "Average: ";
  echo  round($average, 2);
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

  echo "Raw Data: ";
  echo "<br>";
  echo $chartData;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $arraycount = count($explode2);
  $stars = array("*", "**", "***", "****","*****", "******","*******","********", "*********", "**********");


  echo "<br>";
  echo "<table class='table table-striped'>";

  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Grade</th>"; 
  echo "<th>Chart</th>";
  
  echo "<tbody>";
  echo "</tr>";

  for ($i = 0; $i < $arraycount; $i++) {
  echo "<tr>";
  echo  "<td>$explode2[$i]</td>";
  $i++;
  echo "<td>$explode2[$i]</td>";

if ($explode2[$i] >= 10 AND $explode2[$i] < 20) {
  echo "<td>$stars[0]</td>";
}

if ($explode2[$i] >= 20 AND $explode2[$i] < 30) {
  echo "<td>$stars[1]</td>";
}

if ($explode2[$i] >= 30 AND $explode2[$i] < 40) {
  echo "<td>$stars[2]</td>";
}

if ($explode2[$i] >= 40 AND $explode2[$i] < 50) {
  echo "<td>$stars[3]</td>";
}

if ($explode2[$i] >= 50 AND $explode2[$i] < 60) {
  echo "<td>$stars[4]</td>";
}

if ($explode2[$i] >= 60 AND $explode2[$i] < 70) {
  echo "<td>$stars[5]</td>";
}

if ($explode2[$i] >= 70 AND $explode2[$i] < 80) {
  echo "<td>$stars[6]</td>";
}

if ($explode2[$i] >= 80 AND $explode2[$i] < 90) {
  echo "<td>$stars[7]</td>";
}

if ($explode2[$i] >= 90 AND $explode2[$i] < 100) {
  echo "<td>$stars[8]</td>";
}

if ($explode2[$i] >= 100) {
  echo "<td>$stars[9]</td>";
}

echo "</tr>";

}
echo "</tbody>";
echo "</table>";
}

?>

<script>
function sortTableName() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

<?php
  $selectOption = $_POST['selection'];
  $selectOption2 = $_POST['sort'];
  $chartData = $_POST['data'];
  $explode1 = explode("\n", $chartData);
  $implode1 = implode(",", $explode1);
  $explode2 = explode(",", $implode1);

  
  $array = $explode2;
  $size = count($explode2);
  $result = array();
  for ($i = 0; $i < $size; $i += 2) {
    unset($array[$i]);
  }
  $average = array_sum($array) / count($array);

    
  if ($selectOption2 == 'Name') {
  echo "Highest: (index = ";
  for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == max($array)) {
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo max($array);
  echo "<br>";
  echo "Lowest: (index = ";
    for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == min($array)) {  
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo min($array);
  echo "<br>";
  echo "Average: ";
  echo  round($average, 2);
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

  echo "Raw Data: ";
  echo "<br>";
  echo $chartData;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $arraycount = count($explode2);
  $stars = array("*", "**", "***", "****","*****", "******","*******","********", "*********", "**********");


  echo "<br>";
  echo "<table id = 'myTable' class='table table-striped'>";

  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Grade</th>"; 
  echo "<th>Chart</th>";
  
  echo "<tbody>";
  echo "</tr>";

  for ($i = 0; $i < $arraycount; $i++) {
  echo "<tr>";
  echo  "<td>$explode2[$i]</td>";
  $i++;
  echo "<td>$explode2[$i]</td>";

if ($explode2[$i] >= 10 AND $explode2[$i] < 20) {
  echo "<td>$stars[0]</td>";
}

if ($explode2[$i] >= 20 AND $explode2[$i] < 30) {
  echo "<td>$stars[1]</td>";
}

if ($explode2[$i] >= 30 AND $explode2[$i] < 40) {
  echo "<td>$stars[2]</td>";
}

if ($explode2[$i] >= 40 AND $explode2[$i] < 50) {
  echo "<td>$stars[3]</td>";
}

if ($explode2[$i] >= 50 AND $explode2[$i] < 60) {
  echo "<td>$stars[4]</td>";
}

if ($explode2[$i] >= 60 AND $explode2[$i] < 70) {
  echo "<td>$stars[5]</td>";
}

if ($explode2[$i] >= 70 AND $explode2[$i] < 80) {
  echo "<td>$stars[6]</td>";
}

if ($explode2[$i] >= 80 AND $explode2[$i] < 90) {
  echo "<td>$stars[7]</td>";
}

if ($explode2[$i] >= 90 AND $explode2[$i] < 100) {
  echo "<td>$stars[8]</td>";
}

if ($explode2[$i] >= 100) {
  echo "<td>$stars[9]</td>";
}

echo "</tr>";

}
echo "</tbody>";
echo "</table>";

echo '<script> sortTableName(); </script>';
}
?>


<script>
function sortTableGrade() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

<?php
  $selectOption = $_POST['selection'];
  $selectOption2 = $_POST['sort'];
  $chartData = $_POST['data'];
  $explode1 = explode("\n", $chartData);
  $implode1 = implode(",", $explode1);
  $explode2 = explode(",", $implode1);

  
  $array = $explode2;
  $size = count($explode2);
  $result = array();
  for ($i = 0; $i < $size; $i += 2) {
    unset($array[$i]);
  }
  $average = array_sum($array) / count($array);

    
  if ($selectOption2 == 'Score') {
  echo "Highest: (index = ";
  for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == max($array)) {
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo max($array);
  echo "<br>";
  echo "Lowest: (index = ";
    for ($i = 0; $i < $size; $i++) {
    if ($explode2[$i] == min($array)) {  
      $g = $i - 1;
      echo " $g) ";
      echo $explode2[$g];
      echo " - ";
    }
  }

  echo min($array);
  echo "<br>";
  echo "Average: ";
  echo  round($average, 2);
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

  echo "Raw Data: ";
  echo "<br>";
  echo $chartData;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $arraycount = count($explode2);
  $stars = array("*", "**", "***", "****","*****", "******","*******","********", "*********", "**********");


  echo "<br>";
  echo "<table id = 'myTable' class='table table-striped'>";

  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Grade</th>"; 
  echo "<th>Chart</th>";
  
  echo "<tbody>";
  echo "</tr>";

  for ($i = 0; $i < $arraycount; $i++) {
  echo "<tr>";
  echo  "<td>$explode2[$i]</td>";
  $i++;
  echo "<td>$explode2[$i]</td>";

if ($explode2[$i] >= 10 AND $explode2[$i] < 20) {
  echo "<td>$stars[0]</td>";
}

if ($explode2[$i] >= 20 AND $explode2[$i] < 30) {
  echo "<td>$stars[1]</td>";
}

if ($explode2[$i] >= 30 AND $explode2[$i] < 40) {
  echo "<td>$stars[2]</td>";
}

if ($explode2[$i] >= 40 AND $explode2[$i] < 50) {
  echo "<td>$stars[3]</td>";
}

if ($explode2[$i] >= 50 AND $explode2[$i] < 60) {
  echo "<td>$stars[4]</td>";
}

if ($explode2[$i] >= 60 AND $explode2[$i] < 70) {
  echo "<td>$stars[5]</td>";
}

if ($explode2[$i] >= 70 AND $explode2[$i] < 80) {
  echo "<td>$stars[6]</td>";
}

if ($explode2[$i] >= 80 AND $explode2[$i] < 90) {
  echo "<td>$stars[7]</td>";
}

if ($explode2[$i] >= 90 AND $explode2[$i] < 100) {
  echo "<td>$stars[8]</td>";
}

if ($explode2[$i] >= 100) {
  echo "<td>$stars[9]</td>";
}

echo "</tr>";

}
echo "</tbody>";
echo "</table>";

echo '<script> sortTableGrade(); </script>';
}
?>

</body>
 
</html>
