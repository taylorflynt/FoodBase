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
  <h2>Add Recipe Ingredients</h2>

  <form method="post">
    Ingredient name:<br>
    <input type="text" name="ingredientName" value=""><br>
    Type of Food:<br>
    <input type="text" name="ingredientType" value=""><br>
    Quantity:<br>
    <input type="text" name="ingredientQuantity" value=""><br>
    Measurement:<br>
    <input type="text" name="ingredientMeasurement" value=""><br>
    Specification:<br>
    <input type="text" name="ingredientSpecification" value=""><br>

    <br><br>
    <input type="submit" name="addMoreIngredients" value="Add Another Ingredient">
    <input type="submit" name="goToAddSteps" value="Add Steps">
  </form>

  <?php
  //gets recipe ID from previous page
  session_start();
  $recipeID = $_SESSION['recipe_ID'];

  $servername = "dbm2.itc.virginia.edu";
  $username = "Foodbase";
  $password = "Foodbase";
  $dbname = "Foodbase";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //adds ingredients to ingredient table, recipe_ingredient
  if (isset($_POST["addMoreIngredients"])){

    $sql = "INSERT INTO ingredient (ingredient_name, type_of_food)
            VALUES ('" .$_POST['ingredientName']. "', '" .$_POST['ingredientType']. "')" ;
    $result = $conn->query($sql);

    $sql = "SELECT ingredient_ID FROM ingredient
            WHERE ingredient_name = '" .$_POST['ingredientName']. "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
      $ingredientID =  $row['ingredient_ID'];
    }

    $sql = "INSERT INTO recipe_ingredient (recipe_ID, ingredient_ID, quantity, unit, specifications)
            VALUES (" .$_SESSION['recipe_ID'].", " .$ingredientID. ", " . $_POST['ingredientQuantity']. ", '" .$_POST['ingredientMeasurement']."', '".$_POST['ingredientSpecification']."')";
    $result = $conn->query($sql);
  } else if (isset($_POST["goToAddSteps"])){
    $sql = "INSERT INTO ingredient (ingredient_name, type_of_food)
            VALUES ('" .$_POST['ingredientName']. "', '" .$_POST['ingredientType']. "')" ;
    $result = $conn->query($sql);

    $sql = "SELECT ingredient_ID FROM ingredient
            WHERE ingredient_name = '" .$_POST['ingredientName']. "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
      $ingredientID =  $row['ingredient_ID'];
    }

    $sql = "INSERT INTO recipe_ingredient (recipe_ID, ingredient_ID, quantity, unit, specifications)
            VALUES (" .$_SESSION['recipe_ID'].", " .$ingredientID. ", " . $_POST['ingredientQuantity']. ", '" .$_POST['ingredientMeasurement']."', '".$_POST['ingredientSpecification']."')";
    $result = $conn->query($sql);
    session_start();
    $_SESSION['recipe_ID'] = $recipeID;
    header("Location:addRecipeSteps.php");
    exit;
  }

  $conn->close();
  ?>

</body>
</html>
