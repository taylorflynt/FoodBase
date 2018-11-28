<html>
<head>
  <title>Foodbase</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Welcome to FoodBase!</h1>
  <div class="topnav">
    <a href="myRecipes.php">My Recipes</a>
    <a class="active" href="myIngredients.php">My Ingredients</a>
    <a href="myList.php">My Shopping List</a>
    <a href="addRecipe.php">Add a Recipe</a>
    <a href="addIngredient.php">Add Ingredients</a>
    <a href="addCuisine.php"> Add a Cuisine</a>
    <a class="logoutTab" href="logout.php">Logout</a>
  </div>
  <br>
  <h2>My Ingredients</h2>

  <div class="recipeList">
    <?php include('getIngredients.php') ?>
  </div>
</body>

</html>
