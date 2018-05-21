<?php
	include('connect.php');
	$pokedexNo=$_GET['pokedexNo'];
	$result = mysqli_query($con,"SELECT pokedexNo, picName, pokemonName FROM pokemon WHERE pokedexNo='$pokedexNo'");
	//$result->execute(array(":pokedexNo",":filename",":pokemonName"));
	$row = mysqli_fetch_assoc($result);
	$picName = $row['picName'];
	$pokemonName = $row['pokemonName'];

	$addResult = mysqli_query($con,"INSERT INTO pokemonteam(pokedexNo,picName,pokemonName) VALUES('$pokedexNo','$picName','$pokemonName')");
	//$addResult->execute(array(":pokedexNo"=>$pokedexNo,":filename"=>$filename,":pokemonName"=>$pokemonName));
	echo $pokemonName;
	echo $pokedexNo;
	echo $picName;
	echo "Pokemon successfully added to team!";
	header("location: myTeam.php")
	
?>
