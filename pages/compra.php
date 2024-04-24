<?php 


include '../template/header.php';

if (!isset($_POST["id"])) {
    header("Location: ./home.php");
    die();
}

$resultado = $mysqli->query("SELECT * from vehiculos_venta left JOIN vehiculos_modelos on idVehiculos_Modelos = vehiculo_modelo  join vehiculos_marcas on vehiculos_modelos.marca = vehiculos_marcas.idVehiculos_Marca join vehiculo_categoria on vehiculos_venta.vehiculo_Categoria = vehiculo_categoria.idVehiculo_Categoria where vehiculos_venta.idVehiculos_Venta =" . $_POST["id"])->fetch_assoc();
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
                                       <path
                        d="M48 256a208 208 0 1 1 416 0A208 208 0 1 1 48 256zm464 0A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9c4.2 4.5 10.1 7.1 16.3 7.1c12.3 0 22.3-10 22.3-22.3V304h96c17.7 0 32-14.3 32-32V240c0-17.7-14.3-32-32-32H256V150.3c0-12.3-10-22.3-22.3-22.3c-6.2 0-12.1 2.6-16.3 7.1L117.5 242.2c-3.5 3.8-5.5 8.7-5.5 13.8s2 10.1 5.5 13.8l99.9 107.1z" />
                </svg>
            </button>
            <h1 class="text-2xl ">Compras</h1>
        </div>
        <span class="text-sm text-blue-900 dark:text-blue-600">Home / <span
                class="text-gray-600 dark:text-gray-400">Compras</span></span>
    </div>

    <div class="w-full  p-3 h-full">
        <div class="p-2 shadow-md  bg-white rounded-md h-full flex ">
       
            <div class="flex flex-col items-center w-full max-w-md  sm:p-12  rounded-3xl  text-black">

                <div class="w-20">
                    <img src="../pictures/auto.png" alt="">
                </div>
                <form action="../controller/agenda.php" method="post" class=" flex  w-full flex-col gap-4 relative text-black">
                    <input type="hidden" value="<?php echo $_POST["id"] ?>" name="id">
                    <div class="my-8 text-center">
                        <h3 class="font-bold text-lg text-center "> Tipo de entrega </h3>
                        <div class="flex gap-4 justify-center    ">

                            <label>
                                <span>En el Local</span>
                                <input required class="w-fit" type="radio" name="entrega" value="1">
                            </label>
                            <label>
                                <span>Mi direccion</span>
                                <input  required class="w-fit" type="radio" name="entrega" value="0">
                            </label>
                        </div>

                        <div class="pt-4">
                            <span class="font-semibold ">
                                Ingresa la fecha en la que desea agendar la compra de su:
                            </span></br>
                            <span class="text-2xl font-bold text-blue-600"> <?php echo $year . " " . $marca_nombre . " " . $Modelo_nombre . " "; ?></span>
                        </div>

                        <div>
                            <label class=" mt-5  flex items-center gap-3 border border-gray-BD rounded-lg p-1 ps-4">
                                <div class="w-5 h-5">
                                    <img class="w-full h-full" src="../svg/lapiz.svg" alt="">
                                </div>
                                <input required class="bg-transparent" type="date" name="date">
                            </label>

                            <label class="mt-5 flex items-center gap-3 border border-gray-BD rounded-lg p-1 ps-4">
                                <div class="w-5 h-5">
                                    <img class="w-full h-full" src="../svg/lapiz.svg" alt="">
                                </div>
                                <input required class="bg-transparent" type="text" name="time" pattern="^(0[1-9]|1[0-2]):[0-5][0-9] (AM|PM|am|pm)$" title="Ejemplo: 07:30 AM" placeholder="Ejemplo: 07:30 AM">
                            </label>
                        </div>
                    </div>

                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8" >' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']);
                    }
                    ?>


                    <button class="w-full py-4 mt-2 bg-orange-600 rounded-lg text-base leading-normal font-semibold text-white" type="submit">Agendar Compra</button>
                    <a href="./detalle.php?id=<?php echo $_POST["id"] ?>" tipe="button" class="w-fit self-center  p-3 mt-6 bg-red-500 text-center  rounded-lg text-sm leading-normal font-semibold text-white">Cancelar</a>
                </form>
            
            </div>

            
            <div class="flex gap-4 h-full w-full rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover" src="../pictures/carro_<?php echo $_POST["id"] ?>" alt="">
            </div>
            

          
        </div>

    </div>
</main>




<?php include '../template/footer.php' ?>