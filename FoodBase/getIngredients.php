<?php
session_start();
$userID = $_SESSION['user_ID'];

$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT ingredient_ID, quantity, unit FROM ing_inventory
WHERE inventory_ID = ".$userID." ";
$result = $conn->query($sql);

echo "<table><tr><th align='left'>Ingredient</th><th align='left'>Food Type</th><th align='left'>Quantity</th><th align='left'>Units</th></tr>";
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
    //echo "<td><form action='deleteFromInventory.php?id=".$row['ingredient_ID']."'><input type='submit' value='Delete Ingredient' /></form></td></tr>";
    //echo "<td><a id='tableButton' href=\"deleteFromInventory.php?id=".$row['ingredient_ID']."\">Remove</a></td></tr>";
  }
}

echo "</table>";
$conn->close();
?>
