<?php
session_start();
$userID = $_SESSION['user_ID'];

$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";

$conn = new mysqli($servername, $username, $password, $dbname);

$ingredientID = $_GET['id'];


$sql = "DELETE from ing_inventory WHERE inventory_ID = ".$userID." AND ingredient_ID = ".$ingredientID."";
$result = $conn->query($sql);
$conn->close();

header("Location: myIngredients.php");
exit;
?>
