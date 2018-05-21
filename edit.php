<?php
include('connect.php');

$picName = htmlspecialchars($_POST['picName']);
$pokemonName = htmlspecialchars($_POST['pokemonName']);
$ability1 = htmlspecialchars($_POST['ability1']);
$ability2 = htmlspecialchars($_POST['ability2']);
$type1 = htmlspecialchars($_POST['type1']);
$type2 = htmlspecialchars($_POST['type2']);
$hp = htmlspecialchars($_POST['hp']);
$atk = htmlspecialchars($_POST['atk']);
$def = htmlspecialchars($_POST['def']);
$spA = htmlspecialchars($_POST['spA']);
$spD = htmlspecialchars($_POST['spD']);
$spe = htmlspecialchars($_POST['spe']);
$pokedexNo = htmlspecialchars($_POST['mempokedexNo']);

//query
move_uploaded_file( $_POST['picName'], "pokeImages/");

$sql = "UPDATE pokemon
		SET picName=?, pokemonName=?, ability1=?, ability2=?, type1=?, type2=?, hp=?, atk=?, def=?, spA=?, spD=?, spe=?
		WHERE pokedexNo=?";

$q = $db->prepare($sql);
$q->execute(array($picName,$pokemonName,$ability1,$ability2,$type1,$type2,$hp,$atk,$def,$spA,$spD,$spe,$pokedexNo));
header("location: Index.php"); ?>