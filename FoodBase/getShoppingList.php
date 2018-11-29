<?php
session_start();
$userID = $_SESSION['user_ID'];

$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ingredient_ID, quantity, unit FROM list_ingredient
WHERE list_ID = ".$userID."";
$result = $conn->query($sql);

echo "<table><tr><th align='left'>Ingredient</th><th align='left'>Food type</th><th align='left'>Quantity</th><th align='left'>Units</th></tr>";

while($row = $result->fetch_assoc()) {

  $ingredientQuantity = $row['quantity'];
  $ingredientUnit = $row['unit'];
  if ($ingredientUnit == ""){
    $ingredientUnit = "-";
  }

  $sql2 = "SELECT ingredient_name, type_of_food FROM ingredient
  WHERE ingredient_ID = ".$row['ingredient_ID']."";

  $result2 = $conn->query($sql2);
  while($row2 = $result2->fetch_assoc()) {
    $ingredientName = $row2['ingredient_name'];
    $typeOfFood = $row2['type_of_food'];
    echo "<tr><td>".$ingredientName."</td><td>".$typeOfFood."</td><td>" .$ingredientQuantity."</td><td>" .$ingredientUnit."</td>";
    echo "<td><a href=\"deleteFromList.php?id=".$row['ingredient_ID']."\">Remove from list</a></td></tr>";
  }
}

echo "</table>";

$conn->close();
?>
