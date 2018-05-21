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
			width: 70%;
			margin-left: -12%
		}
	</style>

    <title>Pokemon Pick'em</title>
  </head>
  <header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-row">
	<ul class="navbar-nav bd-navbar-nav flex-row">
  	<li class="nav-item">
	  <a class="nav-link active" href="\Project1\capstone\Index.php">Home</a>
	</li>
   </nav>
   </header>
   <body style="background-color: #F89799">
   <main role="main" class="container">
    <center>
     <div class="jumbotron">
    	<h1>My Pokemon Team</h1>
    	
   		<a class="btn btn-primary" href="Index.php">Add more pokemon to team</a><br/>

    	
    	<table class="table" border="1" cellspacing="0" >
    	<thead class="table-dark">
	 	<tr><th scope="row"> Pokedex Number </th>
	 		<th> Picture </th>
			<th> Name </th>
			<th>Remove from team</th>
		</thead>
		<tbody>
			<?php include('connect.php');
			$result = $db->prepare("SELECT * FROM pokemonteam ORDER BY pokedexNo ASC");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++)
			{?>
			<tr class="record">
				<td><?php echo $row['pokedexNo']; ?></td>
				<td colspan="1" align="center">
					<img src="pokeImages/<?php echo $row['picName']; ?>" >
				</td>
				<td><?php echo $row['pokemonName']; ?></td>
				<td>
				<center>
				<button onclick="myPrompt()" type="button" class="btn btn-danger btn-sm"><a style="color:black" href="deleteFromTeam.php?pokedexNo=<?php echo $row['pokedexNo']; ?>"> Delete </a>
				</button>
				</center>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		</table><br/> 
	 	<br/>
	 </div>
	 </center>

   </main>
   </body>
   
       <script>
		function myPrompt() {
			confirm("Are you sure you want to delete!");
		}
	  </script>

</html>