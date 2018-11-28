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

  $sql = "INSERT INTO cuisine (cuisine_name)
  VALUES ('" .$_POST['cuisine_name']. "')" ;
  $conn->query($sql);

  $conn->close();
  header("Location:addCuisine.php");
  exit;
  ?>

</body>
</html>
