<?php

include("db.php");

    if (isset($_POST['save_task'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $existencias = $_POST['existencias'];
        $activado = $_POST['activado'];
        $fotoProd = addslashes(file_get_contents($_FILES['fotoProd']['tmp_name']));

        $query = "INSERT INTO productos(nombre, descripcion, precio, peso, existencias, activado, fotoProd) 
                VALUES ('$nombre', '$descripcion', '$precio', '$peso', '$existencias', '$activado', '$fotoProd')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Producto registrado';
        $_SESSION['message_type'] = 'success';
        
        header("Location: index.php");

    }
?>