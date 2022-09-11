<?php

include_once 'config/conexion.php';
include_once 'helpers.php';
$query = mysqli_query($db, "SELECT idA, nombreA FROM areas");
$query2 = mysqli_query($db, "SELECT id, nombre FROM roles");
$query3 = mysqli_query($db, "SELECT * FROM empleado INNER JOIN areas ON empleado.area_id = areas.idA;");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Lista de Empleados</title>
</head>
