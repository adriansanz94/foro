<?php
class Dbh{

 
    private $host;
    private $db_name;
    private $charset;
    private $uid;   //adminAlumno
    private $password;
  
  
    protected $options = [
      PDO::ATTR_EMULATE_PREPARES   => false, // La preparación de las consultas no es simulada
                                            // más lento pero más seguro
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Cuando se produce un error
                                                              // salta una excepción
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Cuando traemos datos lo hacemos como array asociativo
    ];
  
  
    function __construct($host = "localhost", $db_name = "foro_db", $charset = "utf8mb4",
                        $uid = "adminAlumno", $password = "1234")
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->charset = $charset;
        $this->uid = $uid;
        $this->password = $password;
    }
  
    function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";
        try {
            return new PDO($dsn, $this->uid, $this->password, $this->options);  
        } catch (Exception $e) {
            exit('Something weird happened: '.$e->getMessage()); /* error_log(); */
        }
    }
  
}
 ?>