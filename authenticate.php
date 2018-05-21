<?php
require 'connect.php';
session_start();

if(isset($_POST['userName']))
{
	$userName = $_POST['userName'];
}

if(isset($_POST['password']))
{
	$password = $_POST['password']; 
}

$q = 'SELECT * FROM user WHERE userName=:userName';
$query = $db->prepare($q);
$query->execute(array(':userName' => $userName));
$row = $query->fetch(PDO::FETCH_ASSOC);

if($query->rowCount() == 0)
{
	header('Location: login.php?err=1');
}
else{
	$hashPswdCheck = password_verify($password, $row['password']);
	
	if($hashPswdCheck == 0){
		header('Location: login.php?err=1');
		exit();
	}elseif($hashPswdCheck == 1)
	
	$_SESSION['sess_user_id'] = $row['userId'];
	$_SESSION['sess_username'] = $row['userName'];
	$_SESSION['sess_userrole'] = $row['role'];
	
	if($_SESSION['sess_userrole'] == "suadmin")
	{
		header('Location: Index.php');
	}
	elseif($_SESSION['sess_userrole'] == "Admin")
	{
		header('Location: Index.php');
	}
	else{
		header('Location: Index.php');
	}
	
}