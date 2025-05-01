<?php
require 'includes/funciones.php';
require 'includes/config/database.php';

// Conexion a la base de datos

$db = conectarBD();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // var_dump($_POST);
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $servicio = $_POST['servicio'];
    $consulta = $_POST['consulta'];

    // Query
    $consulta = "INSERT INTO contacto (nombre, email, telefono, servicio, consulta) VALUES ('$nombre','$email','$telefono', '$servicio', '$consulta')";

    // Ingresarlo en la base de datos
    $resutado = mysqli_query($db, $consulta);

    if ($resutado) {
        header('location: /');
    }
};


incluirTemplate('header');
?>

<main class="contenedor">
    <h1 class="centrar-texto titulo">Contáctanos</h1>
    <p class="centrar-texto">Puedes llenar el siguiente formulario indicándones tu consulta. Te contestaremos a la brevedad posible</p>
    <form class="formulario contenedor" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="tucorreo@example.com">
        <label for="telefono">Teléfono(Optional)</label>
        <input type="text" name="telefono" placeholder="9999999">
        <label>Servicio</label>
        <select name="servicio">
            <option value="">--Seleccionar</option>
            <option value="Informacion General">Informacion General</option>
            <option value="TI">TI</option>
            <option value="Teléfono">Teléfono</option>
        </select>
        <label for="nombre">Consulta</label>
        <textarea placeholder="Ingrese su mensaje" name="consulta"></textarea>

        <div class="botones">
            <input type="submit" class="boton-azul enviar" value="Enviar">
            <a href="/" class="boton-rojo eliminar">Borrar</a>
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>