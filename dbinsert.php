 <?php
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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Verbindung OK";
	$sql = "INSERT INTO privat (name, bauart, kraftstoff, farbe)
			VALUES ('Golf 5 gti', 'Cabrio', 'Benzin', '#fff111')";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?> 