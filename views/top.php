<?php
include_once('./controller/controllerBBDD.php');
$conectar= new Conectar('localhost',"root","","wrapped");
$id= $_SESSION['id'];
$canciones=$conectar->recibir_datos("SELECT * FROM cancion WHERE id_usuario=$id");
$user=$_SESSION['user'];
echo "<div id='resumen'><h1>Este es tu resumen de 2024 $user</h1>";
echo "<h2>Estas fueron tus canciones favoritas</h2>";
echo "<ul class='grid-3'>";
foreach ($canciones as $song) {
    echo "<li class='oculto song song" . $song['puesto'] . "'>";
    echo "<br>";
    echo "<img src='" . $song['link'] . "' alt='" . $song['nombre'] . "'>";
    echo "<h3>" . $song['nombre'] . "</h3>";
    echo "<p>" . $song['artista'] . "</p>";
    echo "</li>";
}
