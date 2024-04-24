<?php 


include '../template/header.php';

if (!isset($_SESSION['persona']['isInterno']) || $_SESSION['persona']['isInterno']==0 ) {
    header("Location: ./home.php");
    die();
}
  


$marcas = $mysqli->query("SELECT * FROM `vehiculos_marcas`");
$marcas2 = $mysqli->query("SELECT * FROM `vehiculos_marcas`");

$modelo = $mysqli->query("SELECT * FROM `vehiculos_modelos` join vehiculos_marcas on marca = idVehiculos_Marca ");
$caracteristicas = $mysqli->query("SELECT * FROM `vehiculo_caracteristicas`");
$categoria = $mysqli->query("SELECT * FROM `vehiculo_categoria`");
?>

<script>
$(document).ready(function() {
    $('#table_marcas').DataTable();
    $('#table_modelos').DataTable();
    $('#table_caracteristica').DataTable();
    $('#table_categoria').DataTable();

    const urlParams = new URLSearchParams(window.location.search).get('opc');
    if (urlParams) {
        document.getElementById(urlParams).click();
    }
    
});
  

  
</script>


<div class=" flex justify-between  bg-white p-2 px-6 shadow-md ">
    <div class="flex gap-3 text-black text-2xl  ">
        <button onclick="window.history.back()" class="hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 fill-blue-600" viewBox="0 0 512 512">
                <path
                    d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
            </svg>
        </button>
        <h1 class="text-2xl ">Mantenimientos</h1>
    </div>
    <span class="text-sm text-blue-900 dark:text-blue-600">Mantenimientos / <span
            class="text-gray-600 dark:text-gray-400">Dashboard</span></span>
</div>

