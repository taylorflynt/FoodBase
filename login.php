<html>
<head>
  <title>Foodbase</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <h1>Welcome to FoodBase!</h1>

  <br>
  <h2>Login</h2><br>
  <form method="post">
    <select name="inventory_name" style="width:300px">
      <?php
      $servername = "dbm2.itc.virginia.edu";
      $username = "Foodbase";
      $password = "Foodbase";
      $dbname = "Foodbase";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT name FROM inventory";
      $result = $conn->query($sql);
      //echo "<option> </option>";
      while($row = $result->fetch_assoc())
      {
        echo "<option>" . $row['name'] . "</option>";
      }
      // Close menu form
      $menu = "</select>";
      // Output dropdown menu
      echo $menu;
      $conn->close();
      ?>
      <br><br>
      <input type="password" name="userPassword" value=""><br><br>
      <input type="submit" name="loginUser" value="Login">
    </form>

    <h2>Create New Inventory</h2>
    <form method="post">
      Name:<br>
      <input type="text" name="newUserName" value=""><br><br>
      Password:<br>
      <input type="password" name="newUserPassword" value=""><br><br>
      <input type="submit" name="createNewAccount" value="Create New Inventory">
    </form>


    <?php

    $servername = "dbm2.itc.virginia.edu";
    $username = "Foodbase";
    $password = "Foodbase";
    $dbname = "Foodbase";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["loginUser"])){

      $inventoryName = $conn->escape_string($_POST['inventory_name']);

      if ($_POST['userPassword'] == 'password'){

        $sql = "SELECT inventory_ID FROM inventory
        WHERE name = '"  .$inventoryName. "'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc())
        {
          $inventoryID =  $row['inventory_ID'];
        }

        session_start();
        $_SESSION['user_ID'] = $inventoryID;
        header("location:myRecipes.php");
        exit;
      }

      else{
        echo"<script> alert('Incorrect password'); </script>";
      }
    }

    else if (isset($_POST['createNewAccount'])){
      //insert into list, inventory

      $sql = "INSERT INTO shoppingList (name)
      VALUES ('".$_POST['newUserName']."')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO inventory (name)
      VALUES ('".$_POST['newUserName']."')";
      $result = $conn->query($sql);

    $sql = "SELECT inventory_ID FROM inventory
    WHERE name = '"  .$_POST['newUserName']. "'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc())
    {
      $inventoryID =  $row['inventory_ID'];
    }

      session_start();
      $_SESSION['user_ID'] = $inventoryID;
      header("location:myRecipes.php");
      exit;
    }

    $conn->close();
    ?>
  </body>

  </html>
