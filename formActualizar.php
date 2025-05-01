<?php
require 'includes/funciones.php';
require 'includes/config/database.php';

// Conexion a la base de datos

$db = conectarBD();
$id = $_GET['id'];
$consulta = "SELECT * FROM contacto WHERE id = $id";
$resutado = mysqli_query($db, $consulta);
$contacto = mysqli_fetch_assoc($resutado);


$nombre = $contacto['nombre'];
$email = $contacto['email'];
$telefono = $contacto['telefono'];
$servicio = $contacto['servicio'];
$consulta = $contacto['consulta'];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // var_dump($_POST);
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $servicio = $_POST['servicio'];
    $consulta = $_POST['consulta'];

    // Query
    $consulta = "UPDATE contacto SET nombre = '$nombre', email = '$email', telefono= '$telefono', servicio= '$servicio', consulta= '$consulta' WHERE id =$id";

    // Ingresarlo en la base de datos
    $resutado = mysqli_query($db, $consulta);

    if ($resutado) {
        header('location: /');
    }
};


incluirTemplate('header');
?>

<main class="contenedor">
    <h1 class="centrar-texto titulo">Actualizar</h1>
    <form class="formulario contenedor" method="POST">
        <label for="nombre"><?php echo $nombre ?></label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="tucorreo@example.com" value="<?php echo $email ?>">
        <label for="telefono">Teléfono(Optional)</label>
        <input type="text" name="telefono" placeholder="9999999" value="<?php echo $telefono ?>">
        <label>Servicio</label>
        <select name="servicio">
            <option value="">--Seleccionar</option>
            <option value="Informacion General" <?php echo $servicio === "Informacion General" ? 'selected' : '' ?>> Informacion General</option>
            <option value="TI" <?php echo $servicio === "TI" ? 'selected' : '' ?>>TI</option>
            <option value="Teléfono" <?php echo $servicio === "Teléfono" ? 'selected' : '' ?>>Teléfono</option>
        </select>
        <label for="consulta">Consulta</label>
        <textarea placeholder="Ingrese su mensaje" name="consulta"><?php echo $consulta ?></textarea>

        <div class="botones">
            <input type="submit" class="boton-azul" value="Actualizar">
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>