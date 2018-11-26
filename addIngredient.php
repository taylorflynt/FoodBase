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
    <a class="active" href="addIngredient.php">Add Ingredients</a>
  </div>
  <br>
  <h2>Add an Ingredient to Inventory</h2>

  <form  action="addIngredientNow.php" method="post">
    Ingredient Name:<br>
    <input type="text" name="ingredient_name" value="">
    <br>
    Type of Food:<br>
    <input type="text" name="type_of_food" value="">
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
