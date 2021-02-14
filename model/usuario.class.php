<?php

    // Importar las clases necesarias (database y response)
    include_once("../config/response.class.php");
    include_once("../config/database.class.php");

    class Usuario{

        private $conn;
        private $response;

        public function __construct(){
            $bd = Database::getInstance(); // Creamos una instancia de la clase Database
            $this->conn = $bd->getConnection(); // Obtenemos la conexión 
            $this->response = new Response();
        }

        // Obtener todos los resultados
        public function getAll(){
            
            try{
                $sql = "SELECT * from usuario";
                $stm = $this->conn->prepare($sql);
                $stm->execute();
                $resultado=$stm->fetchAll(); // Obtenemos los datos de la query

                $this->response->setData($resultado);
                $this->response->setCorrect(true);

                return $this->response;
            }
            catch(Exception $e){
                $this->response->setCorrect(false, "No se ha podido obtener todos los usuarios ". $e->getMessage());
                return $this->response;
            }

        }

        // Obtener un resultado
        public function getOne($id){
            try{
                $sql = "SELECT * from usuario where id = :id_usuario";
                $stm = $this->conn->prepare($sql);
                $stm->bindValue('id_usuario', $id);
                $stm->execute();
                $resultado = $stm->fetch(); // Obtenemos los datos de la query que solo debe ser uno

                $this->response->setData($resultado);
                $this->response->setCorrect(true);

                return $this->response;
            }
            catch(Exception $e){
                $this->response->setCorrect(false, "No se ha podido obtener el usuario ". $e->getMessage());
                return $this->response;
            }
        }

        // Crear un usuario
        public function createOne($nombre)
        {
            try{
                $sql = "INSERT INTO usuario (nombre) VALUES (:nombre)";
                $stm = $this->conn->prepare($sql);
                $stm->bindValue('nombre', $nombre);
                $stm->execute();

                $this->response->setCorrect(true, "El número de filas añadidas es de: ". $stm->rowCount());

                return $this->response;
            }
            catch(Exception $e){
                $this->response->setCorrect(false, "No se ha podido crear el usuario ". $e->getMessage());
                return $this->response;
            }
        }

        // Actualizar un usuario
        public function updateOne($id,$nombre)
        {
            try{
                $sql = "UPDATE usuario SET nombre = :nombre WHERE id = :id";
                $stm = $this->conn->prepare($sql);
                $stm->bindValue('nombre', $nombre);
                $stm->bindValue('id', $id);
                $stm->execute();

                $this->response->setCorrect(true, "El número de filas modificadas es de: ". $stm->rowCount());

                return $this->response;
            }
            catch(Exception $e){
                $this->response->setCorrect(false, "No se ha podido actualizar el usuario ". $e->getMessage());
                return $this->response;
            }
        }

        // Eliminar un usuario
        public function deleteOne($id)
        {
            try{
                $sql = "DELETE FROM usuario WHERE id = :id";
                $stm = $this->conn->prepare($sql);
                $stm->bindValue('id', $id);
                $stm->execute();

                $this->response->setCorrect(true, "El número de filas eliminadas es de: ". $stm->rowCount());

                return $this->response;
            }
            catch(Exception $e){
                $this->response->setCorrect(false, "No se ha podido eliminar el usuario ". $e->getMessage());
                return $this->response;
            }
        }

    }

?>