<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <script src="./js/funciones.js" defer></script>
    <script src="./js/menu.js" defer></script>
    <title>Documentacion - Sistema de Gestión Académica</title>
    
</head>

<body class="bg-gray-200">
    <header class="bg-blue-500 py-4 fixed w-screen shadow-xl ">
        <div class="ps-4 container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-semibold">Documentacion - Sistema de Gestión Académica</h1>
        </div>
    </header>

    <div class="container mx-auto pt-4 ">

        <aside class="flex flex-col min-w-[18rem] bg-gray-200 p-4 shadow fixed top-16 h-screen ">
            <!-- Perfil de Usuario -->
            <div class=" flex flex-col mb-4  ">
                <h2 class="text-lg font-semibold border-b-2 border-blue-400 ">Autor</h2>
                <div>
                    <div class="w-3/4 h-60 rounded-lg overflow-hidden shadow-lg mx-auto mt-4  ">
                        <img class="w-full h-full object-cover " src="./pictures/ouner.jpg" alt="">
                    </div>
                    <p class=" block text-center text-lg font-bold">Benjamin Tavarez</p>
                </div>
                <h2 class="text-lg font-semibold border-b-2 border-blue-400">Documento</h2>
                <div mostrar="#uno" onclick="scrollToSection('inicio')"  class="activar flex hover:bg-blue-100 cursor-pointer text-blue-600 justify-between items-center w-48 hover:w-full gap-4 py-2 px-2 group  transform duration-500 ease-in-out">
                    <span><a href="#" class="text-lg font-semibold text-inherit  group-hover:text-black ">Documentacion</a></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-square text-current  group-hover:text-black" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z" />
                    </svg>
                </div>
                <div mostrar="#dos" onclick="scrollToSection('inicio2')" class=" activar flex hover:bg-blue-100 cursor-pointer text-blue-600 justify-between items-center w-48 hover:w-full gap-4 py-2 px-2 group  transform duration-500 ease-in-out">
                    <span><a class="text-lg font-semibold text-inherit  group-hover:text-black ">Historia</a></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-caret-right-square text-current  group-hover:text-black" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z" />
                    </svg>
                </div>
            </div>

            <h2 class="text-lg font-semibold border-b-2 border-blue-400">Opciones de Navegación</h2>
            <!-- Opciones de Navegación -->
            <div id="uno" class="contenido">
                <ul class="mt-2 space-y-2 list-disc list-inside">
                    <li><a onclick="scrollToSection('accesos')" class="text-blue-500 hover:underline">Datos de Acceso</a></li>
                    <li><a onclick="scrollToSection('caracteristicas')" class="text-blue-500 hover:underline">Características</a></li>
                    <li><a onclick="scrollToSection('rol')" class="text-blue-500 hover:underline">Funciones por Rol</a></li>
                    <li><a onclick="scrollToSection('tegnologia')" class="text-blue-500 hover:underline">Tecnologías Utilizadas</a></li>
                    <li><a onclick="scrollToSection('evaluacion')" class="text-blue-500 hover:underline">Evaluación del Proyecto</a></li>
                    <li><a onclick="scrollToSection('autor')" class="text-blue-500 hover:underline">Autor</a></li>
                </ul>
            </div>
            <div id="dos" class="contenido hidden">
                <ul class="mt-2 space-y-2 list-disc list-inside">
                    <li><a onclick="scrollToSection('descripcion')" class="text-blue-500 hover:underline">Descripción del Proyecto</a></li>
                    <li><a onclick="scrollToSection('metodo')" class="text-blue-500 hover:underline">Metodología y Herramientas</a></li>
                    <li><a onclick="scrollToSection('desarrollo')" class="text-blue-500 hover:underline">Desarrollo y Funcionalidades</a></li>
                    <li><a onclick="scrollToSection('leccion')" class="text-blue-500 hover:underline">Lecciones Aprendidas</a></li>
                    <li><a onclick="scrollToSection('conclusion')" class="text-blue-500 hover:underline">Conclusiones</a></li>
                </ul>
            </div>

        </aside>
        <main class="ms-72 bg-gray-200 mt-12 p-8  ">
            <section id="uno" class="  contenido ">

                <!-- Contenido principal -->
                <h2 id="inicio" class="text-xl font-semibold mb-4">Universidad - Sistema de Gestión Académica</h2>
                <p>Este repositorio contiene el código fuente de un completo sistema de gestión académica diseñado para una universidad.</p>
                <h3 class="text-lg font-semibold mt-4">Descripción</h3>
                <p>Este sistema de gestión académica en línea brinda a los usuarios, incluyendo administradores, profesores y alumnos, una experiencia integral y eficiente en la administración de clases, inscripciones y seguimiento académico. Con un diseño intuitivo y amigable, esta plataforma ofrece una gama de funcionalidades adaptadas a cada rol, facilitando a los usuarios realizar tareas clave de manera sencilla.</p>
                <p>Este sistema se presenta como una herramienta completa para la gestión educativa, fomentando la eficiencia en la administración de clases, calificaciones y perfiles de usuarios, lo que contribuye a una experiencia académica más organizada y efectiva.</p>

                <!-- Datos de Acceso -->
                <h3 id="accesos" class="text-lg font-semibold mt-4">Datos de Acceso</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                    <div class="bg-white p-4 shadow rounded">
                        <h4 class="text-md font-semibold mb-2">Administrador</h4>
                        <p><strong>Correo electrónico:</strong> admin@gmail.com</p>
                        <p><strong>Contraseña:</strong> admin</p>
                    </div>
                    <div class="bg-white p-4 shadow rounded">
                        <h4 class="text-md font-semibold mb-2">Maestro</h4>
                        <p><strong>Correo electrónico:</strong> profesor1@gmail.com</p>
                        <p><strong>Contraseña:</strong> (cualquiera en el primer intento)</p>
                    </div>
                    <div class="bg-white p-4 shadow rounded">
                        <h4 class="text-md font-semibold mb-2">Alumno</h4>
                        <p><strong>Correo electrónico:</strong> alumno1@gmail.com</p>
                        <p><strong>Contraseña:</strong> (cualquiera en el primer intento)</p>
                    </div>
                </div>

                <!-- Características -->
                <h3 id="caracteristicas" class="text-lg font-semibold mt-4">Características</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                    <div class="bg-white p-4 shadow rounded">
                        <h4 class="text-md font-semibold mb-2">Navbar (Barra de Navegación)</h4>
                        <ul class="list-disc pl-6">
                            <li>Despliega y Contrae el Sidebar: Permite al usuario mostrar u ocultar el Sidebar para acceder a las diferentes secciones de la plataforma.</li>
                            <li>Barra de Navegación: Proporciona acceso rápido al dashboard en cualquier momento, permitiendo al usuario regresar a la página principal.</li>
                            <li>Dropdown del Perfil: Muestra un menú desplegable con opciones relacionadas con el perfil del usuario, como "Editar datos de perfil" y "Cerrar sesión".</li>
                        </ul>
                    </div>
                    <div class="bg-white p-4 shadow rounded">
                        <h4 class="text-md font-semibold mb-2">Sidebar (Barra Lateral)</h4>
                        <ul class="list-disc pl-6">
                            <li>Perfil de Usuario: Muestra información del usuario actual, como nombre, apellido y permiso/rol.</li>
                            <li>Opciones de Navegación: Muestra acceso a las páginas en base al permiso/rol.</li>
                            <li>Modo Oscuro: Muestra el boton para cambiar entre como oscuro y claro.</li>
                        </ul>
                    </div>
                </div>

                <!-- Funciones por Rol -->
                <h3 id="rol" class="text-lg font-semibold mt-4">Funciones por Rol</h3>
                <!-- Funciones para Administradores -->
                <div class="bg-white p-4 shadow rounded mt-2">
                    <h4 class="text-md font-semibold mb-2">Funciones para Administradores:</h4>
                    <ol class="list-decimal pl-6">
                        <li>Gestionar Perfil y Datos Personales de los Usuarios: Administrar la información personal de los usuarios registrados en la plataforma.</li>
                        <li>Gestionar Roles o Permisos de los Usuarios: Asignar y modificar los roles y permisos de los usuarios, determinando sus niveles de acceso.</li>
                        <li>Gestionar Maestros: Crear, editar y eliminar perfiles de maestros en la plataforma.</li>
                        <li>Gestionar Alumnos: Realizar acciones de creación, edición y eliminación en los perfiles de los alumnos.</li>
                        <li>Gestionar Clases: Administrar las clases disponibles, incluyendo la capacidad de crear, editar y eliminar clases.</li>
                        <li>Asignar y Retirar Maestros de las Clases: Designar y retirar maestros de las clases correspondientes.</li>
                    </ol>
                </div>
                <!-- Funciones para Alumnos -->
                <div class="bg-white p-4 shadow rounded mt-2">
                    <h4 class="text-md font-semibold mb-2">Funciones para Alumnos:</h4>
                    <ol class="list-decimal pl-6">
                        <li>Ver Calificaciones y Mensajes de las Clases Inscritas: Visualizar las calificaciones obtenidas y los mensajes relevantes de las clases en las que está registrado.</li>
                        <li>Darse de Baja de una Clase: Retirarse de una clase en la que ya no se desea participar.</li>
                        <li>Seleccionar y Registrarse en Nuevas Clases: Escoger e inscribirse en clases adicionales disponibles para el período académico.</li>
                    </ol>
                </div>
                <!-- Funciones para Profesores -->
                <div class="bg-white p-4 shadow rounded mt-2">
                    <h4 class="text-md font-semibold mb-2">Funciones para Profesores:</h4>
                    <ol class="list-decimal pl-6">
                        <li>Ver la Lista de Clases Asignadas: Acceder a la lista completa de las clases a cargo.</li>
                        <li>Ver la Lista de Alumnos Inscritos en Sus Clases: Visualizar la información detallada de los alumnos inscritos en las clases a su cargo.</li>
                        <li>Agregar Calificaciones y Mensajes a los Alumnos: Registrar calificaciones y proporcionar mensajes individuales a los alumnos dentro de sus clases.</li>
                    </ol>
                </div>
                <!-- Funciones Generales -->
                <div class="bg-white p-4 shadow rounded mt-2">
                    <h4 class="text-md font-semibold mb-2">Funciones Generales (para Todos los Roles):</h4>
                    <ol class="list-decimal pl-6">
                        <li>Gestionar Perfil y Datos Personales: Usuarios pueden administrar su información personal.</li>
                        <li>Cambiar la Imagen de Perfil: Permite actualizar la imagen de perfil.</li>
                        <li>Cambiar Contraseña: Usuarios pueden cambiar su contraseña a través de un modal.</li>
                        <li>Ver Notificaciones: Se muestran notificaciones visuales de éxito o error después de realizar acciones.</li>
                        <li>Modales Interactivos: Se utilizan modales para acciones específicas, como editar perfil y calificaciones.</li>
                        <li>Verificación de Confirmación: Antes de eliminar datos, se solicita confirmación.</li>
                        <li>Tablas Interactivas: Se implementan tablas para buscar y ordenar datos.</li>
                    </ol>
                </div>

                <!-- Tecnologías Utilizadas -->
                <h3 id="tegnologia" class="text-lg font-semibold mt-4">Tecnologías Utilizadas</h3>
                <div class="bg-white p-4 shadow rounded mt-2">
                    <ul class="list-disc pl-6">
                        <li><strong>Lenguajes de Programación:</strong> PHP, HTML, CSS, JavaScript</li>
                        <li><strong>Framework Front-End:</strong> Tailwind CSS, Bootstrap</li>
                        <li><strong>Biblioteca JavaScript:</strong> jQuery</li>
                        <li><strong>Base de Datos:</strong> MySQL</li>
                        <li><strong>Herramienta de Control de Versiones:</strong> Git</li>
                        <li><strong>Plataforma de Desarrollo:</strong> Visual Studio Code</li>
                        <li><strong>Servidor Web:</strong> https://www.000webhost.com</li>
                    </ul>
                </div>

                <!-- Evaluación del Proyecto -->
                <h3 id="evaluacion" class="text-lg font-semibold mt-4">Evaluación del Proyecto</h3>
                <div class="bg-white p-4 shadow rounded mt-2">
                    <ul class="list-disc pl-6">
                        <li><strong>Interfaz de Usuario (UI):</strong> La interfaz de usuario ha sido diseñada con atención a los detalles, permitiendo una experiencia amigable para los usuarios.</li>
                        <li><strong>Logo de la Universidad:</strong> El logo de la universidad está presente en la interfaz de usuario.</li>
                        <li><strong>Funcionalidades por Rol:</strong> Se han implementado funcionalidades específicas para cada rol de manera efectiva.</li>
                        <li><strong>Tailwind CSS:</strong> El proyecto utiliza el framework de diseño Tailwind CSS para la maquetación y estilización de la interfaz.</li>
                        <li><strong>Estructura del Proyecto:</strong> La estructura del proyecto ha sido organizada de manera lógica y comprensible. Esto facilita el mantenimiento futuro y la escalabilidad del sistema.</li>
                        <li><strong>Repositorio en GitHub:</strong> Los archivos del proyecto se encuentran alojados en un repositorio de GitHub.</li>
                        <li><strong>Despliegue en Hosting:</strong> El proyecto ha sido desplegado en el servicio de hosting 000webhost, y el enlace a la página desplegada está disponible en el repositorio de GitHub.</li>
                    </ul>
                </div>

                <!-- Consideraciones Opcionales implementadas -->
                <h3 class="text-lg font-semibold mt-4">Consideraciones Opcionales implementadas</h3>
                <div class="bg-white p-4 shadow rounded mt-2">
                    <ul class="list-disc pl-6">
                        <li><strong>Activar/Desactivar Usuarios en el Panel de Administrador:</strong> La funcionalidad de activación/desactivación de usuarios desde el panel de administrador ha sido implementada.</li>
                        <li><strong>Cantidad de Alumnos Inscritos por Clase:</strong> Se puede visualizar la cantidad de alumnos inscritos en cada clase.</li>
                        <li><strong>CRUD de Calificaciones por Maestro:</strong> Los maestros pueden gestionar las calificaciones a los alumnos.</li>
                        <li><strong>Mensaje de Maestro a Alumno en "Ver Calificaciones":</strong> Los alumnos pueden ver los mensajes del maestro.</li>
                        <li><strong>Plugin de Datatables:</strong> El uso del plugin de Datatables para la visualización y manipulación de tablas ha sido implementado.</li>
                        <li><strong>Desarrollo Completo de la UI desde Cero:</strong> La interfaz de usuario ha sido desarrollada desde cero, garantizando una experiencia única y coherente.</li>
                        <li><strong>Dark Mode:</strong> Se implemento la funcionalidad del `modo oscuro` en todas las paguinas del proyecto.</li>
                    </ul>
                </div>

                <!-- Funcionalidades Adicionales Acordes a la Lógica del Negocio -->
                <h3 class="text-lg font-semibold mt-4">Funcionalidades Adicionales Acordes a la Lógica del Negocio</h3>
                <div class="bg-white p-4 shadow rounded mt-2">
                    <ul class="list-disc pl-6">
                        <li><strong>Múltiples materias por maestros:</strong> Los maestros pueden tener y gestionar varias materias desde la vista "Mis Clases".</li>
                        <li><strong>Foto de perfil:</strong> Los usuarios pueden subir y modificar su foto de perfil.</li>
                        <li><strong>Contraseña por defecto:</strong> Se establece una contraseña de inicio la cual da acceso al perfil para que el usuario ponga una propia..</li>
                        <li><strong>Foto de materias:</strong> Los profesores pueden subir una foto para cada materia.</li>
                        <li><strong>Pagina de documentacion:</strong> El footer contiene un link hacia la `documentacion` del proyecto..</li>
                    </ul>
                </div>

                <!-- Nota -->
                <h3 class="text-lg font-semibold mt-4">Nota</h3>
                <p class="mt-2">Este proyecto demuestra un esfuerzo significativo en la implementación de las funcionalidades esenciales y en la creación de una interfaz de usuario atractiva y funcional. La incorporación de consideraciones opcionales podría agregar valor adicional y mejorar aún más la experiencia del usuario. Se recomienda revisar el código y la documentación para obtener una comprensión completa de las características implementadas.</p>

                <!-- Autor -->
                <h3 id="autor" class="text-lg font-semibold mt-4">Autor</h3>
                <p class="mt-2">Este proyecto fue desarrollado por <a href="https://github.com/SirBeho" class="text-blue-500 hover:underline">Benjamin Tavarez</a>, como parte del programa de <a href="#" class="text-blue-500 hover:underline">Fumval - Desarrollo web full stack</a>.</p>
                <p class="mt-1">Si tienes alguna pregunta o comentario sobre este proyecto, no dudes en ponerte en contacto conmigo a través de <a href="mailto:benjamin.tavarez.98@gmail.com" class="text-blue-500 hover:underline">benjamin.tavarez.98@gmail.com</a> o en <a href="https://www.linkedin.com/in/benjamin-tavarez-cruceta-052aa623b/" class="text-blue-500 hover:underline">LinkedIn</a>.</p>



            </section>
            <section id="dos" class=" contenido hidden ">

              
                    <h1 id="inicio2" class="text-2xl font-semibold mb-4">Informe de Experiencia en el Desarrollo del Proyecto</h1>

                    <h2 class="text-lg font-semibold">Introducción</h2>
                    <p class="mt-2">En el marco del [Curso o Proyecto] realizado durante [fechas del curso/proyecto], tuve la oportunidad de participar en el desarrollo de un sistema de gestión académica para una universidad. Este proyecto me brindó la ocasión de aplicar y profundizar mis conocimientos en programación web, diseño de interfaces y buenas prácticas de desarrollo.</p>

                    <h2 id="descripcion" class="text-lg font-semibold mt-4">Descripción del Proyecto</h2>
                    <p class="mt-2">El objetivo principal del proyecto fue diseñar y desarrollar una plataforma en línea que permitiera a usuarios con diferentes roles (administradores, profesores y alumnos) gestionar clases, inscripciones, calificaciones y mensajes. A lo largo de este informe, describiré mi experiencia en la implementación de esta plataforma y las lecciones aprendidas durante el proceso.</p>

                    <h2 id="metodo" class="text-lg font-semibold mt-4">Metodología y Herramientas</h2>
                    <p class="mt-2">Para abordar el desarrollo del proyecto, utilicé una metodología de desarrollo ágil que me permitió dividir el trabajo en tareas manejables y seguir un enfoque iterativo. Además, utilicé las siguientes herramientas y tecnologías:</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Lenguajes de Programación: HTML, CSS, PHP y JavaScript.</li>
                        <li>Framework Frontend: Tailwind CSS para la maquetación y estilización de la interfaz de usuario.</li>
                        <li>Biblioteca JavaScript: jQuery para manejar interacciones dinámicas en la página.</li>
                        <li>Base de Datos: MySQL para almacenar y gestionar los datos de usuarios, clases y calificaciones.</li>
                        <li>Control de Versiones: Git y GitHub para llevar un registro de los cambios y colaborar con otros miembros del equipo.</li>
                    </ul>

                    <h2 id="desarrollo" class="text-lg font-semibold mt-4">Desarrollo y Funcionalidades</h2>
                    <p class="mt-2">Mi rol en el proyecto incluyó la implementación de diversas funcionalidades clave de acuerdo a los roles de los usuarios. Algunas de las tareas más destacadas fueron:</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Diseño e Implementación de la Interfaz: Utilicé Tailwind CSS para crear una interfaz intuitiva y amigable, siguiendo los lineamientos de diseño proporcionados.</li>
                        <li>Desarrollo de Controladores (Controllers): Creé controladores en PHP para gestionar las diferentes acciones realizadas por los usuarios, como la creación, edición y eliminación de maestros, alumnos y clases.</li>
                        <li>Integración de Base de Datos: Utilicé MySQL para almacenar y recuperar la información de los usuarios, clases y calificaciones, asegurándome de mantener una estructura de base de datos coherente y eficiente.</li>
                        <li>Implementación de Modales: Utilicé jQuery para crear modales interactivos que permitieran a los usuarios realizar acciones específicas, como agregar calificaciones o editar perfiles.</li>
                    </ul>

                    <h2 id="leccion" class="text-lg font-semibold mt-4">Lecciones Aprendidas</h2>
                    <p class="mt-2">Durante el desarrollo del proyecto, adquirí valiosas lecciones que contribuyeron a mi crecimiento como desarrollador:</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Planificación y Organización: Aprendí la importancia de planificar y estructurar el trabajo antes de comenzar la implementación, lo que mejoró la eficiencia y redujo posibles problemas en el camino.</li>
                        <li>Colaboración y Comunicación: Trabajar en un equipo me permitió experimentar la importancia de la comunicación efectiva y la colaboración para lograr objetivos compartidos.</li>
                        <li>Buenas Prácticas de Desarrollo: Me esforcé por seguir las mejores prácticas de programación, incluida la modularización del código y la implementación de patrones MVC para mejorar la legibilidad y mantenibilidad del código.</li>
                        <li>Adaptabilidad: Enfrentar desafíos y obstáculos me enseñó a adaptarme y buscar soluciones creativas para lograr los resultados deseados.</li>
                    </ul>

                    <h2 id="conclusion" class="text-lg font-semibold mt-4">Conclusiones</h2>
                    <p class="mt-2">El desarrollo de este proyecto me brindó una valiosa experiencia en la creación de aplicaciones web funcionales y dinámicas. A través de la implementación de funcionalidades específicas para diferentes roles de usuarios, pude poner en práctica mis habilidades técnicas y adquirir conocimientos sobre el diseño de interfaces, el manejo de bases de datos y la colaboración en equipos de desarrollo.</p>
                    <p class="mt-2">Agradezco la oportunidad de haber trabajado en este proyecto, ya que me permitió fortalecer mis habilidades y contribuir a la creación de una herramienta útil para la gestión académica en entornos universitarios.</p>

                    <div class="mt-8">
                        <p class="font-semibold">Benjamin Tavarez</p>
                        <p>9/08/2023</p>
                        <p>Benjamin.tavarez.98@gmail.com</p>
                    </div>
               

                

            </section>
        </main>

    </div>
    
</body>

</html>