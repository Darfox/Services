<?php
session_start();
if (empty($_SESSION['username']))
	header('Location: /login');

if ($_GET['c'] == 'admin')
{
	if ($_SESSION['role'] != 1)
		header('Location: /');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php require_once ("functions/config.inc.php"); ?>
 <head>
  <title><?=$siteTitle . getTitle($_GET['c']);?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="/css/default.css" />
  <link rel="stylesheet" type="text/css" href="/css/menu.css" />
<!--[if IE 6]>
<style>
body {behavior: url("/css/csshover3.htc");}
#menu li .drop {background:url("/images/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
  <link rel="stylesheet" type="text/css" href="/css/jformer.css" />
  <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables_themeroller.css" />
  <link rel="stylesheet" type="text/css" href="/css/smoothness/jquery-ui.custom.css" />
  <script type="text/javascript" language="javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="/js/jquery-ui.min.js"></script>
  <script type="text/javascript" language="javascript" src="/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="/js/default.js"></script>
  <script type="text/javascript" language="javascript" src="/js/jFormer.js"></script>
 </head>
 <body>
 
	<div id="wrapper">
		<div id="header">
			<div id="hLogo"></div>
		</div>
		<?php include 'functions/menu.inc.php'; ?>
		<div id="content">
			<?php require_once ('functions/pages.inc.php'); ?>
		</div>
		<div id="footer">Copyright &copy; Damien Talec 2011-2012 <?=getTitle();?></div>
	</div>

 </body>
</html>

<?php mysql_close(); ?>