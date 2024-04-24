<?php 



include '../template/header.php';


$marcas = $mysqli->query("SELECT * FROM `vehiculos_marcas`");
$modelo = $mysqli->query("SELECT * FROM `vehiculos_modelos`");
$categoria = $mysqli->query("SELECT * FROM `vehiculo_categoria`");
$favoritos = $mysqli->query("select * from favoritos left join vehiculos_venta on favoritos.idVehiculo = vehiculos_venta.idVehiculos_Venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria ");


?>

<main class="h-full  w-full flex flex-col bg-gray-200 dark:bg-gray-800 dark:text-white ">
    <div class=" flex justify-between  bg-white p-2 px-6 shadow-md ">
    <div class="flex gap-3 text-black text-2xl  ">
            <button onclick="window.history.back()" class="hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z"/></svg>
            </button>
            <h1 class="text-2xl ">Dashboard</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
    </div>

    <div class="w-full  p-3   ">
        <div class="flex w-full gap-2  ">
            <form id="cuadro" action="../php/buscar.php" method="post" class="rounded-lg shadow-sm bg-white w-3/5  flex flex-col">
                <span class="block text-3xl font-bold m-4  border-b-2 border-blue-600 relative ">!<span
                        class="text-orange-600">Busca</span> tu carro ideal¡
                    <?php
                        if (isset($_SESSION['error_message'])) {
                            echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out bottom-8">' . $_SESSION['error_message'] . '</p>';
                            unset($_SESSION['error_message']);
                        }
                        if (isset($_SESSION['success_message'])) {
                            echo '<span id="msj" class="text-green-500 w-full text-center absolute transform duration-500 ease-in-out left-0 bottom-8">' . $_SESSION['success_message'] . '</span>';
                            unset($_SESSION['success_message']);
                        }
                    ?>
                </span>
                <div class="flex  gap-14 px-5">
                    <div class="flex flex-col gap-6 max-w-xs">

                        <div class="grid grid-cols-4 gap-2 gap-y-5">
                            <span class="col-span-1 w-fit font-bold">Estado:</span>
                            <div
                                class="col-span-3 flex text-lg  gap-4 outline-1 outline-neutral-400  outline p-1 rounded-sm">

                                <label>
                                    <input type="checkbox" name="condicion[]" value="1"> Nuevo
                                </label>
                                <label>
                                    <input type="checkbox" name="condicion[]" value="0"> Usado
                                </label>
                            </div>

                            <span class="col-span-1 w-fit font-bold">Marca:</span>
                            <div class="col-span-3 flex text-lg  gap-4 ">

                                <select class="w-full outline-1 outline-neutral-400  outline p-1 rounded-sm" id="marca"
                                    onchange="updateModelo()" name="marca" placeholder="Marca">
                                    <option value="" selected>Todas</option>
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
                            </div>
                            <span class=" font-bold">Modelos:</span>
                            <div class="col-span-3 flex text-lg  gap-4 ">

                                <select class="w-full outline-1 outline-neutral-400  outline p-1 rounded-sm" id="modelo"
                                    name="modelo" placeholder="Modelo">
                                    <option value="" selected>Todos</option>
                                </select>
                            </div>

                            <label class=" font-bold">Año:</label>
                            <div class="flex col-span-3 max-w-full ">
                                <label>

                                    <input class="flex w-full outline-1 outline-neutral-400  outline p-1 rounded-sm"
                                        type="number" name="anio_min" placeholder="Año mínimo">
                                </label>
                                <label>

                                    <input class="flex w-full outline-1 outline-neutral-400 outline p-1 rounded-sm"
                                        type="number" name="anio_max" placeholder="Año máximo">
                                </label>


                            </div>

                            <label class=" font-bold">Precio:</label>
                            <div class="flex col-span-3 max-w-full ">
                                <label>

                                    <input class="flex w-full outline-1 outline-neutral-400  outline p-1 rounded-sm"
                                        type="number" name="precio_min" placeholder="Precio mínimo">
                                </label>
                                <label>

                                    <input class="flex w-full outline-1 outline-neutral-400 outline p-1 rounded-sm"
                                        type="number" name="precio_max" placeholder="Precio máximo">
                                </label>
                            </div>

                        </div>

                        

                    </div>

                    <div class="flex flex-col gap-2">

                        <span class="text-xl font-bold">Tipos</span>
                        <div class="grid grid-cols-2 gap-3 gap-x-8 h-fit  pr-4 text-white">

                            <?php
                            if ($categoria) {
                            if ($categoria->num_rows > 0) {
                                while ($datos = $categoria->fetch_assoc()) {
                        ?>
                            <label class="bg-gray-400 rounded-lg p-1 ps-5 flex items-center h-fit"
                                id="categoria_<?php echo $datos['idVehiculo_Categoria'] ?>">
                                <input type="checkbox" name="tipo[]"
                                    value="<?php echo $datos['idVehiculo_Categoria'] ?>" onchange="cambiarColor(this)">
                                &nbsp;<?php echo $datos['nombre_Categoria'] ?>
                            </label>
                            <?php
                                }
                            }
                            $categoria->free();
                            } else {
                            echo "<option>Error executing the query: " . $mysqli->error . "</option>";
                            }
                        ?>

                        <label id="categoria_0"  class="bg-gray-400 rounded-lg p-1 ps-5 flex items-center h-fit">
                                <input id="categoria__0" type="checkbox" value="0"  onchange="cambiarColor_all(this)">
                                Todos
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit"
                            class="my-4 self-center flex gap-2 justify-center w-28 py-2 bg-orange-600 rounded-lg text-sm leading-normal font-semibold text-white">
                            <span>Buscar</span>
                <img src="../svg/search.svg" alt="">

                </button>

            </form>

            <div id="cuadro" action="../php/buscar.php" method="post" class=" flex flex-col rounded-lg shadow-sm w-2/5 bg-white ">
                <span class="block text-3xl font-bold m-4  border-b-2 border-blue-600 relative ">!Ofertas Para Ti!
                </span>
            </div>
        </div>

        <div class="p-2 shadow-md mt-2 bg-white rounded-md ">
            <span class="block text-3xl font-bold my-4 border-b-2 border-blue-600 ">Favoritos</span>
            <div class="flex overflow-x-scroll gap-8 w-full pb-2">
                <?php
                    if ($favoritos) {
                        if ($favoritos->num_rows > 0) {
                            while ($datos = $favoritos->fetch_assoc()) {
                                $fav = true;
                    ?>
                <a href="./detalle.php?id=<?php echo $datos['idVehiculos_Venta']?>"
                    class="h-fit bg-gray-300 hover:bg-orange-200 rounded-xl p-1 relative">
                    <div class="w-72 h-48 object-fill rounded-xl bg-white overflow-hidden">
                        <img src="../pictures/<?php echo is_file("../pictures/carro_" . $datos['idVehiculos_Venta']) ? "carro_" . $datos['idVehiculos_Venta'] : "default.jpg" ?> "
                            alt="">
                    </div>
                    <p class="font-bold text-black">
                        <?php echo   $datos['nombre_Categoria'] . " " . $datos['marca_nombre'] . " " . $datos['Modelo_nombre'] . " " . $datos['year']; ?>
                    </p>
                    <p class="text-gray-600">RD$ <?php echo number_format($datos['precio'], 2, ',', '.'); ?></p>
                    <div id="fav"
                        onclick="handleFavoriteClick(event, <?= $datos['idVehiculos_Venta'] ?>, <?= $_SESSION['persona']['idUsuario'] ?>)"
                        class="absolute right-2 top-2  w-8 ">
                        <img class="h-full w-full" src="../svg/<?= $fav ? "favorito" : "nfavorito" ?>.svg" alt="">
                    </div>
                </a>
                <?php
                            }
                        } else {
                            echo "<div class='w-full  text-center'> 
                                    <span class='text-xl font-semibold'>No hay vehiculos en favoritos.</span>
                                </div>";
                        }
                        $favoritos->free();
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                    ?>
            </div>
        </div>
    </div>
</main>




<?php include '../template/footer.php' ?>