<?php
$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";

$conn = new mysqli($servername, $username, $password, $dbname);

$recipeID = $_GET['recipe_id'];

$sql = "DELETE from recipe WHERE recipe_ID = ".$recipeID."";
$result = $conn->query($sql);

$sql = "DELETE from steps WHERE recipe_ID = ".$recipeID."";
$result = $conn->query($sql);

$sql = "DELETE from recipe_ingredient WHERE recipe_ID = ".$recipeID."";
$result = $conn->query($sql);

$conn->close();
header("Location: myRecipes.php");
exit;
 ?>
