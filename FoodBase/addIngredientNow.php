<html>
<body>

  <?php
  session_start();
  $userID = $_SESSION['user_ID'];

  $servername = "dbm2.itc.virginia.edu";
  $username = "Foodbase";
  $password = "Foodbase";
  $dbname = "Foodbase";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT ingredient_name FROM ingredient WHERE ingredient_name='".$_POST['ingredient_name']."' AND type_of_food='".$_POST['type_of_food']."'";
  $result = $conn->query($sql);

  if ($result->num_rows == 0){
    $sql = "INSERT INTO ingredient (ingredient_name, type_of_food)
    VALUES ('" .$_POST['ingredient_name']. "', '" .$_POST['type_of_food']. "')" ;
    $result = $conn->query($sql);
  }
  else{
  }

  $sql = "SELECT ingredient_ID FROM ingredient
  WHERE ingredient_name = '" .$_POST['ingredient_name']."'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc())
  {
    $ingredientID =  $row['ingredient_ID'];
  }

  $quantity = $_POST['ingredient_quantity'];
  $unit = $_POST['ingredient_unit'];

  $sql = "INSERT INTO ing_inventory (ingredient_ID, inventory_ID, quantity, unit)
  VALUES ($ingredientID, $userID, $quantity , '".$unit."')";
  echo $sql;
  $result = $conn->query($sql);

  $conn->close();
  header("Location:addIngredient.php");
  exit;
  ?>

</body>
</html>
