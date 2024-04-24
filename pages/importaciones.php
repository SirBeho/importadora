<?php 

include '../template/header.php';

$resultado = $mysqli->query("select * from vehiculos_venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where disponible = 0");
$marcas = $mysqli->query("SELECT * FROM `vehiculos_marcas`");
$modelo = $mysqli->query("SELECT * FROM `vehiculos_modelos`");

$favoritos = $mysqli->query("select * from favoritos left join vehiculos_venta on favoritos.idVehiculo = vehiculos_venta.idVehiculos_Venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where idUsuario=" . $_SESSION['persona']['idUsuario']);
$favoritos_array = array();
while ($datos = $favoritos->fetch_assoc()) {
    $favoritos_array[] = $datos['idVehiculo'];
}


$estados_vehiculos = array(
    'Por recibir' => 1,
    'En proceso de inspección' => 2,
    'En aduana' => 3,
    'En espera de documentos' => 4,
    'En tránsito' => 7,
    'En mantenimiento' => 10,
    'En subasta' => 15
);


?>

<div class=" flex justify-between  bg-white p-2 px-6 shadow-md ">
    <div class="flex gap-3 text-black text-2xl  ">
        <button onclick="window.history.back()" class="hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512">
                <path
                    d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
            </svg>
        </button>
        <h1 class="text-2xl ">Importaciones</h1>
    </div>
    <span class="text-sm text-blue-900 dark:text-blue-600">Importaciones / <span
            class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
</div>

<div class="h-96 flex-1 w-full  bg-gray-200 dark:bg-gray-800 dark:text-white ">
    <div class="w-full  p-3  h-full ">

        <div class="rounded-lg shadow-sm bg-white w-full h-full flex flex-col p-3 overflow-hidden ">
            <span class=" block w-full text-3xl font-bold border-b-2 border-blue-600">Vehiculos en proceso de
                importacion</span>
            <div class="grid grid-cols-1 gap-5 p-2 w-full h-full max-h-full  overflow-y-scroll ">
                <?php
                    if ($resultado) {
                        if ($resultado->num_rows > 0) {
                            while ($datos = $resultado->fetch_assoc()) {

                            $estado_aleatorio = array_rand($estados_vehiculos);
                            $fecha_entrega_estimada = date("d-m-Y", strtotime("+" . $estados_vehiculos[$estado_aleatorio] . " days"));

                ?>
                <a id="foto" href="./detalle.php?id=<?php echo $datos['idVehiculos_Venta'] ?>"
                    class="relative h-fit bg-gray-300 hover:bg-orange-200 rounded-xl text-xl flex gap-4 p-3">
                    <div class="w-1/3 h-60  rounded-xl bg-white overflow-hidden">
                        <img class="oject-center object-cover w-full h-full" src="../pictures/<?php echo is_file("../pictures/carro_" . $datos['idVehiculos_Venta']) ? "carro_" . $datos['idVehiculos_Venta'] : "default.jpg" ?> "alt="">
                    </div>
                    <div class="flex flex-col gap-5">
                       
                        <span > <span class="font-bold text-black">Vehiculo: </span>
                            <?php echo  $datos['nombre_Categoria'] . " " . $datos['marca_nombre'] . " " . $datos['Modelo_nombre'] . " " . $datos['year']; ?>
                        </span>
                        <span > <span class="font-bold text-black">Estado: </span>
                            <?= $estado_aleatorio; ?>
                        </span>

                        <span > <span class="font-bold text-black">Fecha de llegada estimada: </span>
                            <?= $fecha_entrega_estimada; ?>    
                        </span>
                        
                    </div>

                    <div class="bg-orange-500 text-white p-2 absolute bottom-5 right-5 rounded-md hover:bg-orange-700">
                        Ver Detalles
                    </div>
                </a>


                <?php
                        }
                    }
                    $resultado->free();
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                ?>

            </div>


        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>