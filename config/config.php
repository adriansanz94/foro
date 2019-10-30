<?php 
class dbh{

 
  private $db_name = 'foro_db';
  private $host = 'localhost';
  private $charset = 'utf8mb4';
  private $db_user = 'adminAlumno';
  private $db_pass = '1234';


protected $options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // La preparación de las consultas no es simulada
                                         // más lento pero más seguro
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Cuando se produce un error
                                                          // salta una excepción
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Cuando traemos datos lo hacemos como array asociativo
];

public function conectarse(){

  $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";

  try {
    $pdo = new PDO($dsn, $this->db_user, $this->db_pass, $this->options);
    return $pdo;
  } catch (Exception $e) {
    /* error_log(); */
    exit('Something weird happened: '.$e->getMessage()); //something a user can understand
  }

}
/* $ROOT = realpath(__DIR__."/.."); */


}
?>