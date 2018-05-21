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
			width: 80%;
			margin-left: -12%
		}
	</style>

    <title>Pokemon Pick'em</title>
  </head>
  <header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-row">
	<ul class="navbar-nav bd-navbar-nav flex-row">
  	<li class="nav-item">
	  <a class="nav-link" href="\Project1\capstone\Index.php">Home</a>
	</li>
  <?php
  	require 'connect.php';
			
			error_reporting(0);
			$role = $_SESSION['sess_userrole'];

			if(!isset($_SESSION['sess_userrole']) && $role!="null"){
				echo '<li class="nav-item">
            	<a  class="nav-link" href="login.php">Sign In</a>
				</li>
		  		<li class="nav-item">
            	<a class="nav-link active" href="signup.php">Sign Up</a>
          		</li>';
			}
			elseif ($_SESSION['sess_userrole'] == "user") 
			{
				echo '<li class="nav-item">
            	<a class="nav-link" href="logout.php">Logout</a>
          		</li>';
			}

    
               ?>
        </ul>
    
      </div>
    </nav>
  </li>
   </nav>
   </header>
   <body style="background-color:#F89799">
   <main role="main" class="container">
    <center>

              
    <div class="jumbotron">
    
    <?php
// Associative array to display 3 types of errr messages.
$errors = array(1=> "Invalid username or password, Try again",
			    2=> "Please login to access this area",
			   3=> "Congratulations, signup successful");

$error_id = $_GET['err'];
if ($error_id == 1)
{
	echo '<p class="text-danger">'.$errors[$error_id].'</p>';
} 
elseif ($error_id == 2)
{
	echo '<p class="text-danger">'.$errors[$error_id].'</p>';
}
elseif ($error_id == 3)
{
							
	echo '<p>'.$errors[$error_id].'</p>';
}
?>
               

<form action="passwordHash.php" method="POST" 
class="form-signin col-md-8 col-md-offset-2" role="form">
  
    <h1 class="h3 mb-3 font-weight-normal">Please Create an Account</h1>  
   <input type="email" name="userName" class="form-control" placeholder="Email" required autofocus><br/>
   <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
     <input type="password" name="password1" class="form-control" placeholder="Re-enter Password" required><br/>
   <button class="btn btn-lg  btn-success" type="submit">Sign up</button>
</form>

   </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


	</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
