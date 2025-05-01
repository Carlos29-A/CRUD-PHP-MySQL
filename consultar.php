<?php
require 'includes/funciones.php';
require 'includes/config/database.php';
$db = conectarBD();
$consulta = "SELECT * FROM contacto";
$resultado = mysqli_query($db, $consulta);
$cantidad = mysqli_num_rows($resultado);
$consultar = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consultar = $_POST['consultar'];
    $tipo = $_POST['tipo'];
    $contenido = $_POST['contenido'];
    if (!empty($tipo) && !empty($contenido)) {
        $consulta = "SELECT * FROM contacto WHERE $tipo LIKE '%$contenido%'";
        $resultado =  mysqli_query($db, $consulta);
        $cantidad = mysqli_num_rows($resultado);
    }
    $cantidad = mysqli_num_rows($resultado);
}

incluirTemplate('header');
?>



<main class="contenedor">
    <h1 class="titulo">Consultar Contactos</h1>

    <form class="formulario-consultar" method="POST">
        <select name="tipo">
            <option value="">Seleccionar</option>
            <option value="id">Codigo</option>
            <option value="nombre">Nombre</option>
            <option value="email">Email</option>
            <option value="Teléfono">Telefono</option>
            <option value="Servicio">Servicio</option>
            <option value="Consulta">Consulta</option>
        </select>
        <input type="text" name="contenido" class="form-text">
        <input type="hidden" value="true" name="consultar">
        <input type="submit" value="Buscar" class="boton-azul buscar">
    </form>

    <table class="tabla-principal">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefóno</th>
                <th>Servicio</th>
                <th>Consulta</th>
                <?php if ($consultar): ?>
                    <th>Actualizar</th>
                <?php endif ?>
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
                    <?php if ($consultar): ?>
                        <td><a href="/formActualizar.php?id=<?php echo $contacto['id'] ?>" class="boton-verde actualizar">Actualizar</a></td>
                    <?php endif ?>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <p>Cantidad de Valores encontrados : <?php echo $cantidad ?></p>
</main>


<?php
incluirTemplate('footer');
?>