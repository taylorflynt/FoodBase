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

  $sql = "SELECT cuisine_name FROM cuisine WHERE upper(cuisine_name) = upper('".$_POST['cuisine_name']."')";
  $result = $conn->query($sql);

  if ($result->num_rows == 0){
    $sql = "INSERT INTO cuisine (cuisine_name)
    VALUES ('" .$_POST['cuisine_name']. "')" ;
    $conn->query($sql);
  }
  else{
  }

  $conn->close();
  header("Location:addCuisine.php");
  exit;
  ?>

</body>
</html>
