<?php
$songs = [
    [
        "name" => "The Bell Jar",
        "image" => "https://i.scdn.co/image/ab67616d00001e02f5bb9ce360ab4d4e1960daae",
        "artist" => "superreservao"
    ],
    [
        "name" => "Reg",
        "image" => "https://i.scdn.co/image/ab67616d0000b2731896b716ca789bdbed28bc46",
        "artist" => "Sticky M.A."
    ],
    [
        "name" => "Red Flag",
        "image" => "https://i.scdn.co/image/ab67616d0000b273b976722d4d600173788b5f80",
        "artist" => "Raly"
    ]
];
$contador = 1;
echo "<div id='resumen'><h1>Este es tu resumen de 2024 Edu</h1>";
echo "<h2>Estas son tus canciones favoritas</h2>";
echo "<ul class='grid-3'>";
foreach ($songs as $song) {
    echo "<li class='oculto song song$contador'>"; 
    echo $contador; 
    echo "<br>";
    echo "<img src='" . $song['image'] . "' alt='" . $song['name'] . "'>";
    echo "<h3>" . $song['name'] . "</h3>";
    echo "<p>" . $song['artist'] . "</p>";
    echo "</li>";
    $contador++;
}
echo "</ul></div>";