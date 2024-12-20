<?php
$done = false;
include_once './controller/controllerBBDD.php';
$conectar= new Conectar('localhost', 'root', '', 'wrapped');
if(!isset($_SESSION['id'])) {
    // header('Location: ../index.php');    
}else{
    $id = $_SESSION['id']?? null;
    $resultado = $conectar->recibir_datos("SELECT * FROM cancion WHERE id_usuario = $id");
    if($resultado){
        $done = true;
    }
}