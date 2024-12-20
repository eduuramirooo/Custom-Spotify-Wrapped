<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once('./controllerBBDD.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conectar = new Conectar('localhost', 'root', '', 'wrapped');
    $resultado = $conectar->recibir_datos("SELECT * FROM user WHERE username = '$username'");
    if (password_verify($password, $resultado[0]['password'])) {
        session_start();
        $_SESSION['id'] = $resultado[0]['id'];
        $_SESSION['user'] = $resultado[0]['username'];
    } else {
        echo "Usuario o contraseña incorrectos";
    }
    header('Location: ../index.php');
}