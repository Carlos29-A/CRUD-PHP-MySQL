<?php

function conectarBD(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'carlos123AEC', 'mydb');
    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    return $db;
}