<div class="h-96 flex-1 w-full  bg-gray-200 dark:bg-gray-800 dark:text-white ">
    <div class="w-full  p-3  h-full ">

    <div class="w-full  flex gap-5 items-center relative">

                <div class="flex gap-2">

                    <button id="marcas" mostrar="#marcas" class="activar bg-gray-400 rounded-t-md p-2 w-28 ">Marcas</button>
                    <button id="modelos" mostrar="#modelos" class="activar bg-gray-400 rounded-t-md p-2 w-28">Modelos</button>
                    <button id='caracteristicas' mostrar="#caracteristica" class="activar bg-gray-400 rounded-t-md p-2 w-28">Caracteristicas</button>
                    <button id="categorias" mostrar="#categoria" class="activar bg-gray-400 rounded-t-md p-2 w-28">Categorias</button>

                </div>

                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out -mb-16 bottom-8">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
                if (isset($_SESSION['success_message'])) {
                    echo '<span id="msj" class="text-green-500 w-full text-center absolute transform duration-500 ease-in-out left-0 -mb-16 bottom-8">' . $_SESSION['success_message'] . '</span>';
                    unset($_SESSION['success_message']);
                }
                ?>
            </div>

        <div class="rounded-lg rounded-tl-none shadow-sm bg-white w-full  flex flex-col p-3  ">

            
            
            <div id="marcas" class="contenedor ">
                <div class="flex justify-end">
                    <button class="flex items-cent gap-2 bg-blue-500 p-2 mb-3 rounded-md text-white"
                        data-modal-target="marca-modal" data-modal-toggle="marca-modal">
                        <span>Añadir Marca</span>
                        <div class="w-5">
                            <img class="w-full h-full" src="../svg/add.svg" alt="">
                        </div>
                    </button>
                </div>
                <table id="table_marcas" class="display table bg-gray-50 py-2 ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Marca</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if ($marcas) {
                        if ($marcas->num_rows > 0) {

                            while ($datos = $marcas->fetch_assoc()) {
                                $eliminar = array(
                                    'query' => "delete from vehiculos_marcas where idVehiculos_Marca = " . $datos['idVehiculos_Marca'],
                                    'msj' =>  "Eliminar  " . $datos['marca_nombre']
                                );
                    ?>
                        <tr>
                            <td><?php echo $datos['idVehiculos_Marca']; ?></td>
                            <td><?php echo $datos['marca_nombre']; ?></td>
                            <td>
                                <div class="flex gap-2 w-12 justify-center overflow-hidden bg-transparent">
                                    <div>
                                        <img onclick='EditarMarca(<?php echo json_encode($datos); ?>)'
                                            data-modal-target="marca-modal" data-modal-toggle="marca-modal"
                                            class="cursor-pointer" src="../svg/edit.svg" alt="">
                                    </div>
                                    <div>
                                        <img onclick='Eliminar(<?php echo json_encode($eliminar); ?> )'
                                            data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                            src="../svg/trash.svg" class="cursor-pointer" alt="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Marca</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div id="modelos" class="contenedor hidden ">
                <div class="flex justify-end">
                    <button class="flex items-cent gap-2 bg-blue-500 p-2  mb-3 rounded-md text-white"
                        data-modal-target="modelo-modal" data-modal-toggle="modelo-modal">
                        <span>Añadir Modelo</span>
                        <div class="w-5">
                            <img class="w-full h-full" src="../svg/add.svg" alt="">
                        </div>
                    </button>
                </div>
                <table id="table_modelos" class=" display table bg-gray-50 py-2 ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if ($modelo) {
                        if ($modelo->num_rows > 0) {

                            while ($datos = $modelo->fetch_assoc()) {
                                $eliminar = array(
                                    'query' => "delete from vehiculos_modelos where idVehiculos_Modelos = " . $datos['idVehiculos_Modelos'],
                                    'msj' =>  "Eliminar  " . $datos['Modelo_nombre']
                                );
                    ?>
                        <tr>
                            <td><?php echo $datos['idVehiculos_Modelos']; ?></td>
                            <td><?php echo $datos['Modelo_nombre']; ?></td>
                            <td><?php echo $datos['marca_nombre']; ?></td>
                            <td>
                                <div class="flex gap-2 w-12 justify-center overflow-hidden bg-transparent">
                                    <div>
                                        <img onclick='EditarModelo(<?php echo json_encode($datos); ?>)'
                                            data-modal-target="modelo-modal" data-modal-toggle="modelo-modal"
                                            class="cursor-pointer" src="../svg/edit.svg" alt="">
                                    </div>
                                    <div>
                                        <img onclick='Eliminar(<?php echo json_encode($eliminar); ?> )'
                                            data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                            src="../svg/trash.svg" class="cursor-pointer" alt="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div id="caracteristica" class="contenedor hidden">
                <div class="flex justify-end">
                    <button class="flex items-cent gap-2 bg-blue-500 p-2  mb-3 rounded-md text-white"
                        data-modal-target="caracteristia-modal" data-modal-toggle="caracteristica-modal">
                        <span>Añadir Caracteristica</span>
                        <div class="w-5">
                            <img class="w-full h-full" src="../svg/add.svg" alt="">
                        </div>
                    </button>
                </div>
                <table id="table_caracteristica" class=" display table bg-gray-50 py-2   ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Caracteristica</th>

                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if ($caracteristicas) {
                        if ($caracteristicas->num_rows > 0) {

                            while ($datos = $caracteristicas->fetch_assoc()) {
                                $eliminar = array(
                                    'query' => "delete from vehiculo_caracteristicas where idVehiculo_Caracteristicas = " . $datos['idVehiculo_Caracteristicas'],
                                    'msj' =>  "Eliminar  " . $datos['Vehiculo_Caracteristica']
                                );
                    ?>
                        <tr>
                            <td><?php echo $datos['idVehiculo_Caracteristicas']; ?></td>
                            <td><?php echo $datos['Vehiculo_Caracteristica']; ?></td>
                            <td>
                                <div class="flex gap-2 w-12 justify-center overflow-hidden bg-transparent">
                                    <div>
                                        <img onclick='EditarCaracteristica(<?php echo json_encode($datos); ?>)'
                                            data-modal-target="caracteristica-modal"
                                            data-modal-toggle="caracteristica-modal" class="cursor-pointer"
                                            src="../svg/edit.svg" alt="">
                                    </div>
                                    <div>
                                        <img onclick='Eliminar(<?php echo json_encode($eliminar); ?> )'
                                            data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                            src="../svg/trash.svg" class="cursor-pointer" alt="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                    ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>caracteristica</th>

                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div id="categoria" class="contenedor hidden">
                <div class="flex justify-end">
                    <button class="flex items-cent gap-2 bg-blue-500 p-2 mb-3 rounded-md text-white"
                        data-modal-target="categoria-modal" data-modal-toggle="categoria-modal">
                        <span>Añadir Categoria</span>
                        <div class="w-5">
                            <img class="w-full h-full" src="../svg/add.svg" alt="">
                        </div>
                    </button>
                </div>
                <table id="table_categoria" class=" display table bg-gray-50 py-2   ">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>

                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                    if ($categoria) {
                        if ($categoria->num_rows > 0) {

                            while ($datos = $categoria->fetch_assoc()) {
                                $eliminar = array(
                                    'query' => "delete from vehiculo_categoria where idVehiculo_Categoria = " . $datos['idVehiculo_Categoria'],
                                    'msj' =>  "Eliminar  " . $datos['nombre_Categoria']
                                );
                    ?>
                        <tr>
                            <td><?php echo $datos['idVehiculo_Categoria']; ?></td>
                            <td><?php echo $datos['nombre_Categoria']; ?></td>
                            <td>
                                <div class="flex gap-2 w-12 justify-center overflow-hidden bg-transparent">
                                    <div>
                                        <img onclick='EditarCategoria(<?php echo json_encode($datos); ?>)'
                                            data-modal-target="categoria-modal" data-modal-toggle="categoria-modal"
                                            class="cursor-pointer" src="../svg/edit.svg" alt="">
                                    </div>
                                    <div>
                                        <img onclick='Eliminar(<?php echo json_encode($eliminar); ?> )'
                                            data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                            src="../svg/trash.svg" class="cursor-pointer" alt="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>categoria</th>

                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>

<?php include  '../modales/modal_delete.php' ?>
<?php include  '../modales/modal_create_update.php' ?>
<?php include '../template/footer.php' ?>