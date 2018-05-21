<?php
	include('connect.php');
	$pokedexNo=$_GET['pokedexNo'];
	$result = $db->prepare("DELETE FROM pokemonteam WHERE pokedexNo= :mempokedexNo");
	$result->bindParam(':mempokedexNo', $pokedexNo);
	$result->execute();
	header("location: myTeam.php");
?>