<?php 

echo "<pre>";
print_r($_POST);
echo "</pre>";

require "../src/db.php";
require "../src/consultas_db.php";


const MAX_LEN_TITULO = 120;
const MAX_LEN_NOMBRE = 20;
const MAX_LEN_CLAVE = 20;
const MAX_LEN_ETIQUETA = 20;

const ERROR_EMPTY = 0;
const ERROR_FORMAT = 1;

$titulo;
$nombre;
$clave;
$etiqueta;

$errores = [];

if(count($_POST)>0){
    
    if(isset($_POST['titulo']) && $_POST['titulo'] != ''){
        $titulo = $_POST['titulo'];
        if(strlen($titulo) > MAX_LEN_TITULO) {
            $errores['titulo'] = ERROR_FORMAT;
        }
    } else {
        $errores['titulo'] = ERROR_EMPTY;
    }

    if(isset($_POST['nombre']) && $_POST['nombre'] != ''){
        $nombre = $_POST['nombre'];
        if(strlen($nombre) > MAX_LEN_NOMBRE) {
            $errores['nombre'] = ERROR_FORMAT;
        }
    } else {
        $errores['nombre'] = ERROR_EMPTY;
    }
  
    if(isset($_POST['clave']) && $_POST['clave'] != ''){
        $clave = $_POST['clave'];
        if(strlen($clave) > MAX_LEN_CLAVE) {
            $errores['clave'] = ERROR_FORMAT;
        }
    } else {
        $errores['clave'] = ERROR_EMPTY;
    }

    if(isset($_POST['etiqueta']) && $_POST['etiqueta'] != ''){
        $etiqueta = $_POST['etiqueta'];
        if(strlen($etiqueta) > MAX_LEN_ETIQUETA) {
            $errores['etiqueta'] = ERROR_FORMAT;
        }
    } else {
        $errores['etiqueta'] = ERROR_EMPTY;
    }
  
    if(count($errores) == 0){
      // Acción
      //  Guardar en base de datos
      $stmt = new Consultas();
      $stmt->insertTema($titulo, $nombre, $clave, $etiqueta);
      header('Location: index.php');
      die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="crearTema.php" method="post">
        <label for="title">Título: </label>
        <input type="text" name="titulo" id="title" value="<?=$titulo?>">
        <?php if(isset($errores['titulo'])) { ?>
            <?php if($errores['titulo'] == ERROR_EMPTY) { ?>
                <span>Por favor introduce el titulo</span>
            <?php }elseif($errores['titulo'] == ERROR_FORMAT) { ?>
              <span>Por favor introduce 120 o menos caracteres</span>
            <?php } ?>
        <?php } ?>
        <br><br>

        <label for="name">Nombre: </label>
        <input type="text" name="nombre" id="name" value="<?=$nombre?>">
        <?php if(isset($errores['nombre'])) { ?>
            <?php if($errores['nombre'] == ERROR_EMPTY) { ?>
                <span>Por favor introduce el nombre</span>
            <?php }elseif($errores['nombre'] == ERROR_FORMAT) { ?>
              <span>Por favor introduce 20 o menos caracteres</span>
            <?php } ?>
        <?php } ?>
        <br><br>

        <label for="pass">Clave: </label>
        <input type="password" name="clave" id="pass" value="<?=$clave?>">
        <?php if(isset($errores['clave'])) { ?>
            <?php if($errores['clave'] == ERROR_EMPTY) { ?>
                <span>Por favor introduce la clave</span>
            <?php }elseif($errores['clave'] == ERROR_FORMAT) { ?>
              <span>Por favor introduce 20 o menos caracteres</span>
            <?php } ?>
        <?php } ?>
        <br><br>

        <label for="etiq">Etiqueta: </label>
        <input type="text" name="etiqueta" id="etiq" value="<?=$etiqueta?>">
        <?php if(isset($errores['etiqueta'])) { ?>
            <?php if($errores['etiqueta'] == ERROR_EMPTY) { ?>
                <span>Por favor introduce la etiqueta</span>
            <?php }elseif($errores['etiqueta'] == ERROR_FORMAT) { ?>
              <span>Por favor introduce 20 o menos caracteres</span>
            <?php } ?>
        <?php } ?>
        <br><br>

        <input type="submit" name="enviar" value="Enviar">
        
    </form>
    <a href="index.php">Inicio</a>
</body>
</html>