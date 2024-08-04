<?php
// Archivo donde se almacenan las respuestas
$dataFile = 'responses.json';

// Leer las respuestas existentes
$responses = [];
if (file_exists($dataFile)) {
    $responses = json_decode(file_get_contents($dataFile), true);
}

// Si el formulario fue enviado, guardar los nuevos datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newResponse = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'message' => htmlspecialchars($_POST['message']),
        'date' => date("Y-m-d H:i:s")
    ];
    $responses[] = $newResponse;
    file_put_contents($dataFile, json_encode($responses, JSON_PRETTY_PRINT));
    header('Location: view_responses.html');
    exit();
}
?>
