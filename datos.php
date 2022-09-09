<?php
    if(isset($_POST)){
        include_once 'config/conexion.php';
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $email = isset($_POST['correo']) ? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;

        $errores = array();
        $roles = array();

        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] = "El nombre no es valido";
        }

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $email_validado = false;
            $errores['email'] = "El email no es valido";
        }

        $sexo = $_POST['sexo'];
        $area = $_POST['area'];
        $descripcion = $_POST['descripcion'];
        $roles = $_POST['rol'];

        if(isset($_POST['boletin'])){
            $boletin=1;
        }else{
            $boletin=0;
        }
        
        var_dump($_POST);

    }

?>