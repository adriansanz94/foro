<?php 


require "../src/consultas_db.php";
$res = $sentencia_respuestas->fetchAll();
print_r($res[0]  );
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Foro</title>
    <link rel="stylesheet" href="css/pure.css">
  </head>
  <body>
    <div class="">

    </div>
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
      <tr> 
      <?php while ($fila = $sentencia_temas->fetch()) { ?>
        <?php foreach($fila as $td){?>
            <td><?= $td ?></td>
        <?php }?>
        <td>
        <?= $res[0]?>
        </td>
      </tr>
        <?php } ?>
      </tbody>
    </table>
  </body>
</html>
