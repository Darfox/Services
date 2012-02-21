<?php
require_once ('/functions/config.inc.php');
extract($_POST);

$sql = "SELECT * FROM users WHERE username='".$user."' LIMIT 1";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

$data = mysql_fetch_assoc($req);

if(!empty($data['password']))
{
	if($data['password'] == $passwd)
	{
		session_start();
		$_SESSION['username'] = $data['username'];
		$_SESSION['firstName'] = $data['firstName'];
		$_SESSION['lastName'] = $data['lastName'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['role'] = $data['role'];
		echo '1';
	}
	else
	{	
		session_destroy();
		echo '0';
	}
}
else
{
	session_destroy();
	echo '0';
}
?>