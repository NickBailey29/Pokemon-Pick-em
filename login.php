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
	session_start();
	error_reporting(0);
		$role = $_SESSION['sess_userrole'];
		
		if(!isset($_SESSION['sess_userrole']) && $role!="null"){
			echo'	<li class="nav-item">
			<a class="nav-link active" href="login.php">Sign In</a>
			</li>';
			echo'	<li class="nav-item">
			<a class="nav-link" href="signup.php">Sign Up</a>
			</li>';
		}
		elseif($_SESSION['sess_userrole'] == "user"){
				echo '<li class="nav-item">
				<a class="nav-lin" href="logout.php">Logout</a>
				</li>';
			}
  	?>
   </nav>
   </header>
   <body style="background-color:#F89799">
   <main role="main" class="container">
    <center>
     <div class="jumbotron">

      <form action="authenticate.php" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only"></label>
        <input type="email" name="userName"  class="form-control" placeholder="Email Address" required autofocus>
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" name="password"  class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

    <?php
// Associative array to display 2 types of errr messages.
$errors = array(1=> "Invalid user name or password, Try again",
			    2=> "Please login to access this area",
			    3=> "You are logged in");

$error_id = $_GET['err'];
if ($error_id ==1)
{
	echo '<p class="text-danger">'.$errors[$error_id].'</p>';
} 
elseif ($error_id == 2)
{
	echo '<p class="text-danger">'.$errors[$errors_id].'</p>';
}
elseif ($error_id == 3)
{
							
	echo '<p>'.$errors[$error_id].'<p>';
}
?>

    <!-- Optional JavaScript -->
    <script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
	</script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
