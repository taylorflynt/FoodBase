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
    <a class="active" href="addRecipe.php">Add a Recipe</a>
    <a href="addIngredient.php">Add Ingredients</a>
  </div>
  <br>
  <h2>Add Recipe Steps</h2>

  <form  action="addRecipeIngredients.php" method="post">
    Step details:<br>
    <textarea name="stepDetails" cols="50" rows="10"></textarea><br><br>
    <input type="submit" name="addMoreSteps" value="Add Another Step">
    <input type="submit" name="finishRecipe" value="Finish">
  </form>
</body>

</html>
