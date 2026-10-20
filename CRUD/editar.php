<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$stmt = mysqli_prepare($con, "SELECT * FROM alumnos WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultado);

if (!$row) {
    die("Alumno no encontrado");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumno</title>
</head>
<body>
    <h1>EDITAR ALUMNO</h1>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="text" name="matricula" placeholder="Matricula" value="<?php echo htmlspecialchars($row['matricula']) ?>" required>
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($row['nombre']) ?>" required>
        <input type="text" name="apellido_p" placeholder="Apellido Paterno" value="<?php echo htmlspecialchars($row['apellido_p']) ?>" required>
        <input type="text" name="apellido_m" placeholder="Apellido Materno" value="<?php echo htmlspecialchars($row['apellido_m']) ?>" required>
        <input type="number" name="edad" placeholder="Edad" value="<?php echo $row['edad'] ?>" required>
        <button type="submit">Actualizar</button>
        <a href="alumnos.php">Cancelar</a>
    </form>
</body>
</html>
