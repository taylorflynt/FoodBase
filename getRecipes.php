
<?php
$servername = "dbm2.itc.virginia.edu";
$username = "Foodbase";
$password = "Foodbase";
$dbname = "Foodbase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT recipe_name FROM recipe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Recipe Name: " . $row["recipe_name"]. "<br><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
//echo "Connected successfully";
?>
