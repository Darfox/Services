<?php
$repPages = "pages/";
$listCat = array(	'admin'			=> 'admin',
					'helpdesk'		=> 'helpdesk',
					'monitoring'	=> 'monitoring',
					'account'		=> 'account'
				);

if (!empty($_GET['c']))
{
	$cat = htmlentities($_GET['c']);
	if (!empty($_GET['f']))
	{
		$function = htmlentities($_GET['f']);
		if (file_exists($repPages . "/" . $cat . "/" . $function . ".php"))
			include ($repPages . "/" . $cat . "/" . $function . ".php");
		else
			include ($repPages . "default/404.php");
	}
	else
	{
		if (array_key_exists($cat, $listCat))
			include ($repPages . $cat . "/index.php");
		else
			include ($repPages . "default/404.php");
	}
}
else include ($repPages . 'default/index.php');
?>