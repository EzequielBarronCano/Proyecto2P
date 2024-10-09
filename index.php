<?php
/* Declaro las variables del servidor */
$servidor = "localhost"; // Si el servidor ya está en funcionamiento, puedo poner mi IP privada
$usuario = "root";
$contra = "";   // XAMP se deja vacio  | MAMP = “root”  | la contraseña particular
$base = "profeEBC"; //Este es el nombre de la DB con la que trabajaré

$conex = new mysqli($servidor, $usuario, $contra, $base); // Crea la conexión a la DB
if($conex->connect_error)  // Pregunta si se conectó correctamente la DB
{
    die("Error al conectar: " . $conex->connect_error);   // Si no se conecto, termina el programa e imprime  
}                                                         // el mensaje "Error al conectar"

$cadena = "select * from alumno";       // Declaro el query que quiero ejecutar
$resultado = $conex->query($cadena);    // A la variable "resultado" le asigno el valor que trajo la ejecución 
                                        // del query
if ($resultado->num_rows > 0)           // Si el resultado es mayor a 0 quiere decir que si hay registros
{
    while($fila = $resultado->fetch_assoc())    // Acomoda los registros para imprimirlos en mi página web
        {
            echo $fila["n_control"] . " - "
                . $fila["nom_al"] . " - "
                . $fila["ap_paterno"] . " - "
                . $fila["ap_materno"] . " - "
                . $fila["curp"] . " - "
                . $fila["f_nac_al"] . " - "
                . $fila["n_tel_al"] . " - "
                . $fila["e_mail"] . " - "
                . $fila["calle"] . " - "
                . $fila["num"] . " - "
                . $fila["colonia"] . " - "
                . $fila["municipio"] . " - "
                . $fila["estado"] . "<br>";
        }
}

?>
