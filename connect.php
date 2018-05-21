<?php
/*database config*/
$iniParse = parse_ini_file("../secureConnect.ini",true);

$current = $iniParse["currentEnv"]["data"];

$db_host		= $iniParse[$current]['server'];
$db_user		= $iniParse[$current]['user'];
$db_pass		= $iniParse[$current]['password'];
$db_database	= $iniParse[$current]['database'];

$db = new PDO('mysql:host='.$db_host.';
					dbname='.$db_database,
			  		$db_user, $db_pass);
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>