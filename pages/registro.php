<?php 


include '../template/header.php';

$caracteristicas = $mysqli->query("SELECT * FROM vehiculo_caracteristicas");
$categoria = $mysqli->query("SELECT * FROM vehiculo_categoria");
$marcas = $mysqli->query("SELECT * FROM vehiculos_marcas");
$modelos = $mysqli->query("SELECT * FROM vehiculos_modelos");

$caracteristicas_array = array();
if (isset($_GET["id"])) {

    $resultado = $mysqli->query("SELECT * from vehiculos_venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where vehiculos_venta.idVehiculos_Venta =" . $_GET["id"])->fetch_assoc();
    if ($resultado == null) {
        header("Location: ./registro.php");
        die();
    }
    extract($resultado);
 
    $caracteristicas_id = $mysqli->query("SELECT idVehiculo_Caracteristicas FROM caracteristicasvsvehiculoventa join vehiculo_caracteristicas on vehiculo_caracteristicas.idVehiculo_Caracteristicas = caracteristicasvsvehiculoventa.IdCaracteristica where IdVehiculoVenta =" . $_GET["id"]);
    
    while ($datos = $caracteristicas_id->fetch_assoc()) {
        $caracteristicas_array[] = $datos['idVehiculo_Caracteristicas'];
    }
}


?>

