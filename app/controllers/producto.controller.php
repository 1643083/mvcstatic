<?php

//necesita del modelo para poder responder...
require_once '../models/Producto.php';
$producto = new Producto();

//¿qué operación desea realizar el usuario?
//consulta, registro, actualizar, eliminar, buscar ¿?

//isset()       : función que determina si un objeto existe, fue definido
//$_POST['']    : permite interactuar con valores que envía la vista

//JSON          : JavaScript Object Notation
//mecanismo de intercambio de datos
if (isset($_POST['operacion'])){

    //el usuario nos envió una tarea...
    switch ($_POST['operacion']){
        case'listar':
            $registros = $producto->listar();
            echo json_encode($registros);
            break;
        case'registrar':
            //algoritmo...
            break;
        case'actualizar':
            //algoritmo...
            break;
        case'eliminar':
            //algoritmo...
            break;
    }

}