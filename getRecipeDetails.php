<html>
<head>
  <title>Foodbase Tool</title>
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
  <a href="myRecipes.php"><button>Back</button></a>
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
    echo "Recipe Name: " . $row["recipe_name"]. "<br><br>";
  }
} else {
  echo "0 results";
}

$sql = "SELECT ingredient_name, ingredient_ID FROM ingredient NATURAL JOIN recipe_ingredient WHERE recipe_ID = " .$recipeID. "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Ingredient Name: " . $row["ingredient_name"]. "<br>";
  }
} else {
  echo "0 results";
}
echo "<br>";

$sql = "SELECT step_number, instruction FROM steps WHERE recipe_ID = " .$recipeID. "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Step ".$row["step_number"]. ": " . $row["instruction"]. "<br><br>";
  }
} else {
  echo "0 results";
}


$conn->close();

?>
