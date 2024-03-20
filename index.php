<?php
    require 'conexion/conexion.php';
    $db = new Database();
    $con = $db->conectar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque de diversiones</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <!-- <link href="https://cdn-icons-png.flaticon.com/512/1061/1061668.png" > -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <main>
        <form  method="POST" autocomplete="off" class="formulario" id="formulario">           

                <div class="formulario__grupo-input" id="grupo__usuario">
                    <label for="usuario" class="formulario__label">Cedula*</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Cedula">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            La cedula tiene que ser de 6 a 12 dígitos y solo puede contener numeros.</p>
                </div>

                <!-- div para capturar el nombre -->

                <div class="formulario__grupo-input" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre*</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" onkeyup="mayus(this);" name="nombre" id="nombre" placeholder="Nombre">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El nombre tiene que ser de 10 a 30 dígitos y solo puede contener letras</p>
                </div>
                <!-- div para capturar el telefono -->
                <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="telefono" class="formulario__label">Telefono*</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" onkeyup="mayus(this);" name="telefono" id="telefono" placeholder="Telefono">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El telefono que ser de 9 a 12 dígitos y solo puede contener numeros</p>
                </div>
                
                <div class="formulario__grupo-input" id="grupo__atraccion">
                    <label for="id_atrac" class="formulario__label">Atraccion*</label>
                    <div class="formulario__grupo-select">               
                        <select  name="atraccion" id="atraccion" class="formulario__select  " required>
                            <option value="" selected="">Seleccione atraccion</option>
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from atraccion');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_atrac'] . ">" . $row['atraccion'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
                </div>  

                <div class="formulario__grupo-input" id="grupo__telefono">
                    <label for="id_com" class="formulario__label">Comida*</label>
                    <div class="formulario__grupo-select">               
                        <select  name="comida" id="comida" class="formulario__select  " required>
                            <option value="" selected="">Seleccione comida</option>
                                <?php
                                   /*Consulta para mostrar las opciones en el select */
                                    $statement = $con->prepare('SELECT * from comida ');
                                    $statement->execute();
                                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=" . $row['id_com'] . ">" . $row['comida'] . "</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    
                </div>  

            <!-- fecha ingreso -->

            <div class="formulario__grupo-input" id="grupo__fecha">
                    <label for="fecha_ingreso" class="formulario__label">Fecha de Ingreso*</label>
                        <div class="formulario__grupo-input">
                            <input type="date" class="formulario__input" onkeyup="mayus(this);" name="fecha_ingreso" id="fecha_ingreso">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                </div>
              
                <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__checkbox" id="grupo__terminos">
                <label class="formulario__checkbox">
                    <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                    Acepto los Terminos y Condiciones
                </label>
            </div>

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>
            
            <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
                     
        </form>
   </main>
   <script src="js/jquery.js"></script>
   <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
    <script>
        function mayus(e) {
        e.value = e.value.toUpperCase();
        }

        function minus(e) {
        e.value = e.value.toLowerCase();
        }
    </script> 
</body>
</html>