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
            </li>

        <?php endif; ?>

        <?php if ($permiso  == 2) : ?>

            <li class=" hover:bg-white">
                <a class="flex gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./dashboard_us.php">
                    <div class="h-5 w-5"><img src="../svg/search.svg" alt="" srcset=""></div>
                    <span class="hidden">Buscar Vehiculos</span>

                </a>
            </li>

            <li class="hover:bg-white flex">
                <a class="flex w-full gap-2 items-center whitespace-nowrap py-2 bg-gray-400 dark:bg-gray-700 transform duration-300" href="./clases_m.php">
                    <div class="h-5 w-5"><img src="../svg/classroom.svg" alt="" srcset=""></div>
                    <span class="hidden justify-between ">Mis Clases </span>
                </a>
                <img aria-controls="lista_clases" data-collapse-toggle="lista_clases" class="cursor-pointer bg-gray-400 dark:bg-gray-700 ms-auto w-10 px-2 dark:hover:bg-gray-500 hover:bg-gray-500" src="../svg/arrow2.svg" alt="">

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

