<?php
session_start();
ob_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
extract($_SESSION['usuario']);
require("../php/connection.php");
include("../functions/etiquetas.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="../js/menu.js" defer></script>
    <script src="../js/funciones.js" defer></script>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../DataTables/datatables.min.js"></script>
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
    <link href="../css/output.css" rel="stylesheet">
    <link href="../css/table.css" rel="stylesheet">


</head>

<body>
    <button onclick="toggleDarkMode()"
        class="dark:bg-white bg-black rounded-full p-2 fixed bottom-4 left-4 z-10 w-8 h-8">
        <img src="../svg/dark.svg" class="block dark:hidden w-full h-full " alt="">
        <img src="../svg/light.svg" class="hidden dark:block w-full h-full m-0" alt="">
    </button>

    <div class="flex h-screen  overflow-hidden dark:text-white">

        <div class="flex flex-col w-full h-full min-h-screen justify-between bg-gray-200 dark:bg-gray-800 ">
           

                <nav class="fixed flex z-20 left-0 top-0    min-h-[3.5rem]  bg-[#f77c3e] dark:bg-gray-700 shadow-white border-white w-screen ">

                    <div class="flex items-center gap-2 h-14 px-4 py-2 border-e border-white min-w-[15rem] bg-[#f77c3e]">
                        <div class="overflow-hidden h-full ">
                            <img class=" w-full h-full" src="../pictures/auto.png" alt="">
                        </div>
                        <span class=" text-white ">Auto Import</span>
                    </div>


                    <div
                        class="flex w-full justify-between  px-4">

                        <div class=" flex gap-5 items-center text-white ">
                            <img id="toggle" class="cursor-pointer" src="../svg/bars.svg" alt="" srcset="">
                            <a href="./dashboard.php" class="flex">
                                <!-- <h1 class=" mr-2">HOME </h1> -->

                                <img src="../svg/home.svg" alt="" srcset="">

                            </a>
                        </div>

                        <div id="control-menu" class="flex items-center gap-2 cursor-pointer">
                            <div class="h-8 w-8 overflow-hidden rounded-lg">
                                <!-- Mostrar imagen de perfil del usuario o "usuario.jpg" si no está definida -->
                                <img id="imagePreviewmenu" class="w-full h-full object-cover"
                                    src="../pictures/<?php echo is_file("../pictures/user_" . $idUsuario) ? "user_" . $idUsuario : "usuario.jpg" ?>"
                                    alt="">
                            </div>


                            <span
                                class="hidden sx:block font-semibold text-xs leading-snug"><?php echo $nombre . " " . $apellido ?></span>
                            <div id="icon_menu"
                                class="hidden sx:block w-6 transform transition-transform duration-500 ">
                                <img src="../svg/arrow.svg" alt="logo" />
                            </div>
                        </div>

                        <div id="menu"
                            class="z-10 border border-gray-BD rounded-xl dark:bg-gray-700 p-2 w-36 bg-white text-xs absolute top-12 right-[1%] overflow-hidden h-0 opacity-0 transform duration-500 ease-in-out">
                            <div class="border-b">
                                <a href="./profile.php"
                                    class="flex items-center gap-2 p-2 mb-2 hover:bg-gray-200 dark:hover:bg-gray-500  rounded-xl cursor-pointer">
                                    <div class="w-6">
                                        <img src="../svg/profile.svg" alt="">
                                    </div>
                                    <span>My Profile</span>
                                </a>
                            </div>

                            <a href="../controller/CUD_logout.php"
                                class="flex items-center gap-2 mt-2 p-2 hover:bg-gray-200 rounded-xl text-red-500 cursor-pointer">
                                <div class="w-6">
                                    <img src="../svg/logout.svg" alt="">
                                </div>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </nav>

                <?php include_once '../template/Slidebar.php' ?>
                <div class="ms-60 mt-14 h-full flex flex-col">