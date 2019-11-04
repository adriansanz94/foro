<?php 
require "../src/db.php";
require "../src/consultas_db.php";

$consulta = new Consultas();

$stmt = $consulta->listarTemas();
$stmt_keys = array_keys($stmt[0]);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Foro</title>
    <link rel="stylesheet" href="css/pure.css">
  </head>
  <body>
    <pre>
      <?=print_r($stmt)?>
      <?=print_r($stmt_keys)?>
      <?=print_r($stmt[0][$stmt_keys[0]])?>
    </pre>
    <table class="pure-table">
      <thead>
        <tr>
          <td>Título</td>
          <td>Nombre del creador</td>
          <td>Etiqueta</td>
          <td>Fecha de creación</td>
          <td>Número de respuestas</td>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i < count($stmt); $i++) { ?>
          <tr>
          <?php foreach($stmt_keys as $fila){?>
            <?php if ($fila == "titulo"){ ?>
              <td>
                <a href="tabla.php?t=<?=$stmt[$i][$fila]?>">
                <?=$stmt[$i][$fila]?></a>
              </td>
            <?php }else{ ?>
              <td><?= $stmt[$i][$fila] ?></td>
            <?php } ?>
          <?php }?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="crearTema.php">Añadir Tema</a>
  </body>
</html>
