<?php

    $conexion = mysqli_connect("50.31.188.104", "crpyucco", "macadan97852", "crpyucco_wp571");

    if($conexion){
        echo 'Conectado exitosamente a la Base de Datos';
    }else{
        echo 'No se ha conectado a la Base de Datos';
    }


?>