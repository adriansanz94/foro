<?php 
require "../config/config.php";

$db = new dbh();
$pdo = $db->conectarse();

$sentencia_temas = $pdo->prepare("SELECT titulo,nombre,etiqueta,creado FROM Tema ORDER BY 1;");
$sentencia_temas->execute();
$sentencia_respuestas = $pdo->prepare("SELECT COUNT(id)from Respuesta ORDER BY 1; ");
$sentencia_respuestas->execute();


$sentencia_insert_tema = $pdo->prepare()


?>