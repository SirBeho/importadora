<?php session_start();
require("../php/connection.php");

if (!isset($_SESSION['query'])) {
    header("Location: ./home.php");
    die();
}

extract($_SESSION['post']);
$resultado = $mysqli->query($_SESSION['query']);
$marcas = $mysqli->query("SELECT * FROM `vehiculos_marcas`");
$modelo = $mysqli->query("SELECT * FROM `vehiculos_modelos`");

$favoritos = $mysqli->query("select * from favoritos left join vehiculos_venta on favoritos.idVehiculo = vehiculos_venta.idVehiculos_Venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where idUsuario=" . $_SESSION['persona']['idUsuario']);
$favoritos_array = array();
while ($datos = $favoritos->fetch_assoc()) {
    $favoritos_array[] = $datos['idVehiculo'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Incluir archivo de Js y estilos CSS -->
    <script src="../js/funciones.js" defer></script>

    <link href="../css/output.css" rel="stylesheet">
    <link href="../css/input.css" rel="stylesheet">
    <title>Login</title>

</head>

<body>
    <?php include "./nav.php" ?>
   
</body>

</html>