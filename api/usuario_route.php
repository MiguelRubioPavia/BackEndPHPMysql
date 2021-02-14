<?php

    // $host= $_SERVER["HTTP_HOST"]; // Obtenemos el dominio de la url
    // $url= $_SERVER["REQUEST_URI"]; // Obtenemos la url sin dominio 
    // file_get_contents('php://input') Obtener la información de las peticiones por post que son json

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once("../model/usuario.class.php");

    $url = $_SERVER["REQUEST_URI"]; // Obtenemos la uri de la petición
    $urlQuitandoPrimerCaracter = substr($url, 1); // Aquí quitamos la primera /
    $separamosLosElementosUrl = explode('/', $urlQuitandoPrimerCaracter); // Creamos una array con la uri que tenemos modificada
    $ultimoElementoArray = $separamosLosElementosUrl[count($separamosLosElementosUrl)-1]; // Obtenemos el último valor de la array

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            // Comprobamos si el último elemento de la uri es un número o no
            if(is_numeric($ultimoElementoArray)){
                $usuario = new Usuario();
                $resultado = $usuario->getOne($ultimoElementoArray);
                echo json_encode($resultado);
            }else{
                $usuario = new Usuario();
                $resultado = $usuario->getAll();
                echo json_encode($resultado);
            }

            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            $usuario = new Usuario();
            $resultado = $usuario->createOne($data['nombre']);
            echo json_encode($resultado);
            break;
        case 'PUT':
            $data = json_decode(file_get_contents('php://input'), true);
            $usuario = new Usuario();
            $resultado = $usuario->updateOne($data['id'], $data['nombre']); 
            echo json_encode($resultado);
            break;
        case 'DELETE':
            $usuario = new Usuario();
            $resultado = $usuario->deleteOne($ultimoElementoArray);
            echo json_encode($resultado);
            break;
    }

?>