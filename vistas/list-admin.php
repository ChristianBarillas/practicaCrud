<?php
    
    require "../clases/administrador-server.php";

    // Instanciando la clase de administradores
    $administrador = new Administrador();
    // Obteniendo todos los administradores
    $administradores = $administrador->getAdministradores();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Lista de Administradores</title>
</head>
<body>
    <h1 class="text-center">Lista de Administradores</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>Salario</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administradores as $administrador) { ?>
                    <tr>
                        <td><?php echo $administrador["id"]; ?></td>
                        <td><?php echo $administrador["nombre"]; ?></td>
                        <td><?php echo $administrador["apellido"]; ?></td>
                        <td><?php echo $administrador["carnet"]; ?></td>
                        <td><?php echo $administrador["salario"]; ?></td>
                        <td><?php echo $administrador["telefono"]; ?></td>
                        <td><?php echo $administrador["correo"]; ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
