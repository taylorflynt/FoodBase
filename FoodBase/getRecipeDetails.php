<html>
<head>
  <title>Foodbase</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Welcome to FoodBase!</h1>

  <div class="topnav">
    <a class="active" href="myRecipes.php">My Recipes</a>
    <a href="myIngredients.php">My Ingredients</a>
    <a href="myList.php">My Shopping List</a>
    <a href="addRecipe.php">Add a Recipe</a>
    <a href="addIngredient.php">Add Ingredients</a>
    <a href="addCuisine.php"> Add a Cuisine</a>
    <a class="logoutTab" href="logout.php">Logout</a>
  </div>
  <br>
  <a id="tableButton" href="myRecipes.php"><button id="tableButton">Back</button></a>
  <h2>Recipe Details</h2>
</body>

</html>

<?php
session_start();
$_SESSION['selected_val'];

$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cuisine_ID, recipe_ID, recipe_name FROM recipe WHERE recipe_name = '" .$_SESSION['selected_val']. "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $recipeID = $row["recipe_ID"];
    $cuisineID = $row["cuisine_ID"];
    echo "<h3>" . $row["recipe_name"]. "</h3><a id='tableButton' href='deleteRecipe.php?recipe_id=".$recipeID."'><button id='tableButton'>Delete recipe</button></a>";
  }
}

$sql = "SELECT ingredient_name, ingredient_ID, quantity, unit, specifications FROM ingredient NATURAL JOIN recipe_ingredient WHERE recipe_ID = " .$recipeID. "";
$result = $conn->query($sql);

echo "<table><tr><th align='left'>Ingredient</th><th align='left'>Quantity</th><th align='left'>Units</th><th>Specification</th></tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $specification = $row['specifications'];
    if($specification == ''){
      $specification = "-";
    }
    echo "<tr><td>" . $row["ingredient_name"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["unit"]. "</td><td>" .$specification."</td></tr><br>";
  }
}
echo "</table><br>";

$sql = "SELECT step_number, instruction FROM steps WHERE recipe_ID = " .$recipeID. " ORDER BY step_number ASC";
$result = $conn->query($sql);

echo "<table><tr><th align='left'>Step</th><th align='left'>Instructions</th></tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["step_number"]. "</td><td>" . $row["instruction"]. "</td></tr><br>";
  }
}

echo "</table><br>";



$conn->close();

?>
