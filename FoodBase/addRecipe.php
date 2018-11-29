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
    <a href="addCuisine.php"> Add a Cuisine</a>
    <a class="logoutTab" href="logout.php">Logout</a>
  </div>
  <br>
  <h2>Add a Recipe</h2>

  <form  action="addRecipeNow.php" method="post">
    Recipe name:<br>
    <input type="text" name="recipe_name">
    <br>
    Cuisine:<br>

    <select name="cuisine_name">
      <?php
      $servername = "dbm2.itc.virginia.edu";
      $username = "Foodbase";
      $password = "Foodbase";
      $dbname = "Foodbase";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT cuisine_name FROM cuisine";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc())
      {
        echo "<option>" . $row['cuisine_name'] . "</option>";
      }
      // Close menu form
      $menu = "</select>";
      // Output dropdown menu
      echo $menu;
      $conn->close();
      ?>
    </select>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
