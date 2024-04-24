<?php 

include '../template/header.php';

if ($permiso <> 1) {
    header("Location: ./dashboard.php");
    die();
}



$marcas = $mysqli->query("SELECT * FROM `vehiculos_marcas`");
$modelo = $mysqli->query("SELECT * FROM `vehiculos_modelos`");
$categoria = $mysqli->query("SELECT * FROM `vehiculo_categoria`");
$favoritos = $mysqli->query("select * from favoritos left join vehiculos_venta on favoritos.idVehiculo = vehiculos_venta.idVehiculos_Venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where idUsuario=".$_SESSION['persona']['idUsuario']);

// Datos de ejemplo para los indicadores
$indicadores = array(
    'vehiculos_en_almacen' => 59, // Número de vehículos en el almacén
    'vehiculos_en_transito' => 20, // Número de vehículos en tránsito
    'vehiculos_en_aduana' => 10, // Número de vehículos en aduana
    'vehiculos_vendidos' => 80, // Número de vehículos vendidos en el último mes
    'indice_rotacion_inventario' => 6, // Índice de rotación de inventario
    'tiempo_promedio_inventario' => 24 // Tiempo promedio de permanencia en inventario (en días)
);




?>

<main class="h-full  w-full flex flex-col bg-gray-200 dark:bg-gray-800 dark:text-white  ">
    <div class=" flex justify-between  bg-white p-2 px-6 shadow-md ">
        <div class="flex gap-3 text-black text-2xl  ">
            <button onclick="window.history.back()" class="hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
                </svg>
            </button>
            <h1 class="text-2xl ">Dashboard</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
    </div>

    <div class="w-full  p-3   ">
      

        <div class=" bg-white  rounded-lg shadow-md mb-4 p-2">
            <span class="block text-3xl font-bold my-2 border-b-2 border-blue-600 ">Indicadores</span>

            <div class="flex flex-wrap">
                <!-- Métrica de Vehículos en Almacén -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-green-600">
                                <img class='w-full h-full' src="../svg/almacen.svg" alt="icono de almacén" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Vehículos en Almacén</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['vehiculos_en_almacen']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Métrica de Vehículos en Tránsito -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-yellow-600">
                                <img class='w-full h-full' src="../svg/ship.svg" alt="icono de tránsito" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Vehículos en Tránsito</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['vehiculos_en_transito']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Métrica de Vehículos en Aduana -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-red-600">
                                <img class='w-full h-full' src="../svg/aduanas.svg" alt="icono de aduana" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Vehículos en Aduana</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['vehiculos_en_aduana']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Métrica de Vehículos Vendidos -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-blue-600">
                                <img class='w-full h-full' src="../svg/car.svg" alt="icono de vehículos vendidos" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Vehículos Vendidos</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['vehiculos_vendidos']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Métrica de Índice de Rotación de Inventarios -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-500 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-purple-600">
                                <img class='w-full h-full' src="../svg/rotate.svg" alt="icono de índice de rotación" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Índice de Rotación de Inv.</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['indice_rotacion_inventario']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Métrica de Tiempo Promedio de Permanencia en Inventario -->
                <div class="w-full md:w-1/2 xl:w-1/3 p-4 px-8">
                    <div
                        class="bg-gradient-to-b from-orange-200 to-orange-100 border-b-4 border-orange-500 rounded-lg shadow-xl p-2">
                        <div class="flex flex-row items-center">
                            <div class="rounded-full w-14 h-14 p-3 bg-orange-600">
                                <img class='w-full h-full' src="../svg/time.svg" alt="icono de tiempo promedio" />
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Tiempo Promedio en Inventario</h2>
                                <p class="font-bold text-2xl">
                                    <?php echo $indicadores['tiempo_promedio_inventario']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


     
    </div>
</main>




<?php include '../template/footer.php' ?>