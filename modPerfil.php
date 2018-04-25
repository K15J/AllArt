<?php

//Inicio del procesamiento
session_start();


require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/FormularioModPerfil.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/estilo.css') ?>" />
  <title>ModPerfil</title>
</head>
<body>
<div id="contenedor">
<?php
$app->doInclude('comun/cabecera.php');
$app->doInclude('comun/sidebarIzq.php');
?>
	<div id="contenido">
    <?php 
    	$formModPerfil = new \es\ucm\fdi\aw\FormularioModPerfil();
	 	$formModPerfil->gestiona();
	 ?>
	</div>
<?php
$app->doInclude('comun/pie.php');
?>
</div>
</body>
</html>
