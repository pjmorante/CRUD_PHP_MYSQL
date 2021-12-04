<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
<h1 class="text-primary text-center">Módulo de Registro de Productos</h1>

    
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <?php session_unset(); } ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="save_task.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del libro" autofocusS>
                    </div>
                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" autofocusS>
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio" class="form-control" placeholder="Precio" autofocusS>
                    </div>
                    <div class="form-group">
                        <input type="number" name="peso" class="form-control" placeholder="Peso" autofocusS>
                    </div>
                    <div class="form-group">
                        <input type="number" name="existencias" class="form-control" placeholder="Existencias" autofocusS>
                    </div>
                    <!-- <div class="form-group">
                        <label for="html">Si</label>
                        <input type="radio" name="activado" id="si">
                        <label for="html">No</label>
                        <input type="radio" name="activado" id="no">                       
                    </div> -->
                    <div class="form-group">
                    <input type="file" name="fotoProd" class="text-center btn btn-default btn-block">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Registrar">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Libro Id</th>
                        <th>Nombre del libro</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Peso (Gramos)</th>
                        <th>Existencias</th>
                        <!--<th>Activado</th>-->
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    $query = "SELECT * FROM productos";
                    $result_task = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_task)) {  ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo '&#36;'.$row['precio']; ?></td>
                            <td><?php echo $row['peso']; ?></td>
                            <td><?php echo $row['existencias']; ?></td>
                            <!--<td><?php echo $row['activado']; ?></td>-->
                            <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['fotoProd']); ?>"/></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a> 
                                
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    
                    <?php } ?>                   
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>


   
