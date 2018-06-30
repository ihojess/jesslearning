<?php
require_once __DIR__ . '/includes/Usuarios.php';

$db = new Usuarios();

define('MAIN', 'hola'); // Constante
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Holas Jess</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="style/main.css" rel="stylesheet">

</head>
<body>

    <div class="content">
        <form method="post" action"">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="jhon" required>
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Doe" required>
            </div>
            <div class="form-group">
                <label>Edad</label>
                <input type="date" name="edad" class="form-control" value="2018-06-05" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Crear</button>
        </form>

        <div>
            <?php
            if (!empty($_POST['nombre'])) {
                echo $db->crearUsuario($_POST['nombre'], $_POST['apellido'], $_POST['edad']);
            }
            ?>
        </div>

        <div>
            <?php
            $lista = $db->obtenerUsuarios();

            foreach ($lista as $item) {
                ?>
                <div><strong><?php echo $item['nombre'] . ' ' . $item['apellido'] ?></strong> (<?php echo $item['edad'] ?>)</div>
                <?php
            }
            ?>
        </div>
    </div>

</body>
</html>