<?php
include_once "conexion.php";
include "scripts.php";
$primer_nombre=$_POST['pnombre'];
$segundo_nombre=$_POST['snombre'];
$primer_apellido=$_POST['papellido'];
$segundo_apellido=$_POST['sapellido'];
$celular=$_POST['num'];
$email=$_POST['correo'];


$consulta=$pdo->prepare("INSERT INTO form_inscripcion (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_celular, email) VALUES(?,?,?,?,?,?)");

$consulta->bindParam(1,$primer_nombre);
$consulta->bindParam(2,$segundo_nombre);
$consulta->bindParam(3,$primer_apellido);
$consulta->bindParam(4,$segundo_apellido);
$consulta->bindParam(5,$celular);
$consulta->bindParam(6,$email);


if($consulta->execute()){
    echo '<script type="text/javascript">
    Swal.fire({
     icon: "success",
     title: "TE HAZ REGISTRADO CON EXITO '.$primer_nombre.'",
     showConfirmButton: true,
     confirmButtonText: "continuar"
     }).then(function(result){
      if(result.value){                   
       window.location = "../register.html";
      }
     });
    </script>';

}else{
  error_reporting(0);
  echo '<script type="text/javascript">
  Swal.fire({
    icon: "error",
    title: "HUBO UN ERROR AL INGRESAR LOS DATOS",
    showConfirmButton: true,
    confirmButtonText: "continuar"
    }).then(function(result){
     if(result.value){                   
      window.location = "../register.html";
     }
    });
   </script>';

}
?>