<?php
include("conexion.php");
$con = conectar();

$id = (int)$_POST['id'];
$matricula = (int)$_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = (int)$_POST['edad'];

$stmt = mysqli_prepare($con, 
"UPDATE alumnos 
SET matricula = ?, nombre = ?, apellido_p = ?, apellido_m = ?, edad = ? 
WHERE id = ?");
mysqli_stmt_bind_param($stmt, "isssii", $matricula, $nombre, $apellido_p, $apellido_m, $edad, $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: alumnos.php");
    exit();
} else {
    echo "Error al actualizar el alumno: " . mysqli_error($stmt);
}