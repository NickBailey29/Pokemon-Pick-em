<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
	<style>
	.bg-dark {
	  background-color: #EF0408 !important;
	}
	.jumbotron{
			background-color: lightgray;
			width: 1400px;
			margin-left: -12%
		}
	</style>

    <title>Pokemon Pick'em</title>
  </head>
  <header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-row">
	<ul class="navbar-nav bd-navbar-nav flex-row">
  	<li class="nav-item">
	  <a class="nav-link active" href="\Project1\capstone\capstoneIndex.php">Home</a>
	</li>
   </nav>
   </header>
   <body style="background-color:#F89799">
   <main role="main" class="container">
    <center>
     <div class="jumbotron">
    	<h1>Pokemon Pick'em</h1>
    	
    	<form method = "post" action="search.php">
	 		<input type="text" name="srch_query" placeholder="Search here..." required>
	 		<input type="submit" name="search" value="search">
	 	</form>
   		<a class="btn btn-primary" href="add.php">Add New Pokemon</a><br>
   		<a class="btn btn-primary" href="myTeam.php">View My Team</a><br>

    	
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
			<th width="150px">Options</th>
		</thead>
		<tbody>
			<?php include('connect.php');
			$result = $db->prepare("SELECT * FROM pokemon ORDER BY pokedexNo ASC");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++)
			{?>
			<tr class="record">
				<td><?php echo $row['pokedexNo']; ?></td>
				<td colspan="1" align="center">
					<img src="pokeImages/<?php echo $row['filename']; ?>" >
				</td>
				<td><?php echo $row['pokemonName']; ?></td>
				<td><?php echo $row['ability1']; ?></td>
				<td><?php echo $row['ability2']; ?></td>
				<td><?php echo $row['type1']; ?></td>
				<td><?php echo $row['type2']; ?></td>
				<td><?php echo $row['hp']; ?></td>
				<td><?php echo $row['atk']; ?></td>
				<td><?php echo $row['def']; ?></td>
				<td><?php echo $row['spA']; ?></td>
				<td><?php echo $row['spD']; ?></td>
				<td><?php echo $row['spe']; ?></td>
				<td><button type="submit" name="addToTeambtn" value="Add Item" class="btn btn-success btn-sm"><a style="color:black" href="addToTeam.php?pokedexNo=<?php echo $row['pokedexNo']; ?>"> Add</a>&nbsp;
				</button>
				</td>
				<td><button type="button" class="btn btn-warning btn-sm"><a style="color:black" href="editform.php?pokedexNo=<?php echo $row['pokedexNo']; ?>"> Edit </a>&nbsp;
				</button>
				<button type="button" class="btn btn-danger btn-sm"><a style="color:black" href="delete.php?pokedexNo=<?php echo $row['pokedexNo']; ?>"> Delete </a>
				</button>
			</td>
			</tr>
			<?php } ?>
		</tbody>
		</table><br/> 
	 	<br/>
	 </div>
	 </center>
	 
	 <!--Search Box-->

	 

   </main>
   </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</html>