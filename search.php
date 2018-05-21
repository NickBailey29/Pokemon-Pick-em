<?php
session_start();
include('connect.php');
if(isset($_POST['search']))
{
	$q = $_POST['srch_query']; //search query of user saved to the variable q
?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
	.bg-dark {
	  background-color: #EF0408 !important;
	}
	.jumbotron{
			background-color: lightgray;
			width: 124%;
			margin-left: -12%
		}
	</style>

<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-row">
	<ul class="navbar-nav bd-navbar-nav flex-row">
  	<li class="nav-item">
	  <a class="nav-link active" href="Index.php">Home</a>
	</li>
	</nav>
</header>	

<body style="background-color:#F89799">
<main role="main" class="container">
<div class="jumbotron">
<center>
<h1>Pokemon Pick'em</h1>
<form method="post" action="">
	<input type="text" name="srch_query" value="<?php echo $q ?>" required>
	<input type="submit" name="search" value="Search">
</form>

<a class="btn btn-primary" href="add.php">Add new Pokemon</a>
<a class="btn btn-primary" style="" href="myTeam.php">View My Team</a><br>
</center>
<?php


	$search = $db->prepare("SELECT * FROM pokemon
								WHERE pokemonName LIKE '%$q%' OR 
									  pokedexNo LIKE '%$q%' OR
									  type1 LIKE '%$q%' OR
									  type2 LIKE '%$q%'
									  ");
	$search->execute();



if($search->rowcount()==0){ echo "No match found:"; }

else //echo results
{
	echo "Search Result:<br/>";?>

    <table class="table" border="1" cellspacing="0" cellpadding="4" >
    	<thead class="table-dark">
	 	<tr><th scope="row"> Pokedex Number </th>
	 		<th> Picture </th>
	 		<th> Name </th>
			<th> Ability 1 </th>
			<th> Ability 2 </th>
			<th> Type 1 </th>
			<th> Type 2 </th>
			<th> HP </th>
			<th> Atk </th>
			<th> Def </th>
			<th> Sp. Atk </th>
			<th> Sp. Def </th>
			<th> Speed </th>
			<th>Add to team</th>
			<th width="50%">Options</th>
		</thead>
	<tbody>
		<?php foreach($search as $s)
	{
		?>
		<tr class="record">
				<td><?php echo $s['pokedexNo']; ?></td>
				<td colspan="1" align="center">
					<img src="pokeImages/<?php echo $s['picName']; ?>" >
				</td>
				<td><?php echo $s['pokemonName']; ?></td>
				<td><?php echo $s['ability1']; ?></td>
				<td><?php echo $s['ability2']; ?></td>
				<td><?php echo $s['type1']; ?></td>
				<td><?php echo $s['type2']; ?></td>
				<td><?php echo $s['hp']; ?></td>
				<td><?php echo $s['atk']; ?></td>
				<td><?php echo $s['def']; ?></td>
				<td><?php echo $s['spA']; ?></td>
				<td><?php echo $s['spD']; ?></td>
				<td><?php echo $s['spe']; ?></td>
				<td>
					<button type="button" class="btn btn-success btn-sm"><a style="color:black" href="addToTeam.php?pokedexNo=<?php echo $s['pokedexNo']; ?>"> Add </a>&nbsp;
				</button>
				</td>
			<td>
				<button type="button" class="btn btn-warning btn-sm"><a style="color:black" href="editform.php?pokedexNo=<?php echo $s['pokedexNo']; ?>"> Edit </a>&nbsp;
				</button>
				<button type="button" class="btn btn-danger btn-sm"><a style="color:black" href="delete.php?pokedexNo=<?php echo $s['pokedexNo']; ?>"> Delete</a>
				</button>
			</td>
		</tr>
	<?php }
}
}?> </tbody></table></br/><br/>
</main>
</div>
</body>
</html>