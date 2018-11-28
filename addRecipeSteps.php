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
  <h2>Add Recipe Steps</h2>

  <form  action="" method="post">
    Step details:<br>
    <textarea name="stepInstructions" cols="50" rows="10"></textarea><br><br>
    <input type="submit" name="addMoreSteps" value="Add Another Step">
    <input type="submit" name="finishRecipe" value="Finish">
  </form>

  <?php

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

  if (isset($_POST["addMoreSteps"])){

    //add to Steps
    //add step number, instruction, and recipe_ID

    $sql = "INSERT INTO steps (step_number, instruction, recipe_ID)
            VALUES (80, '" .$_POST['stepInstructions']. "', '" .$recipeID. "')" ;
    $result = $conn->query($sql);

  } else if (isset($_POST["finishRecipe"])){
    $sql = "INSERT INTO steps (step_number, instruction, recipe_ID)
            VALUES (80, '" .$_POST['stepInstructions']. "', '" .$recipeID. "')" ;
    $result = $conn->query($sql);
    header("Location:myRecipes.php");
    exit;
  }

  $conn->close();
  //header("Location:addIngredient.php");
  //exit;
  ?>
</body>

</html>
