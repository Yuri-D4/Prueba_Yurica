<?php
    session_start();
    require_once("conexion/conexion.php");
    $db = new Database();
    $con = $db -> conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver</title>
    <link rel="stylesheet" href="../css/estilo_actualizar.css">
</head>
<body>
<form action="" method="POST">

<td>

    <td><input type="submit" value="Regresar" name="regresar" id="regresar"></td>
</tr>
</form>
<?php 

if(isset($_POST['regresar']))
{
    session_destroy();


    header('location: index.php');
}


?>
    <div class="formulario">

    <h1>Tabla usuarios</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                <td>Cedula</td>
                <td>Nombre</td>
                <td>Telefono</td>
                <td>Atraccion</td>
                <td>Comida</td>
                <td>Fecha Ingreso</td>
                
            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM usuario");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['cedula']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['telefono']?></td>
                <td><?php echo $fila['id_atrac']?></td>
                <td><?php echo $fila['id_com']?></td>
                <td><?php echo $fila['fecha_ingreso']?></td>
              

            </tr>
            <?php
                  }
            ?>
         
        </table>
 
        </form>               

    </div>

</body>

</html>