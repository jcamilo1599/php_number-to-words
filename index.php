<?php
// Paso 1: Recibir el valor numérico como parámetro
if (isset($_GET['number'])) {
    $value = $_GET['number'];
} else {
    // Error: el parámetro no se ha proporcionado
    $resp = array(
        'status' => false,
        'data' => 'Error: no se ha proporcionado el valor numérico'
    );
    echo json_encode($resp);
    exit;
}

// Paso 2: Validar el parámetro
if (!is_numeric($value)) {
    // Error: el parámetro no es un número válido
    $resp = array(
        'status' => false,
        'data' => 'Error: el valor numérico no es válido'
    );
    echo json_encode($resp);
    exit;
}

// Paso 3: Validar la longitud máxima
$maxLength = 10;

if (strlen($value) > $maxLength) {
    // Error: el número excede la longitud máxima permitida
    $resp = array(
        'status' => false,
        'data' => 'Error: el número excede la longitud máxima permitida'
    );
    echo json_encode($resp);
    exit;
}

// Paso 4: Convertir el número
$formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
$resp = array(
    'status' => true,
    'data' => $formatterES->format($value)
);
echo json_encode($resp);
