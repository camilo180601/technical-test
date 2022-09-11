<?php include_once 'layout/header.php'; ?>
<body>
    <br>
    <br>
<div class="container">
      <div class="table-responsive">
        <table class="table table-primary">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Sexo</th>
              <th scope="col">Area</th>
              <th scope="col">Boletin</th>
              <th scope="col">Modificar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach($query3 as $empleado):
            ?>
            <tr class="">
              <td><?= $empleado['nombre'] ?></td>
              <td><?= $empleado['email'] ?></td>
              <td><?= $empleado['sexo'] ?></td>
              <td><?= $empleado['nombreA'] ?></td>
              <td><?php 
                    if($empleado['boletin']==1){
                      echo 'Si';
                    }else{
                      echo 'No';
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-warning" href="modificar.php?editar=<?= $empleado['id'] ?>" role="button">Editar</a>
              </td>
              <td>
                <a class="btn btn-danger" href="eliminar.php?eliminar=<?= $empleado['id'] ?>" role="button">Eliminar</a>
              </td>
            </tr>
            <?php 
              endforeach;
            ?>
          </tbody>
        </table>
      </div>
      

    </div>
    
</body>
</html>