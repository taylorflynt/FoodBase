<html>
<head>
  <title>Foodbase Tool</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Welcome to FoodBase!</h1>

  <div class="topnav">
    <a href="myRecipes.php">My Recipes</a>
    <a href="myIngredients.php">My Ingredients</a>
    <a href="myList.php">My Shopping List</a>
    <a href="addRecipe.php">Add a Recipe</a>
    <a href="addIngredient.php">Add Ingredients</a>
    <a href="addCuisine.php"> Add a Cuisine</a>
    <a class="logoutTab" href="logout.php">Logout</a>
  </div>
  <br>
  <h2>Remove an Ingredient From Inventory</h2>

  <form  action="removeFromInventoryNow.php" method="post">
    Ingredient Name:<br>
    <input type="text" name="ingredient_name" value="">
    <br>
    Quantity:<br>
    <input type="text" name="ingredient_quantity" value=""><br>
    Unit:<br>
    <input type="text" name="ingredient_unit" value=""><br>
    <br>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
