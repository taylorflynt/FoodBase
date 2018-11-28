<?php
$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cuisine_ID FROM cuisine
WHERE cuisine_name = '" .$_POST['cuisine_name']. "'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
  $cuisineID =  $row['cuisine_ID'];
}

$sql2 = "INSERT INTO recipe (recipe_name, cuisine_ID)
VALUES ('" .$_POST['recipe_name']. "', " .$cuisineID. ")" ;
if ($conn->query($sql2) === TRUE) {
  //echo '<script> alert(\'Recipe added succesffully!\') </script>';
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql = "SELECT recipe_ID FROM recipe WHERE recipe_name = '" .$_POST['recipe_name']. "'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
  $recipeID =  $row['recipe_ID'];
}

$conn->close();
session_start();
$_SESSION['recipe_ID'] = $recipeID;
header("Location:addRecipeIngredients.php");
exit;
?>
