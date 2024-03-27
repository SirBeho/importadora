<?php 


include '../template/header.php';


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

<div class=" flex justify-between  bg-white p-2 px-6 shadow-md ">
        <div class="flex gap-3 text-black text-2xl  ">
            <button onclick="window.history.back()" class="hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z"/></svg>
            </button>
            <h1 class="text-2xl ">Busqueda</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
</div>

<div class="h-96 flex-1 w-full  bg-gray-200 dark:bg-gray-800 dark:text-white ">
        <div class="w-full  p-3  h-full ">

            <div class="rounded-lg shadow-sm bg-white w-full h-full flex flex-col p-3 overflow-hidden ">
                <span class=" block w-full text-3xl font-bold border-b-2 border-blue-600">Catalogo</span>
                <div class="flex gap-8 mt-8 h-[90%]  ">

                    <!-- IZQUIERDA -->
                    <form action="../php/buscar.php" method="post" class="p-2 pe-4 max-h-full flex   flex-col justify-between  border-e-2 border-blue-600 ">
                        <div class="flex justify-center gap-16  mb-12">

                            <div class="flex flex-col  gap-6 max-w-xs">

                                <div class=" flex flex-col gap-6 ">
                                    <label class="flex flex-col w-full">
                                        <span>Marca</span>
                                        <select id="marca" onchange="updateModelo()" name="marca" placeholder="Marca">
                                            <option value="" selected>Marca</option>
                                            <?php
                                        if ($marcas) {
                                            if ($marcas->num_rows > 0) {
                                                while ($datos = $marcas->fetch_assoc()) {
                                                    echo "<option value=\"{$datos['idVehiculos_Marca']}\">{$datos['marca_nombre']}</option>";
                                                }
                                            }
                                            $marcas->free();
                                        } else {
                                            echo "<option >Error executing the query: " . $mysqli->error . "</option>";
                                        }
                                        ?>
                                        </select>
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Modelo</span>
                                        <select id="modelo" name="modelo" placeholder="Modelo">
                                            <option value="" selected>Modelo</option>
                                        </select>
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Año desde</span>
                                        <input type="number" name="anio_min" placeholder="Año"
                                            value="<?php echo $anio_min; ?>">
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Año hasta</span>
                                        <input type="number" name="anio_max" placeholder="Año"
                                            value="<?php echo $anio_max; ?>">
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Precio desde</span>
                                        <input type="number" name="precio_min" placeholder="Precio mínimo"
                                            value="<?php echo $precio_min; ?>">
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Precio hasta</span>
                                        <input type="number" name="precio_max" placeholder="Precio máximo"
                                            value="<?php echo $precio_max; ?>">
                                    </label>
                                    <label class="flex flex-col w-full">
                                        <span>Estado</span>
                                        <select name="condicion[]" class=" w-full" placeholder="Marca">
                                            <option value="1" <?php echo ($condicion === 'Nuevo') ? 'selected' : ''; ?>>
                                                Nuevo</option>
                                            <option value="0" <?php echo ($condicion === 'Usado') ? 'selected' : ''; ?>>
                                                Usado</option>
                                            <option value="" <?php echo ($condicion == '') ? 'selected' : ''; ?>>Ambos
                                            </option>
                                        </select>
                                    </label>
                                    <!-- Resto del código HTML del formulario ... -->


                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full gap-14">
                            <button
                                class="text-center w-full py-3 bg-orange-600 rounded-lg text-sm leading-normal font-semibold text-white"
                                type="submit">Ajustar Busqueda</button>
                        </div>
                    </form>

                    <!-- DERECHA -->
                    <div class="grid grid-cols-3 gap-5 p-2 w-full h-full max-h-full  overflow-y-scroll ">
                        <?php
                            if ($resultado) {
                                if ($resultado->num_rows > 0) {
                                    while ($datos = $resultado->fetch_assoc()) {
                                        $fav = in_array($datos['idVehiculos_Venta'], $favoritos_array);

                            ?>
                            <a  id="foto" href="./detalle.php?id=<?php echo $datos['idVehiculos_Venta'] ?>"
                                class="relative h-fit bg-gray-300 hover:bg-orange-200 rounded-xl p-1 ">
                                <div class="w-full h-48  rounded-xl bg-white overflow-hidden">
                                    <img class="oject-center object-cover w-full h-full" src="../pictures/<?php echo is_file("../pictures/carro_" . $datos['idVehiculos_Venta']) ? "carro_" . $datos['idVehiculos_Venta'] : "default.jpg" ?> "
                                        alt="">
                                      
                                </div>
                                <p class="font-bold text-black">
                                    <?php echo  $datos['idVehiculos_Venta'] . $datos['nombre_Categoria'] . " " . $datos['marca_nombre'] . " " . $datos['Modelo_nombre'] . " " . $datos['year']; ?>
                                </p>
                                <div class="flex justify-between ">
                                    <p class="text-gray-600">RD$ <?php echo number_format($datos['precio'], 2, ',', '.'); ?></p>


                                    <div id="fav"
                                        onclick="handleFavoriteClick(event, <?= $datos['idVehiculos_Venta'] ?>, <?= $_SESSION['persona']['idUsuario'] ?>)"
                                        class="absolute right-2 top-2  w-8 ">
                                        <img class="h-full w-full" src="../svg/<?= $fav ? "favorito" : "nfavorito" ?>.svg"
                                            alt="">
                                    </div>

                                </div>
                            </a>


                            <?php
                                }
                            } else {
                                echo "<div class='w-full  text-center'> 
                                        <span class='text-xl font-semibold'>No hay vehiculos con las caracteristicas especificadas.</span>
                                    </div>";
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
</div>

<?php include '../template/footer.php' ?>