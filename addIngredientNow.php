<html>
<body>

  <?php

  $servername = "dbm2.itc.virginia.edu";
  $username = "Foodbase";
  $password = "Foodbase";
  $dbname = "Foodbase";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "INSERT INTO ingredient (ingredient_name, type_of_food)
  VALUES ('" .$_POST['ingredient_name']. "', '" .$_POST['type_of_food']. "')" ;
  //$result = $conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    echo '<script> alert(\'Ingredient added successfully!\') </script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  header("Location:addIngredient.php");
  exit;
  ?>

</body>
</html>
