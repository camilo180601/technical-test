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
            $errores['correo'] = "El correo no es valido";
        }

        if(count($errores) == 0){
            $sexo = $_POST['sexo'];
            $area = $_POST['area'];
            $descripcion = $_POST['descripcion'];
            $roles = $_POST['rol'];

            $consulta = mysqli_query($db, "SELECT idA, nombreA FROM areas WHERE nombreA='$area'");
            $area_id=mysqli_fetch_array($consulta);
            $id_area=$area_id['idA'];

            if(isset($_POST['boletin'])){
                $boletin=1;
            }else{
                $boletin=0;
            }
            if(isset($_GET['editar'])){
                $iduser=$_GET['editar'];
                $sqluser = "UPDATE empleado SET nombre='$nombre', email='$email', sexo='$sexo', area_id=$id_area, boletin=$boletin, descripcion='$descripcion' ". "WHERE id = $iduser";
                $guardar = mysqli_query($db, $sqluser);
                $sql1 = "DELETE FROM empleado_rol WHERE empleado_id = $iduser";
                $borrar1 = mysqli_query($db, $sql1);
                
                foreach($roles as $rol){
                    echo $rol;
                    $sqlrol="INSERT INTO empleado_rol VALUES ($iduser, $rol);";
                    $guardarrol=mysqli_query($db, $sqlrol);
                }
                $_SESSION['completado'] = "¡Tus datos se han actualizado con éxito!";
            }else{
                $sqluser = "INSERT INTO empleado VALUES(null, '$nombre', '$email', '$sexo', $id_area, $boletin, '$descripcion');";
                $guardar = mysqli_query($db, $sqluser);
                $rs = mysqli_query($db, "SELECT MAX(id) AS id FROM empleado");
                if ($row = mysqli_fetch_row($rs)) {
                    $id = trim($row[0]);
                }
                foreach ($roles as $rol) {
                    echo $rol;
                    $sqlrol = "INSERT INTO empleado_rol VALUES ($id, $rol);";
                    $guardarrol = mysqli_query($db, $sqlrol);
                    
                }
                $_SESSION['completado'] = "¡Tus datos se han ingresado con éxito!";
            }
        }else{
            $_SESSION['errores'] = $errores;
        }
        header("Location: index.php");
        

        

    }

?>