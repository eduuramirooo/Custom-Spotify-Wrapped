<?php
include_once './controllerBBDD.php';
$conectar= new Conectar('localhost', 'root', '', 'wrapped');
session_start();
if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
}else{
    $id = $_SESSION['id'];
}
function getSpotifyToken($clientId, $clientSecret) {
    $url = "https://accounts.spotify.com/api/token";
    $headers = [
        "Authorization: Basic " . base64_encode("$clientId:$clientSecret"),
    ];
    $data = [
        "grant_type" => "client_credentials",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    return $result['access_token'] ?? null;
}

function searchSpotifyTrack($token, $track, $artist) {
    $url = "https://api.spotify.com/v1/search?q=track:" . urlencode($track) . "%20artist:" . urlencode($artist) . "&type=track&limit=1";
    $headers = [
        "Authorization: Bearer $token",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    return $result['tracks']['items'][0] ?? null;
}
function searchSpotifyAlbum($token, $album, $artist) {
    $url = "https://api.spotify.com/v1/search?q=album:" . urlencode($album) . "%20artist:" . urlencode($artist) . "&type=album&limit=1";
    $headers = [
        "Authorization: Bearer $token",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);
    return $result['albums']['items'][0] ?? null;
}
// Configuración
$clientId = "cd174af9b5f64b498a174b62c8277266";
$clientSecret = "deb49c9c4e594168834ac90e0b870534";

// Obtener token de acceso
$token = getSpotifyToken($clientId, $clientSecret);
$track = $artist = $track2 = $artist2 = $track3 = $artist3 = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $track = $_POST['track'];
    $artist = $_POST['artist']; 
    $track2 = $_POST['tracka2'];
    $artist2 = $_POST['artista2'];
    $track3 = $_POST['track3'];
    $artist3 = $_POST['artist3'];
}

if ($token) {
    // Buscar canción
    $tracks = [
        ['track' => $track, 'artist' => $artist],
        ['track' => $track2, 'artist' => $artist2],
        ['track' => $track3, 'artist' => $artist3],
    ];

    $contador = 1;
    foreach ($tracks as $trackInfo) {
        $trackData = searchSpotifyTrack($token, $trackInfo['track'], $trackInfo['artist']);
        if ($trackData) {
            $conectar->hacer_consulta("INSERT INTO cancion (nombre, artista, link, puesto, id_usuario) VALUES (?,?,?,?,?)", 'sssii', [$trackData['name'], $trackData['artists'][0]['name'], $trackData['album']['images'][0]['url'], $contador, $id]);
            echo "Canción: " . $trackData['name'] . "\n";
            echo "Artista: " . $trackData['artists'][0]['name'] . "\n";
            echo "Portada: " . $trackData['album']['images'][0]['url'] . "\n";
            echo '<img src="' . $trackData['album']['images'][0]['url'] . '" alt="Portada del álbum">';
            header('Location: ../index.php?done=true');
            $contador++;
        } else {
            echo "No se encontró la canción: " . $trackInfo['track'] . " del artista: " . $trackInfo['artist'] . "\n";
        }
    }
} else {
    echo "Error al obtener el token.\n";
}
