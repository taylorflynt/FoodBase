<html>
<head>
  <title>Foodbase</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Welcome to FoodBase!</h1>

  <div class="topnav">
    <a href="myRecipes.php">My Recipes</a>
    <a href="myIngredients.php">My Ingredients</a>
    <a class="active" href="myList.php">My Shopping List</a>
    <a href="addRecipe.php">Add a Recipe</a>
    <a href="addIngredient.php">Add Ingredients</a>
    <a href="addCuisine.php"> Add a Cuisine</a>
    <a class="logoutTab" href="logout.php">Logout</a>
  </div>
  <br>
  <h2>My Shopping List</h2>

  <form  action="addToList.php" method="post">
    <input type="submit" value="Add Ingredient To List"><br><br>
  </form>
  <form  action="removeFromList.php" method="post">
    <input type="submit" value="Remove Ingredient From List"><br><br>
  </form>
  <div class="recipeList">
    <?php include('getShoppingList.php') ?>
  </div>
</body>

</html>
