<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('./controllerBBDD.php');
    $name = $_POST['name'];
    $username= $_POST['username'];
     $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT);
  $conectar= new Conectar('localhost', 'root', '', 'wrapped');
    $conectar->hacer_consulta("INSERT INTO user (nombre, username, password) VALUES (?,?,?)", 'sss', [$name, $username, $password]);
    if($conectar){
        session_start();
        $_SESSION['id'] = $conectar->ultimo_id();
        $_SESSION['user'] = $username;
        header('Location: ../index.php');
    }

}