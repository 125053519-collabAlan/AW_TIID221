<?php

/*Incluir la infromacion del archivo conexion.php*/
include("conexion.php");

/*Mandamos a llamar la funcion conectar para ejecutarla*/
$con = conectar();

/*Dame todo lo que tengas de alumnos*/
$sql = "SELECT * FROM alumnos";

/*Ejecutamos la consulta y tendremos acceso a la conexion*/
$query = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TABLA ALUMNOS</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>125053519</td>
            <td>Alan</td>
            <td>Contador</td>
            <td>Blas</td>
            <td>19</td>
            <td>Editar | Eliminar</td>
        </tr>
    </tbody>
</table>
</body>
</html>