<main class="h-full  w-full flex flex-col bg-gray-200 dark:bg-gray-800 dark:text-white overflow-hidden">
    <div class=" flex justify-between  bg-white p-2 px-6 shadow-md h-12">
        <div class="flex gap-3 text-black  ">
            <button onclick="window.history.back()" class="hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
                </svg>
            </button>
            <h1 class="text-2xl ">Mantenimiento</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Mantenimiento</span></span>
    </div>

    <div class="h-96 flex-1 w-full  bg-gray-200 dark:bg-gray-800 dark:text-white ">
        <div class="w-full  p-3  h-full ">

            <div class="rounded-lg  bg-white w-full h-full flex flex-col p-3 overflow-hidden shadow-md ">
                <div class="flex border-b-2 border-blue-600  justify-between">
                    <?php if(isset($_GET["id"])) : ?>
                    <span class=" text-3xl font-bold   flex ">
                        <?php echo $year . " " . $marca_nombre . " " . $Modelo_nombre . "     "; ?>
                    </span>


                    <?php else : ?>
                    <h1 class="text-2xl font-bold ">Registrar Vehículo</h1>
                    <?php endif; ?>
                </div>

                <div class="grid grid-cols-1 gap-5  w-full h-full max-h-full  overflow-y-scroll ">
                    <form action="../controller/vehiculo.php<?php if (isset($_GET["id"])) echo '?id='.$_GET["id"]; ?>"
                        method="post" class="flex flex-col px-5 gap-6  mt-4 h-fit ">


                        <div class=" w-full">
                            <span
                                class="w-full bg-gradient-to-r from-orange-400 to-white text-black text-xl block ps-2 p-1 rounded-sm font-bold  border-blue-600 ">Datos
                                del Vehículo</span>
                            <div class='flex gap-2 w-full '>
                                <div class=" w-2/3 border p-4 shadow-lg rounded-md rounded-t-none">
                                    <span class="font-bold block pb-2">Generales</span>
                                    <div class="grid grid-cols-2 gap-4 gap-x-2">

                                        <input type="hidden" name="accion"
                                            value="<?php  echo isset($_GET["id"])? 'update':"create" ?>">

                                        <label class="flex gap-1">
                                            <span class=" w-20">Matricula:</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full h-fit"
                                                required type="text" name="matricula" placeholder="Matricula"
                                                value="<?php if (isset($vehiculo_matricula)) echo $vehiculo_matricula; ?>">
                                        </label>
                                        <label class="flex gap-1">
                                            <span class=" w-20">Color:</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="text" name="color" placeholder="Color"
                                                value="<?php if (isset($color)) echo $color; ?>">
                                        </label>

                                        <label class="flex gap-1">
                                            <span class=" w-20">Marca:</span>
                                            <select id="marca" class="border border-neutral-400 rounded-md ps-2 w-full"
                                                name="marca" onchange="updateModelos()">
                                                <option value="" <?php if (!isset($marca)) echo 'selected'; ?>>Marca
                                                </option>
                                                <?php
                                            if ($marcas) {
                                                if ($marcas->num_rows > 0) {
                                                    while ($datos = $marcas->fetch_assoc()) {
                                                        $selected = (isset($marca)) && $marca == $datos['idVehiculos_Marca'] ? 'selected' : '';
                                                        echo "<option value=\"{$datos['idVehiculos_Marca']}\" $selected>{$datos['marca_nombre']}</option>";
                                                    }
                                                }
                                                $marcas->free();
                                            } else {
                                                echo "<option>Error executing the query: " . $mysqli->error . "</option>";
                                            }
                                            ?>
                                            </select>

                                        </label>
                                        <label class="flex gap-1">
                                            <span class=" w-20">Modelo</span>
                                            <select id="modelo" class="border border-neutral-400 rounded-md ps-2 w-full"
                                                value="<?php if (isset($vehiculo_modelo)) echo $vehiculo_modelo; ?>"
                                                name="modelo">

                                                <option value="" selected>Modelo</option>
                                            </select>
                                        </label>


                                        <label class="flex gap-1">
                                            <span class=" w-[12rem]">Tipo de vehículo</span>
                                            <select id="categoria"
                                                class="border border-neutral-400 rounded-md ps-2 w-full h-fit"
                                                name="categoria">

                                                <option value=""
                                                    <?php if (!isset($vehiculo_Categoria)) echo 'selected'; ?>>Tipo
                                                </option>
                                                <?php
                                            if ($categoria) {
                                                if ($categoria->num_rows > 0) {
                                                    while ($datos = $categoria->fetch_assoc()) {
                                                        $selected = (isset($vehiculo_Categoria) && $vehiculo_Categoria == $datos['idVehiculo_Categoria']) ? 'selected' : '';
                                                        echo "<option value=\"{$datos['idVehiculo_Categoria']}\" $selected>{$datos['nombre_Categoria']}</option>";
                                                    }
                                                }
                                                $categoria->free();
                                            } else {
                                                echo "<option>Error executing the query: " . $mysqli->error . "</option>";
                                            }
                                            ?>
                                            </select>
                                        </label>


                                        <label class="flex gap-1">
                                            <span class=" w-20">Año</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="number" name="year" placeholder="Año"
                                                value="<?php if (isset($year)) echo $year; ?>">
                                        </label>

                                        <div class="flex gap-1 items-center  ">
                                            <span class=" w-20">Estado:</span>
                                            <div
                                                class=" flex  w-full  gap-4 outline-0 outline-neutral-400  outline  rounded-md">

                                                <label>
                                                    <input required class="w-fit" type="radio" name="condicion[]"
                                                        value="1" <?php if (isset($nuevo) && $nuevo) echo "checked"; ?>>
                                                    Nuevo
                                                </label>
                                                <label>
                                                    <input required class="w-fit" type="radio" name="condicion[]"
                                                        value="0"
                                                        <?php if (isset($nuevo) && !$nuevo) echo "checked"; ?>> Usado
                                                </label>
                                            </div>
                                        </div>

                                        <label class="flex gap-5">
                                            <span>Precio:</span>
                                            <input required
                                                class="border border-neutral-400 rounded-md ps-2 w-full h-fit"
                                                type="number" name="precio"
                                                value="<?php if (isset($precio)) echo  $precio; ?>"
                                                placeholder="Precio RD$ ">
                                        </label>

                                    </div>


                                </div>
                                <div class=" w-1/3  border p-4 shadow-lg rounded-md rounded-t-none">
                                    <span class="font-bold block pb-2">Tecnicos</span>
                                    <div class="flex flex-col gap-4 w-52  ">
                                        <label class="flex gap-1">
                                            <span class="w-36">Motor:</span>
                                            <input required class="border border-neutral-400 rounded-md ps-2 w-full"
                                                type="text" name="motor"
                                                value="<?php if (isset($precio)) echo  $motor; ?>" placeholder="Motor ">
                                        </label>

                                        <label class="flex gap-1">
                                            <span class="w-36">Trasmisión</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="text" name="trasmision"
                                                value="<?php if (isset($precio)) echo  $trasmision; ?>"
                                                placeholder="Trasmisión ">
                                        </label>
                                        <label class="flex gap-1">
                                            <span class="w-36">Traccion</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="text" name="traccion"
                                                value="<?php if (isset($precio)) echo  $traccion; ?>"
                                                placeholder="Traccion ">
                                        </label>
                                        <label class="flex gap-1">
                                            <span class="w-36">Pasajeros</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="number" name="pasajeros"
                                                value="<?php if (isset($pasajeros)) echo  $pasajeros; ?>"
                                                placeholder="Pasajeros ">
                                        </label>
                                        <label class="flex gap-1">
                                            <span class="w-36">Puertas</span>
                                            <input class="border border-neutral-400 rounded-md ps-2 w-full" required
                                                type="number" name="puertas"
                                                value="<?php if (isset($puertas)) echo  $puertas; ?>"
                                                placeholder="Puertas ">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <span
                                class="w-full bg-gradient-to-r from-orange-400 to-white text-black text-xl block ps-2 p-1  rounded-sm font-bold  border-blue-600 ">Características</span>
                            <div class="flex w-full gap-2 pt-0 ">
                                <div class=" w-2/3 border p-2 shadow-lg rounded-md rounded-t-none relative">
                                    <span class="absolute bottom-2 w-full text-center text-gray-300 select-none ">Haga
                                        click para adadir o quitar</span>
                                    <h2 class="text-lg font-semibold mb-2">Características Seleccionadas</h2>
                                    <div id="selectedFeatures" class="overflow-y-auto max-h-40 grid grid-cols-2 ">
                                        <?php
                                            if ($caracteristicas) {
                                                if ($caracteristicas->num_rows > 0) {
                                                    while ($datos = $caracteristicas->fetch_assoc()) {
                                                        $checkbox_value = in_array($datos['idVehiculo_Caracteristicas'], $caracteristicas_array) ? "checked" : "";
                                                    if ($checkbox_value == "checked") {
                                                    ?>

                                        <div class="ps-2 cursor-pointer rounded-md hover:bg-red-200  transition duration-500 ease-in-out transform-gpu flex gap-2"
                                            onclick="transferFeature(this, 'availableFeatures')">

                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="3"
                                                class="text-blue-600 w-5 h-5 flex-shrink-0 " viewBox="0 0 24 24">

                                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                <path d="M22 4L12 14.01l-3-3"></path>
                                            </svg>

                                            <?php echo $datos['Vehiculo_Caracteristica'] ?>
                                            <input <?php echo $checkbox_value ?> type="checkbox" class="hidden"
                                                name="caracteristicas[]"
                                                value="<?php echo $datos['idVehiculo_Caracteristicas'] ?>">
                                        </div>
                                        <?php
                                                    }
                                                    
                                                    }
                                                }
                                            
                                            } else {
                                                echo "<li>Error executing the query: " . $mysqli->error . "</li>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class=" w-1/3 border p-2 shadow-lg rounded-md rounded-t-none">
                                    <h2 class="text-lg font-semibold mb-2">Características Disponibles</h2>
                                    <div id="availableFeatures" class="overflow-y-auto max-h-40 flex flex-col">
                                        <?php
                                            if ($caracteristicas) {
                                                if ($caracteristicas->num_rows > 0) {
                                                    $caracteristicas->data_seek(0);
                                                    while ($datos = $caracteristicas->fetch_assoc()) {
                                                    
                                                        if (!in_array($datos['idVehiculo_Caracteristicas'], $caracteristicas_array)) {

                                                            ?>
                                        <div class="ps-2 cursor-pointer rounded-md hover:bg-green-200  transition duration-500 ease-in-out transform-gpu flex gap-2"
                                            onclick="transferFeature(this, 'selectedFeatures')">


                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="3"
                                                class="text-blue-600 w-5 h-5 flex-shrink-0 " viewBox="0 0 24 24">

                                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                <path d="M22 4L12 14.01l-3-3"></path>
                                            </svg>

                                            <div><?php echo $datos['Vehiculo_Caracteristica'] ?></div>
                                            <input <?php echo $checkbox_value ?> type="checkbox" class="hidden"
                                                name="caracteristicas[]"
                                                value="<?php echo $datos['idVehiculo_Caracteristicas'] ?>">
                                        </div>

                                        <?php
                                                        }
                                                    }
                                                }
                                                $caracteristicas->free();
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="h-full flex flex-col w-full ">
                            <span
                                class="w-full bg-gradient-to-r from-orange-400 to-white text-black text-xl block ps-2 p-1  rounded-sm font-bold  border-blue-600 ">Imágenes
                                y Comentarios</span>
                            <div class="flex gap-2 h-96">
                                <div class="w-2/3 border p-4 shadow-lg rounded-md rounded-t-none">
                                    <span class="text-lg font-semibold mb-4 h-4 block">Imagenes del vehículo</span>

                                    <div class="mt-2 flex gap-4 h-32">
                                        <div class="w-full bg-gray-200 rounded-md overflow-hidden">
                                            <img class="w-full h-full object-cover" src="../pictures/carro_14" alt="">
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-md overflow-hidden">
                                            <img class="w-full h-full object-cover" src="../pictures/carro_14" alt="">
                                        </div>
                                    </div>

                                    <div class="mt-2 flex gap-4 h-32">
                                        <div class="w-full bg-gray-200 rounded-md overflow-hidden">
                                            <img class="w-full h-full object-cover" src="../pictures/photo.png" alt="">
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-md overflow-hidden">
                                            <img class="w-full h-full object-cover" src="../pictures/photo.png" alt="">
                                        </div>
                                    </div>
                                    <span class="p-0 m-0">Cantidad de fotos: 2</span>
                                    <label class="mt-1 font-bold w-full flex justify-center">

                                        <span class="bg-orange-500 hover:bg-orange-600 hover:scale-105 text-white rounded-md p-1 cursor-pointer flex ">
                                            <svg class="fill-white w-8 h-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                            </svg>
                                            Subir Fotos</span>
                                        <input type="file" class="hidden">
                                    </label>

                                </div>
                                <div class="w-1/3 border p-4 shadow-lg rounded-md rounded-t-none h-full flex flex-col">
                                    <span class="text-lg font-semibold mb-4 h-4 block">Comentarios</span>
                                    <textarea class="border border-neutral-400 rounded-md p-2 h-full w-full"
                                        name="Descripcion"
                                        placeholder="Escriba una descripción o comentarios sobre el vehículo "></textarea>
                                </div>
                            </div>

                        </div>

                    </form>

                    <div class="w-full flex justify-center mb-2 ">


                        <button
                            class="w-fit px-5 flex items-center gap-2   text-center  py-4 mt-5 bg-orange-500 hover:bg-orange-600 hover:scale-105 rounded-lg text-sm  font-semibold text-white"
                            type="submit"> <svg class="h-12 w-12 fill-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M171.3 96H224v96H111.3l30.4-75.9C146.5 104 158.2 96 171.3 96zM272 192V96h81.2c9.7 0 18.9 4.4 25 12l67.2 84H272zm256.2 1L428.2 68c-18.2-22.8-45.8-36-75-36H171.3c-39.3 0-74.6 23.9-89.1 60.3L40.6 196.4C16.8 205.8 0 228.9 0 256V368c0 17.7 14.3 32 32 32H65.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H385.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H608c17.7 0 32-14.3 32-32V320c0-65.2-48.8-119-111.8-127zM434.7 368a48 48 0 1 1 90.5 32 48 48 0 1 1 -90.5-32zM160 336a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            Guardar Vehículo</a>
                    </div>



                </div>


            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        updateModelos();
    });

    function transferFeature(item, targetId) {

        var targetList = document.getElementById(targetId);
        var sourceList = item.parentNode;

        item.classList.add('scale-0');

        var newItem = item.cloneNode(true);

        if (newItem.classList.contains('hover:bg-green-200')) {
            newItem.classList.remove('hover:bg-green-200');
            newItem.classList.add('hover:bg-red-200');
        } else {
            newItem.classList.remove('hover:bg-red-200');
            newItem.classList.add('hover:bg-green-200');
        }

        newItem.onclick = function() {
            transferFeature(this, sourceList.id);
        };



        targetList.appendChild(newItem);

        setTimeout(function() {
            newItem.classList.remove('scale-0');

            setTimeout(function() {
                sourceList.removeChild(item);
            }, 500);
        }, 50);
    }
    </script>
</main>





<?php include '../template/footer.php' ?>