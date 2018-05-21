<?php
	include('connect.php');
	$pokedexNo=$_GET['pokedexNo'];
	$result = $db->prepare("SELECT * FROM pokemon WHERE pokedexNo= :pokemonNo");
	$result->bindParam(':pokemonNo', $pokedexNo);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++) {
	?>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
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
			<a class="nav-link active" href="Index.php">Capstone Home</a>
		</li>
	</ul>
    </nav>
    </header>
	<body>
    <main role="main" class="container">
    <div class="jumbotron">
		<form action="edit.php" method="POST">
			<input type="hidden" name="mempokedexNo" value="<?php echo $pokedexNo; ?>" />
			
			Picture<br/>
			<input type="file" name="picName" value="<?php echo $row['picName']; ?>" /><br/>
			
			Pokemon Name<br/>
			<input type="text" name="pokemonName" value="<?php echo $row['pokemonName']; ?>" /><br/>
			
			Ability 1<br/>
			<input type="text" name="ability1" value="<?php echo $row['ability1']; ?>" /><br/>
			
			Ability 2<br/>
			<input type="text" name="ability2" value="<?php echo $row['ability2']; ?>" /><br/>
			
			Type 1<br/>
			<input type="text" name="type1" value="<?php echo $row['type1']; ?>" /><br/>
			
			Type 2<br/>
			<input type="text" name="type2" value="<?php echo $row['type2']; ?>" /><br/>
			
			HP<br/>
			<input type="text" name="hp" value="<?php echo $row['hp']; ?>" /><br/>
						
			ATK<br/>
			<input type="text" name="atk" value="<?php echo $row['atk']; ?>" /><br/>
						
			DEF<br/>
			<input type="text" name="def" value="<?php echo $row['def']; ?>" /><br/>
						
			Special ATK<br/>
			<input type="text" name="spA" value="<?php echo $row['spA']; ?>" /><br/>
						
			Special DEF<br/>
			<input type="text" name="spD" value="<?php echo $row['spD']; ?>" /><br/>
						
			Speed<br/>
			<input type="text" name="spe" value="<?php echo $row['spe']; ?>" /><br/>
			<input type="submit" value="Save" />
		</form>
	</div>
	</main>
	</body>
</html>
<?php } ?>