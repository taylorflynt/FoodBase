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

  $sql = "SELECT ingredient_ID FROM ingredient WHERE upper(ingredient_name)=upper('".$_POST['ingredient_name']."') AND upper(type_of_food) = upper('".$_POST['type_of_food']."')";
  $result = $conn->query($sql);

  if ($result->num_rows == 0){
    $sql = "INSERT INTO ingredient (ingredient_name, type_of_food)
    VALUES ('" .$_POST['ingredient_name']. "', '" .$_POST['type_of_food']. "')" ;
    $conn->query($sql);
  }

  $sql = "SELECT ingredient_ID FROM ingredient WHERE upper(ingredient_name)=upper('".$_POST['ingredient_name']."') AND upper(type_of_food) = upper('".$_POST['type_of_food']."')";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc())
  {
    $ingredientID =  $row['ingredient_ID'];
  }

  $sql = "SELECT * FROM list_ingredient WHERE ingredient_ID = " .$ingredientID." AND list_ID = " .$userID ."";
  $result = $conn->query($sql);

  if ($result->num_rows == 0){
    $sql = "INSERT INTO list_ingredient (ingredient_ID, list_ID, quantity, unit)
    VALUES ('" .$ingredientID. "', '" .$userID. "', '" .$_POST['ingredient_quantity']. "', '" .$_POST['ingredient_unit']. "')" ;
  }
  else{
    $sql = "UPDATE list_ingredient SET quantity = quantity + " . $_POST['ingredient_quantity'] . " WHERE ingredient_ID = " .$ingredientID . " AND list_ID = " . $userID;
  }

  $result = $conn->query($sql);
  $conn->close();
  header("Location:myList.php");
  exit;
  ?>

</body>
</html>
