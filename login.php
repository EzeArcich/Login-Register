<?php
require 'conection.php';

if(!empty($_SESSION['id'])) {
    header ("Location: index.php");
}

if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo "<script> alert('Wrong password!');</script>";
        }
    } else {
        echo "<script> alert('User not registered!');</script>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>
<body>
    <div class="container-fluid">
    <?php 
        include('navbar.php');
        ?>
        <div class="row">
            <div class="col-md-6">
                <h1>Login</h1>
                <form method="POST">
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Username or email</label>
                    <input type="text" class="form-control" name="usernameemail" id="usernameemail">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                </div>
                
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>