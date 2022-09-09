<?php

include_once 'config/conexion.php';
$query = mysqli_query($db, "SELECT id, nombre FROM areas");
$query2 = mysqli_query($db, "SELECT id, nombre FROM roles");

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

<body>
  <div class="container">
    <br>
    <br>
    <form action="datos.php" method="post">
      <!--Nombre-->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Completo *</label>
        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre completo del empleado" required>
      </div>
      <!--Correo-->
      <div class="mb-3">
        <label for="correo" class="form-label">Correo Electronico *</label>
        <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo electronico" required>
      </div>
      <!--Sexo-->

      <div class="mb-3">
        <label for="sexo" class="form-label">Sexo *</label>
        <div class="form-check checkbox-group required">
          <input class="form-check-input" type="radio" value="M" name="sexo" id="sexo1" >Masculino
          <br>
          <input class="form-check-input" type="radio" value="F" name="sexo" id="sexo2" >Femenino
        </div>
        <div id="errores"></div>
      </div>
      <!--Area-->
      <div class="mb-3">
        <label for="area" class="form-label">Area *</label>
        <select class="form-control" name="area" id="area" required>
          <?php
          while ($datos = mysqli_fetch_array($query)) :
          ?>
            <option><?php echo $datos['nombre'] ?></option>
          <?php
          endwhile;
          ?>
        </select>
      </div>
      <!--Descripcion-->
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion *</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required></textarea>
      </div>
      <!--Boletin-->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="boletin" name="boletin">
        <label class="form-check-label" for="boletin">
          Desea recibir boletin informativo
        </label>
      </div>
      <br>
      <!--Roles-->
      <div class="mb-3">
        <label for="Roles" class="form-label">Roles *</label>
        <div class="form-check checkbox-group required">
          <?php
          foreach($query2 as $item) :
          ?>
            <input class="form-check-input" type="checkbox" name="rol[<?= $item['id']; ?>]" value="<?= $item['id']; ?>"><?=$item['nombre'] ?>
            <br>
          <?php
          endforeach;
          ?>
        </div>
        <div id="errores"></div>
      </div>
      <button type="submit" class="btn btn-primary" id="btnEnviar">Guardar</button>
    </form>
  </div>
</body>


</html>