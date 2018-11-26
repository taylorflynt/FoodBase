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
  <h2>Add a Recipe</h2>

  <form action="">
    Recipe name:<br>
    <input type="text" name="recipeName" value="">
    <br>
    Cuisine:<br>
    <select name="cuisineType">
      <option value="dessert">Dessert</option>
      <option value="american">American</option>
    </select>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
