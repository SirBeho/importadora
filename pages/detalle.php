<?php 


include '../template/header.php';
if (!isset($_GET["id"]) && !is_null($_GET["id"])) {
    header("Location: ./home.php");
    die();
}
$favoritos = $mysqli->query("select * from favoritos where idUsuario=" . $_SESSION['persona']['idUsuario']." and idVehiculo=".$_GET["id"])->fetch_assoc();
$caracteristicas = $mysqli->query("SELECT * FROM caracteristicasvsvehiculoventa join vehiculo_caracteristicas on vehiculo_caracteristicas.idVehiculo_Caracteristicas = caracteristicasvsvehiculoventa.IdCaracteristica where IdVehiculoVenta =" . $_GET["id"]);
$resultado = $mysqli->query("SELECT * from vehiculos_venta JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where vehiculos_venta.idVehiculos_Venta =" . $_GET["id"])->fetch_assoc();

if ($resultado == null) {
    header("Location: ./home.php");
    die();
}
extract($resultado);

?>

<main class="h-full  w-full flex flex-col bg-gray-200 dark:bg-gray-800 dark:text-white ">
    <div class=" flex justify-between  bg-white p-2 px-6 shadow-md h-12">
        <div class="flex gap-3 text-black  ">
            <button onclick="window.history.back()" class="hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
                </svg>
            </button>
            <h1 class="text-2xl ">Detalles</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Detalles</span></span>
    </div>

    <div class="w-full  p-3 h-full">
        <div class="p-2 shadow-md  bg-white rounded-md h-full flex flex-col">
            
            <div class="flex border-b-2 border-blue-600 my-4 justify-between">
                <span class=" text-3xl font-bold   flex ">

                    <?php echo $year . " " . $marca_nombre . " " . $Modelo_nombre . "     "; ?>
                    <span class="px-2 text-gray-500"> RD$ <?php echo number_format($precio, 2, '.', ','); ?> </span>
                    <div id="fav"
                        onclick="handleFavoriteClick(event, <?= $idVehiculos_Venta ?>, <?= $_SESSION['persona']['idUsuario'] ?>)"
                        class=" w-8 ">
                        <img class="h-full w-full" src="../svg/<?= $favoritos ? "favorito" : "nfavorito" ?>.svg" alt="">
                    </div>

                </span>
                <?php if ($isInterno == 1) : ?>
                <a href="./registro.php?id=<?php echo $_GET["id"] ?>" class=" flex w-8  hover:bg-blue-200">
                    <img src="../svg/edit.svg" alt="">
                </a>
                <?php endif; ?>
            </div>

            <div class="flex h-full gap-10 ms-5  ">

                <!-- fotos y carrusel-->
                <div class="h-full flex flex-col w-2/5 ">
                    <div class="mt-2 flex gap-4 h-24">
                        <div class="w-full">
                            <img class="w-full h-full object-cover" src="../pictures/carro_11" alt="">
                        </div>
                        <div class="w-full">
                            <img class="w-full h-full object-cover" src="../pictures/carro_14" alt="">
                        </div>
                    </div>

                    <div id="indicators-carousel" class="relative w-full mt-2  h-full flex flex-col"
                        data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-full overflow-hidden rounded-lg ">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out h-full" data-carousel-item="active">
                                <img src="../pictures/carro_11"
                                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="../pictures/carro_11"
                                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="../pictures/carro_11"
                                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="../pictures/carro_11"
                                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="../pictures/carro_11"
                                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                        </div>
                        <!-- Slider indicators -->
                        <div
                            class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                                data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                                data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                                data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                                data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                                data-carousel-slide-to="4"></button>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>


                    <div class="mt-2 flex gap-4 h-24">
                        <div class="w-full">
                            <img class="w-full h-full object-cover" src="../pictures/carro_11" alt="">
                        </div>
                        <div class="w-full">
                            <img class="w-full h-full object-cover" src="../pictures/carro_14" alt="">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col font-semibold gap-1 ">

                    <div class="flex gap-8">
                        <div class="flex flex-col gap-2">
                            <span class="text-xl font-bold border-b-2 border-blue-600 mb-2">Datos Generales</span>
                            <span>Precio: <span
                                    class="text-gray-500"><?php echo number_format($precio, 2, '.', ',');  ?>
                                </span></span>
                            <span>Marca: <span class="text-gray-500"><?php echo $marca_nombre; ?> </span></span>
                            <span>Modelo: <span class="text-gray-500"><?php echo $Modelo_nombre; ?> </span></span>
                            <span>Tipo: <span class="text-gray-500"><?php echo $nombre_Categoria; ?> </span></span>
                            <span>Año: <span class="text-gray-500"><?php echo $year; ?> </span></span>
                            <span>Color: <span class="text-gray-500"><?php echo $color; ?> </span></span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xl font-bold border-b-2 border-blue-600 mb-2">Datos Tecnicos</span>
                            <span>Matricula: <span
                                    class="text-gray-500"><?php echo $vehiculo_matricula; ?></span></span>
                            <span>Motor: <span class="text-gray-500"><?php echo $motor; ?> </span></span>
                            <span>Transmision: <span class="text-gray-500"><?php echo $trasmision; ?> </span></span>
                            <span>Traccion: <span class="text-gray-500"><?php echo $traccion; ?> </span></span>
                            <span>Pasajeros: <span class="text-gray-500"><?php echo $pasajeros; ?> </span></span>
                            <span>Puertas: <span class="text-gray-500"><?php echo $puertas; ?> </span></span>
                        </div>

                    </div>


                    <span class="mt-2 text-xl font-bold border-b-2 border-blue-600 mb-2">Accesorios</span>
                    <div class="grid grid-cols-2 gap-1 max-h-80  pr-4 ">

                        <?php
                    if ($caracteristicas) {
                       
                        if ($caracteristicas->num_rows > 0) {

                            while ($datos = $caracteristicas->fetch_assoc()) {
                            ?>
                            <label class=" flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" class="text-blue-600 w-5 h-5 flex-shrink-0 " viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                    <path d="M22 4L12 14.01l-3-3"></path>
                                </svg>
                                <input type="hidden" name="tipo[]"
                                    value="<?php echo $datos['idVehiculo_Caracteristicas'] ?>">
                                &nbsp;<?php echo $datos['Vehiculo_Caracteristica'] ?>
                            </label>
                            <?php
                            }
                        } else {
                            echo "- Sin Accesorios ";
                        }

                        $caracteristicas->free();
                    } else {
                        echo "Error executing the query: " . $mysqli->error . "<br>";
                    }
                    ?>


                    </div>

                    <?php if ($isInterno == 1) : ?>
                        <div class="mt-3 text-lg  font-semibold ">

                            Localizacion: <span> <?php
                            if ($disponible) {
                                echo 'En posesion de la empresa';
                            } else {
                                echo 'En Transito';
                            }
                            ?> </span>

                        </div>

                    <?php endif; ?>

                    <?php if ($isInterno != 1) : ?>
                        <div class="flex flex-col ">
                       
                        <form action="./compra.php" method="post" class="w-fit h-12 my-6 self-center">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <?php
                                if ($disponible) {
                                    echo '<button class="w-full h-full text-center p-2 px-8 bg-orange-600 rounded-lg text-base font-semibold text-white hover:scale-110 " type="submit">Agendar Compra</button>';
                                } else {
                                    echo '<span disabled class="w-full h-full block text-center p-2 bg-gray-600 rounded-lg text-sm font-semibold text-white" >Apartar vehiculo</span>';
                                }
                            ?>
                        </form>

                        <div class=" text-sm   font-semibold ">

                            Localizacion: <span> <?php
                            if ($disponible) {
                                echo 'En posesion de la empresa';
                            } else {
                                echo 'En Transito';
                            }
                            ?> </span>

                        </div>
                        <div class="flex flex-col w-full pt-2 gap-1">

                            <div class="flex items-center  text-sm   font-semibold ">
                                Puedes
                                <button
                                    class="w-fit  text-center px-2 text-blue-600 hover:bg-orange-600 hover:text-white rounded-lg text-sm  font-semibold"
                                    type="submit">Solicitar test Driver</button>
                            </div>

                        </div>
                    </div>
               
                <?php endif; ?>
                   


                </div>

            </div>

        </div>
</main>




<?php include '../template/footer.php' ?>