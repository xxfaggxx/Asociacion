<?php

    include 'conexion_be.php';

    $nombre_user = $_POST['nombre_user'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    /* Encriptación de contraseña */
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_user, correo, usuario, contrasena)
            VALUES('$nombre_user', '$correo', '$usuario', '$contrasena')";

    /* Verificar que el correo y usuario no se repita en la base de datos */
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    /* Verificar que el usuario no se repita en la base de datos */
    $verificar_user = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'");
    
    if(mysqli_num_rows($verificar_user) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }
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