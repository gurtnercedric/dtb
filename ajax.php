<?php
session_start();
include('class.php');

  $name = trim(htmlspecialchars($_POST['name']));
  $farbe = trim(htmlspecialchars($_POST['farbe']));
  $bauart = trim(htmlspecialchars($_POST['bauart']));
  $kraftstoff = trim(htmlspecialchars($_POST['kraftstoff']));

	
	
	
    $auto = new Auto;
	$auto->setName($name);
	$auto->setFarbe($farbe);
	$auto->setBauart($bauart);
	$auto->setKraftstoff($kraftstoff);
	$auto->speichereAuto();
	//$auto->zeigeAuto();
	
	
	
 
 ?>
