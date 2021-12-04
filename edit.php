<?php 

include("db.php");

// $nombre = '';
// $descripcion = '';
// $precio = '';
// $peso = '';
// $existencias = '';
// $activado = '';
// $fotoProd = '';


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $peso = $row['peso'];
            $existencias = $row['existencias'];
            //$activado = $row['activado'];
            //$fotoProd = $row['fotoProd'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $existencias = $_POST['existencias'];
        //$activado = $_POST['activado'];
        //$fotoProd = $_POST['fotoProd'];

        $query = "UPDATE productos 
                    SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', peso = '$peso', existencias = '$existencias' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Producto actualizado';
        $_SESSION['message_type'] = 'warning';
        header("Location: index.php");
    }


?>


<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
         <div class=".col-md-4 mx-auto">
             <div class="card card-body">
                 <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                     <div class="form-group">
                         <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>"  placeholder="Actualiza el nombre">
                     </div>
                     <div class="form-group">
                         <input type="text" name="descripcion" class="form-control" value="<?php echo $row['descripcion']; ?>" placeholder="Actualiza la descripcion">
                     </div>
                     <div class="form-group">
                         <input type="number" name="precio" class="form-control" value="<?php echo $row['precio']; ?>" placeholder="Actualiza el precio">
                     </div>
                     <div class="form-group">
                         <input type="number" name="peso" class="form-control" value="<?php echo $row['peso']; ?>" class="form-control" placeholder="Actualiza el peso">
                     </div>
                     <div class="form-group">
                         <input type="number" name="existencias" class="form-control" value="<?php echo $row['existencias']; ?>" class="form-control" placeholder="Actualiza las existencias">
                     </div>
                     <!--<div class="form-group">
                        <label for="html">Si</label>
                        <input type="radio" name="activado" id="si">
                        <label for="html">No</label>
                        <input type="radio" name="activado" id="no">                       
                    </div>-->
                     <button class="btn btn-success btn-block" name="update">
                         Actualizar
                     </button>
                 </form>
             </div>
         </div>
    </div>
</div>

<?php include("includes/footer.php") ?>