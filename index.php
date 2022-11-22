<?php
include("conection.php"); //Importar el archivo donde se aloja la conexión
// Llamamos la función para conectar
$sql= "SELECT * FROM posts"; // Consulta SQL
$query= mysqli_query($conn, $sql); // Esta palabra reservada recibe el argumento de la conexion, y luego la consulta SQL

if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba con PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <!-- ============Navbar=========== -->
        <?php 
        include('navbar.php');
        ?>
          <!-- ============Navbar=========== -->
          <h1>Welcome <?php echo $row['name'] ?></h1>
          <div class="row">
          <div class="col-lg-12">
            <h2>Tabla de datos</h2>
            <table class="table">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql= "SELECT * FROM users"; // Consulta SQL
                        $query= mysqli_query($conn, $sql); // Esta palabra reservada recibe el argumento de la conexion, y luego la consulta SQL
                        
                            
                            
                            while($row = mysqli_fetch_array($query)){ ?>
                                
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    <td><?php echo $row['updated_at'] ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="editar.php?id=<?php echo $row['id']?>">Editar</a>

                                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>">Eliminar</a>

                                    </td>
                                
                                </tr>
                        <?php    } ?>
                       
                    
                    </tbody>
                </table>
          </div>
          
          <div class="col-lg-4">
            Soy el formulario
          </div>
          
                



          <!-- ============Formulario=========== -->

          </div>
          <!-- ============Formulario=========== -->

    </div>
</body>
</html>