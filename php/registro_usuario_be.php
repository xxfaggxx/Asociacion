<?php

    include 'conexion_be.php';

    $nombre_user = $_POST['nombre_user'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "INSERT INTO usuarios(nombre_user, correo, usuario, contrasena)
            VALUES('$nombre_user', '$correo', '$usuario', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Usuario no almacenado");
            </script>
        ';
    }

    mysqli_close($conexion);
?>