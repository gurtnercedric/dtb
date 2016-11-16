 <?php
 
 include='ajax.php';
 
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "SELECT * FROM privat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["ID"]. "<br>- Name: " . $row["$name"]. "<br>- bauart: " . $row["$bauart"]. "<br>- kraftstoff: " . $row["$kraftstoff"]. "<br>- farbe: " . $row["$farbe"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?> 