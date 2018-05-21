<?php
if(isset($_POST['addbtn']))
{
	try
	{
		include('connect.php');
		$stmt = $db->prepare("INSERT INTO pokemon(pokedexNo, picName, pokemonName, ability1, ability2, type1, type2, hp, atk, def, spA, spD, spe)
					VALUES(:PokedexNo,:PicName,:PokemonName,:Ability1,:Ability2,:Type1,:Type2,:HP,:ATK,:DEF,:SpA,:SpD,:SPE)");
		$stmt->execute(array("PokedexNo" => htmlspecialchars($_POST['Pokedex_No']),
							 "PicName" => htmlspecialchars($_POST['Pic_Name']),
							 "PokemonName" => htmlspecialchars($_POST['Pokemon_Name']),
							 "Ability1" => htmlspecialchars($_POST['Ability_1']),
							 "Ability2" => htmlspecialchars($_POST['Ability_2']),
							 "Type1" => htmlspecialchars($_POST['Type_1']),
							 "Type2" => htmlspecialchars($_POST['Type_2']),
							 "HP" => htmlspecialchars($_POST['HP_']),
							 "ATK" => htmlspecialchars($_POST['ATK_']),
							 "DEF" => htmlspecialchars($_POST['DEF_']),
							 "SpA" => htmlspecialchars($_POST['Sp_A']),
							 "SpD" => htmlspecialchars($_POST['Sp_D']),
							 "SPE" => htmlspecialchars($_POST['SPE_']),
							));
		echo "Registration Successful!";
		move_uploaded_file( $_POST["Pic_Name"], "pokeImages/");

	}
	catch(PDOException $e)
	{
		echo 'ERROR: ' . $e->getMessage();
	}
}
?>
<!--Bootstrap linking-->



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- in line css-->

<style>
	.bg-dark {
	  background-color: #EF0408 !important;
	}
	.jumbotron{
			background-color: lightgray ;
			width: 80%;
		}
</style>
 <header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-row">
	<ul class="navbar-nav bd-navbar-nav flex-row">
  	<li class="nav-item">
	  <a class="nav-link active" href="Index.php">Home</a>
	</li>

 </nav>
<!--body for adding info-->
<form method="post" action="">
<main role="main" class="container">
<div class="jumbotron">
<h3>Add an item</h3>
<table>
	<tr>
		<td>Pokedex Number</td>
		<td><input type="text" name="Pokedex_No" required></td>
	</tr>
	<tr>
		<td>Picture</td>
		<td><input type="file" name="Pic_Name" ></td>
	</tr>
	<tr>
		<td>Pokemon Name</td>
		<td><input type="text" name="Pokemon_Name" required></td>
	</tr>
	<tr>
		<td>Ability 1</td>
		<td><input type="text" name="Ability_1" required></td>
	</tr>
	<tr>
		<td>Ability 2</td>
		<td><input type="text" name="Ability_2" ></td>
	</tr>
	<tr>
		<td>Type 1</td>
		<td><input type="text" name="Type_1" required></td>
	</tr>
	<tr>
		<td>Type 2</td>
		<td><input type="text" name="Type_2" ></td>
	</tr>
	<tr>
		<td>HP</td>
		<td><input type="text" name="HP_" required></td>
	</tr>
	<tr>
		<td>ATK</td>
		<td><input type="text" name="ATK_" required></td>
	</tr>
	<tr>
		<td>DEF</td>
		<td><input type="text" name="DEF_" required></td>
	</tr>
	<tr>
		<td>Special ATK</td>
		<td><input type="text" name="Sp_A" required></td>
	</tr>
	<tr>
		<td>Special DEF</td>
		<td><input type="text" name="Sp_D" required></td>
	</tr>
	<tr>
		<td>Speed</td>
		<td><input type="text" name="SPE_" required></td>
	</tr>
	<tr><td></td>
		<td><input type="submit" name="addbtn" value="Add Item"></td>
		</tr>
</table>
<a class="btn btn-primary" href = "Index.php" role="button">View</a><br/>
</div>
</main>	
</form>