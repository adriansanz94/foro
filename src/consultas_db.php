<?php 
class Consultas extends Dbh{

    //listado de temas
    function listarTemas(){
        $stmt_temas = $this->connect()->prepare("SELECT T.titulo,T.nombre,T.etiqueta,T.creado,count(R.id_tema) as num
                                    FROM Tema T INNER JOIN Respuesta R
                                    WHERE T.id = R.id_tema
                                    GROUP BY 1, 2, 3, 4
                                    ORDER BY 1;");
        $stmt_temas->execute();

        return $stmt_temas->fetchAll();
    }
    //listado respuestas
    function listarRespuestas($titulo){
        $stmt_respuestas = $this->connect()->prepare("SELECT R.titulo,R.contenido,R.nombre,R.creado 
                                            FROM Respuesta R INNER JOIN Tema T
                                            WHERE R.id_tema = T.id
                                            GROUP BY 1, 2, 3, 4
                                            order BY creado;");

        $stmt_respuestas->execute();

        return $stmt_respuestas->fetchAll();

    }
    
    //insertar tema
    function insertTema ($titulo, $nombre, $pass, $etiq){
        $stmt_insert_tema = $this->connect()->prepare("INSERT INTO Tema (titulo, nombre, pass, etiqueta)
                                                        VALUES
                                                        ('$titulo', '$nombre', '$pass', '$etiq')
                                                         ");
        $stmt_insert_tema->execute();                                    
    }
}

?>