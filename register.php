<?php

require 'conection.php';

if(!empty($_SESSION['id'])) {
    header ("Location: index.php");
}

if(isset($_POST["submit"]))
   {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $Cpassword = $_POST["Cpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username= '$username' OR email= '$email'");
        if(mysqli_num_rows($duplicate) > 0) {
            echo "<script> alert('Username or email has already taken');</script>";
        } else {
            if($password == $Cpassword) {
                $query = "INSERT INTO users (id, name, username, email, password) VALUES('', '$name', '$username', '$email', '$password')";
                
                mysqli_query($conn, $query);
                echo "<script> alert('Registration succesful!');</script>";
            } else {
                echo "<script> alert('Passwords dont match');</script>";
            }
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
                <h1>Registration</h1>
                <form method="POST">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="Cpassword" id="Cpassword">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>