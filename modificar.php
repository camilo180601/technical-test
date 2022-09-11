<?php 
include_once 'layout/header.php';
$id_emple=$_GET['editar'];
$query1 = mysqli_query($db, "SELECT * FROM empleado INNER JOIN areas ON empleado.area_id = areas.idA WHERE id=$id_emple");
$empleado1 = mysqli_fetch_array($query1);
?>
<body>
  <div class="container">
    <br>
    <br>
    <h2>Editar Datos de <?= $empleado1['nombre']?></h2>
    <br>
    <br>
    <form action="datos.php?editar=<?= $empleado1['id']?>" method="post">
      <!--Nombre-->
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre Completo *</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $empleado1['nombre']?>" aria-describedby="helpId" placeholder="Nombre completo del empleado" required>
      </div>
      <!--Correo-->
      <div class="mb-3">
        <label for="correo" class="form-label">Correo Electronico *</label>
        <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" value="<?= $empleado1['email']?>" placeholder="Correo electronico" required>
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
        <select class="form-control" name="area" id="area" value="<?= $empleado1['nombreA']?>" required>
          <?php
          while ($datos = mysqli_fetch_array($query)) :
          ?>
            <option><?php echo $datos['nombreA'] ?></option>
          <?php
          endwhile;
          ?>
        </select>
      </div>
      <!--Descripcion-->
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion *</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?= $empleado1['descripcion'] ?></textarea>
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
    <br>
    <br>
    
  </div>
</body>


</html>