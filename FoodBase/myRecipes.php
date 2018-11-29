<html>
<head>
  <title>Foodbase</title>
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
  <h2>My Recipes</h2>
  <form action="#" method="post">
    <select name="color" style="width:300px">

      <?php

      $servername = "dbm2.itc.virginia.edu";
      $username = "Foodbase";
      $password = "Foodbase";
      $dbname = "Foodbase";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT recipe_name FROM recipe";
      $result = $conn->query($sql);
      //echo "<option> </option>";
      while($row = $result->fetch_assoc())
      {
        echo "<option>" . $row['recipe_name'] . "</option>";
      }
      // Close menu form
      $menu = "</select>";
      // Output dropdown menu
      echo $menu;
      $conn->close();
      ?>
      <br>
      <input type="submit" name="submit" value="Get recipe details">
    </form>
    <br><br>
    <h2>Recipes You Can Make</h2>
    <form action="#" method="post">
      <select name="color" style="width:300px">

        <?php
        $servername = "dbm2.itc.virginia.edu";
        $username = "Foodbase";
        $password = "Foodbase";
        $dbname = "Foodbase";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT recipe_name FROM possible_recipes";
        $result = $conn->query($sql);
        //echo "<option> </option>";
        while($row = $result->fetch_assoc())
        {
          echo "<option>" . $row['recipe_name'] . "</option>";
        }
        $menu = "</select>";
        // Output dropdown menu
        echo $menu;
        $conn->close();
        ?>
        <br>
        <input type="submit" name="submit" value="Get recipe details">
      </form>
      <?php
      if(isset($_POST['submit'])){
        $selected_val = $_POST['color'];
        session_start();
        $_SESSION['selected_val'] = $selected_val;
        header("Location:getRecipeDetails.php");
        exit;
      }
      ?>
      <br><br>


    </body>

    </html>
