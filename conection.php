<?php

// function conectar() {
//     $host= "localhost";
//     $user= "root";
//     $pass= "";
//     $bd="prueba";
//     $con=mysqli_connect($host, $user, $pass, $bd); //encuentra todas las BD del equipo // Comando para hacer la conexión.

//     mysqli_select_db($con,$bd); // De todas las bases BD, ingresa a la señalada // Señala la BD correcta

//     return $con;
// }

session_start();
$conn = mysqli_connect("localhost", "root", "", "prueba");