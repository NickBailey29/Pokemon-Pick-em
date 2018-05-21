 <?php 
	require 'connect.php';
			


if(isset($_POST['userName']))
{ $userName = $_POST['userName'];}

if(isset($_POST['password']))
{ $password = $_POST['password'];}

if(isset($_POST['password1']))
{ $password1 = $_POST['password1'];}

if($password == $password1){
				$hashed = password_hash($password, PASSWORD_DEFAULT);

$q = "INSERT into user (userName, password, role) VALUES ('$userName', '$hashed', 'user')";
$query = $db->prepare($q);
$query->execute();
	
	header('Location: signup.php?err=3');
	exit();
}

else {
	

		header('Location: signup.php?err=1');
		exit();
	
}
		?>