<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/style.css') ?>" />
  <title>Perfil</title>
</head>
<body>
<div id="contenedor">
<?php
$nombreUsuario=htmlspecialchars(trim(strip_tags($_GET['usuario'])));
$usuario=Usuario::buscaUsuario($nombreUsuario);
$app->doInclude('comun/cabecera.php');
//$app->doInclude('comun/sidebarIzq.php');
?>
	<div id="contenido">
    	<?php
            if($usuario!=false){
			    echo "<img src= '" . $usuario->imgPerfil() . "' border='0' width='100' height='100'>";
			    echo "</br>";
			    echo 'Nombre: ' . $usuario->username();
			    echo "</br>";
			    //echo "Email: " . "$usuario->email()";
			    //echo "</br>";
			    echo "Descripción: " . $usuario->descripcion();
			    echo "</br>";
			    echo "Fecha nacimiento: " . $usuario->fechaNac();
			    echo "</br>";
			    $id = $usuario->id();
			    $img = archivo::buscarImagenDest($id);
			    if ($img !== FALSE)
			    {
				    $ruta = $img->ruta();
				    echo "Imagen destacada: ";
				    echo "<img src= '" . $ruta . "' border='0' width='300' height='300'>";
				    echo "</br>";
			    }
			    else
			    {
				    echo $usuario->username() . " no tiene ninguna imagen destacada.";
				    echo "</br></br>";
			    }

			    $numero=10;
			    $archivos = archivo::buscarMejoresArch($id,$numero);
                //var_dump($archivos);
			    if ($archivos !== FALSE)
			    {
				    foreach($archivos as $arch)
				    {
					    
					    $archivo = archivo::buscaArchivo($arch);
					    if($archivo!=false) {
                            $mostradorArchivo = new \es\ucm\fdi\aw\MostradorArchivo($archivo);
                            echo $mostradorArchivo->mostrar() . "</br>";
                        }
				    }
			    } 
            }
            else {
                echo "<p>No se ha encontrado el usuario</p>";
            }
			
		?>
	</div>
<?php
$app->doInclude('comun/pie.php');
?>
</div>
</body>
</html>
