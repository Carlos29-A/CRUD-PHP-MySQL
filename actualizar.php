<?php
require 'includes/funciones.php';
require 'includes/config/database.php';
$db = conectarBD();
$consulta = "SELECT * FROM contacto";
$resultado = mysqli_query($db, $consulta);

incluirTemplate('header');
?>

<main class="contenedor">
    <h1 class="titulo">Lista de Contactos</h1>
    <table class="tabla-principal">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefóno</th>
                <th>Servicio</th>
                <th>Consulta</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($contacto = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?php echo $contacto['id'] ?></td>
                    <td><?php echo $contacto['nombre'] ?></td>
                    <td><?php echo $contacto['email'] ?></td>
                    <td><?php echo $contacto['telefono'] ?></td>
                    <td><?php echo $contacto['servicio'] ?></td>
                    <td><?php echo $contacto['consulta'] ?></td>
                    <td><a href="/formActualizar.php?id=<?php echo $contacto['id'] ?>" class="boton-verde actualizar">Actualizar</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</main>


<?php
incluirTemplate('footer');
?>