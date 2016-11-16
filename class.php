<?php

class Auto{
	private $name;
	private $farbe;
	private $kraftstoff;
	private $bauart;
	public $Counter = 0;
	private $daten;
	private $antwort;
	private $code;
	private $conn;
	
	function __construct() {
		$this->betankungen = 1;
		$this->daten = true;
		$this->antwort = 'Alles ok!';
		$this->code = 200;
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database1";
		// Create connection
		$this->conn = new mysqli($servername, $username, $password, $dbname);

	}
	
	
	public function setName($ks){
		$this->name = $ks;
	}
	
	public function setFarbe($ks){
		$this->farbe = $ks;
	}
	
	public function setKraftstoff($ks){
		$this->kraftstoff = $ks;
	}
	
	public function setBauart($ks){
		$this->bauart = $ks;
	}
	
	public function speichereAuto(){

		$this->daten = array();
      $sql = "SELECT * FROM privat";
      $result = $this->conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          $this->status = 200;
          while($row = $result->fetch_assoc()) {
              $this->daten[] = $row;
          }
      } else {
          $this->status = 401;
          $this->daten = false;
      }
      //include('dbinsert.php');
      $sql = "INSERT INTO privat (name, bauart, kraftstoff, farbe)
              VALUES ('$this->name', '$this->bauart', '$this->kraftstoff', '$this->farbe')";

      if ($this->conn->query($sql) === TRUE) {
          $this->status = 200; 
      } else {
		  $this->status = 401;
          echo "Fehler: " . $sql . "<br>" . $conn->error;
      }

        http_response_code($this->code);
        echo json_encode($this->daten);
}
	
	
	public function zeigeAuto() {
	if($this->daten) {	
		$this->daten = array(
				'status' => true,
				'antwort' => $this->antwort,
				'name' => $this->name,
				'farbe' => $this->farbe,
				'bauart' => $this->bauart,
				'kraftstoff' => $this->kraftstoff
		);
	} else{
		$this->code = 401;
		$this->antwort = 'Nichts OK!';
		$this->daten = array(
		'status' => false, 
		'antwort' => $this->antwort
		);
	}
	http_response_code($this->code);
	echo json_encode($this->daten, $this->code);
	}
	
	public function tankDeckelOeffnen($ks){
		$_SESSION['betankungen']++;
		$this->Counter++;
	}
}

?>