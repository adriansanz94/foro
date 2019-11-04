<?php
    require "../src/db.php";
    require "../src/consultas_db.php";
    

    $consulta = new Consultas();
    $titulo = $_GET['t'];
    $stmt = $consulta->listarRespuestas($titulo);
    $stmt_keys = array_keys($stmt[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/pure.css">
    <title>Document</title>
</head>
<body>
    <pre>
      <?=print_r($_GET)?>
      <?=print_r($stmt)?>
    </pre>
    <h1><?=$titulo?></h1>
    <table class="pure-table">
    <caption>Respuestas</caption>
      <thead>
        <tr>
          <td>Título</td>
          <td>Contenido</td>
          <td>Nombre</td>
          <td>Fecha</td>
          <td>Borrar</td>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i < count($stmt); $i++) { ?>
          <tr>
          <?php foreach($stmt_keys as $fila){?>
            <td><?= $stmt[$i][$fila] ?></td>
          <?php }?>
          <td><a href="">borrar</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="crearTema.php">Añadir comentario</a>
    <a href="index.php">Volver atras</a>
    
</body>
</html>