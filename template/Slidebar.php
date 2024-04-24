<aside id="slidebar" class="fixed top-0 z-10 pt-12 bg-gray-400 dark:bg-gray-700 text-gray-100 border-gray-100 border-e w-60 toggle transform duration-300 ease-out min-h-screen flex flex-col   ">
    
    <div class="flex flex-col gap-2 p-4 border-b-[0.1px] link">
        <span class=""><?php
                        switch ($permiso ) {
                            case 1:
                                echo "Administrador";
                                break;
                            case 2:
                                echo 'Cliente';
                                break;
                            case 3:
                                echo 'Alumno';
                                break;
                            default:
                                echo 'Desconocido';
                        }
                        ?></span>
        <span class=""><?php echo $nombre . " " . $apellido ?></span>
    </div>

    <ul class="flex flex-col p-4 gap-2 ">
        <li class=" link block text-center whitespace-nowrap ">Menu Administracion</li>

        <?php if ($permiso  == 1) : ?>

            


            <li class=" hover:bg-white">
                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./dashboard_adm.php">
                    <div class="h-5 w-5"><img src="../svg/board.svg" alt="" srcset=""></div>
                    <span class="hidden">Dashboard</span>

                </a>
            </li>

            <li class="hover:bg-white">

            <a class=" flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="./importaciones.php">
                <div class="h-5 w-5"><img src="../svg/ship.svg" alt="" srcset=""></div>
                <span class="hidden">Importaciones</span>
            </a>
            </li>

            <li class="hover:bg-white">
            

                    <a class=" flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="../php/buscar.php">
                        <div class="h-5 w-5"><img src="../svg/list.svg" alt="" srcset=""></div>
                        <form action="../php/buscar.php" method="post">
                            <button type="submit">Listado</button>
                        </form>
                    </a>
            </li>


            <li class="hover:bg-white flex">
                <a class="flex w-full gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./registro.php">
                    <div class="h-5 w-5"><img src="../svg/wrench.svg" alt="" srcset=""></div>
                    <span class="hidden justify-between ">Mantenimeintos </span>
                </a>
                <img aria-controls="lista_clases" data-collapse-toggle="lista_clases" class="cursor-pointer bg-gray-400 dark:bg-gray-700 ms-auto w-10 px-2 dark:hover:bg-gray-500 hover:bg-gray-500" src="../svg/arrow2.svg" alt="">

            </li>
            <ul data-collapse-toggle="lista_clases" id="lista_clases" class="hidden bg-gray-500 ps-2 border-y overflow-hidden  border-y-gray-500">
               
                
            
                <li>
                    <a href="./registro.php" class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-400  transform duration-300">Vehiculos</a>
                </li>
                <li>
                    <a href="./mantenimiento.php?opc=marcas"  class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-400  transform duration-300">Marcas</a>
                </li>
                <li>
                    <a href="./mantenimiento.php?opc=modelos" class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-400  transform duration-300">Modelos</a>
                </li>
                <li>
                    <a href="./mantenimiento.php?opc=caracteristicas"  class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-400  transform duration-300">Caracteristica</a>
                </li>
                <li>
                    <a href="./mantenimiento.php?opc=categorias"  class="flex w-full gap-2 items-center whitespace-nowrap px-1 py-2 bg-gray-400  transform duration-300">Categorias</a>
                </li>
                
            </ul>
            
            <!-- 
            <li class="hover:bg-white">

                <a class=" flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="./permisos.php">
                    <div class="h-5 w-5"><img src="../svg/permissions.svg" alt="" srcset=""></div>
                    <span class="hidden">Permisos</span>
                </a>
            </li>

            <li class=" hover:bg-white">
                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./maestros.php">
                    <div class="h-5 w-5"><img src="../svg/teacher.svg" alt="" srcset=""></div>
                    <span class="hidden">Maestros</span>

                </a>
            </li>
            <li class="hover:bg-white">

                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./alumnos.php">
                    <div class="h-5 w-5"><img src="../svg/student.svg" alt="" srcset=""></div>
                    <span class="hidden">Alumnos</span>
                </a>
            </li>

            <li class="hover:bg-white">

                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="./clases.php">
                    <div class="h-5 w-5"><img src="../svg/classroom.svg" alt="" srcset=""></div>
                    <span class="hidden">Clases</span>

                </a>
            </li> -->

        <?php endif; ?>

        <?php if ($permiso  == 2) : ?>

            <li class=" hover:bg-white">
                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./dashboard.php">
                    <div class="h-5 w-5"><img src="../svg/search.svg" alt="" srcset=""></div>
                    <span class="hidden">Dashboard</span>

                </a>
            </li>

            <li class="hover:bg-white flex">
                <a class="flex w-full gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="">
                    <div class="h-5 w-5"><img src="../svg/file.svg" alt="" srcset=""></div>
                    <span class="hidden justify-between ">Pedidos </span>
                </a>

            </li>
            <ul data-collapse-toggle="lista_clases" id="lista_clases" class="hidden bg-gray-500 ps-2 border-y overflow-hidden  border-y-gray-500">

                
            </ul>
        <?php endif; ?>

        
        <?php if ($permiso  == 3) : ?>
            <li class="hover:bg-white">

                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="./calificaciones.php">
                    <div class="h-5 w-5"><img src="../svg/nota.svg " alt="" srcset=""></div>
                    <span class="hidden">Ver calificaciones</span>

                </a>
            </li>


            <li class="hover:bg-white">

                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700  transform duration-300" href="./clases_a.php">
                    <div class="h-5 w-5"><img src="../svg/classroom.svg" alt="" srcset=""></div>
                    <span class="hidden">Administra tus clases</span>

                </a>
            </li>
        <?php endif; ?>



    </ul>
</aside>

