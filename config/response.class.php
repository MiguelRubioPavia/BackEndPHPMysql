<?php

    class Response{
        
        public $data = null; // La información de las acciones generadas
        public $correct = false; // Si la operación ha ido bien
        public $message = ''; // Mensajes para explicar situación

        public function setCorrect($correct, $message = ''){
            $this->correct = $correct;
            $this->message = $message;

            if(!$correct && $message = ''){
                $this->message = "Ha ocurrido un error inesperado.";
            }
        }

        public function setData($data){
            $this->data = $data;
        }

    }

?>