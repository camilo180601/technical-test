<?php
    include_once 'config/conexion.php';
    $id_empleado = $_GET['eliminar'];
	
	$sql = "DELETE FROM empleado WHERE id = $id_empleado";
    $sql1 = "DELETE FROM empleado_rol WHERE empleado_id = $id_empleado";
	$borrar = mysqli_query($db, $sql);
    $borrar1 = mysqli_query($db, $sql1);
    header("Location: index.php");
?>