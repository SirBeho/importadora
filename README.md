# Universidad - Sistema de Gestión Académica

Este repositorio contiene el código fuente de un completo sistema de gestión académica diseñado para una universidad.

## Descripción

Este sistema de gestión académica en línea brinda a los usuarios, incluyendo administradores, profesores y alumnos, una experiencia integral y eficiente en la administración de clases, inscripciones y seguimiento académico. Con un diseño intuitivo y amigable, esta plataforma ofrece una gama de funcionalidades adaptadas a cada rol, facilitando a los usuarios realizar tareas clave de manera sencilla.

Este sistema se presenta como una herramienta completa para la gestión educativa, fomentando la eficiencia en la administración de clases, calificaciones y perfiles de usuarios, lo que contribuye a una experiencia académica más organizada y efectiva.

## Datos de Acceso

### Administrador
- Correo electrónico: admin@gmail.com
- Contraseña: admin

### Maestro
- Correo electrónico: profesor1@gmail.com
- Contraseña: (cualquiera en el primer intento)

### Alumno
- Correo electrónico: alumno1@gmail.com
- Contraseña: (cualquiera en el primer intento)

## Características

### Navbar (Barra de Navegación)

- **Despliega y Contrae el Sidebar**: Permite al usuario mostrar u ocultar el Sidebar para acceder a las diferentes secciones de la plataforma.
- **Barra de Navegación**: Proporciona acceso rápido al dashboard en cualquier momento, permitiendo al usuario regresar a la página principal.
- **Dropdown del Perfil**: Muestra un menú desplegable con opciones relacionadas con el perfil del usuario, como "Editar datos de perfil" y "Cerrar sesión".

### Sidebar (Barra Lateral)


- **Perfil de Usuario**: Muestra información del usuario actual, como nombre, apellido y permiso/rol.

- **Opciones de Navegacion**: Muestra acceso a las paguinas en base al permiso/rol.

- **Modo Oscuro**: Muestra el boton para cambiar entre como oscuro y claro.

## Funciones por Rol

### Funciones para Administradores:

1. **Gestionar Perfil y Datos Personales de los Usuarios**: Administrar la información personal de los usuarios registrados en la plataforma.

2. **Gestionar Roles o Permisos de los Usuarios**: Asignar y modificar los roles y permisos de los usuarios, determinando sus niveles de acceso.

3. **Gestionar Maestros**: Crear, editar y eliminar perfiles de maestros en la plataforma.

4. **Gestionar Alumnos**: Realizar acciones de creación, edición y eliminación en los perfiles de los alumnos.

5. **Gestionar Clases**: Administrar las clases disponibles, incluyendo la capacidad de crear, editar y eliminar clases.

6. **Asignar y Retirar Maestros de las Clases**: Designar y retirar maestros de las clases correspondientes.



### Funciones para Alumnos:

1. **Ver Calificaciones y Mensajes de las Clases Inscritas**: Visualizar las calificaciones obtenidas y los mensajes relevantes de las clases en las que está registrado.

2. **Darse de Baja de una Clase**: Retirarse de una clase en la que ya no se desea participar.

3. **Seleccionar y Registrarse en Nuevas Clases**: Escoger e inscribirse en clases adicionales disponibles para el período académico.

### Funciones para Profesores:

1. **Ver la Lista de Clases Asignadas**: Acceder a la lista completa de las clases a cargo.

2. **Ver la Lista de Alumnos Inscritos en Sus Clases**: Visualizar la información detallada de los alumnos inscritos en las clases a su cargo.

3. **Agregar Calificaciones y Mensajes a los Alumnos**: Registrar calificaciones y proporcionar mensajes individuales a los alumnos dentro de sus clases.

### Funciones Generales (para Todos los Roles):

1. **Gestionar Perfil y Datos Personales**: Usuarios pueden administrar su información personal.
2. **Cambiar la Imagen de Perfil**: Permite actualizar la imagen de perfil.
3. **Cambiar Contraseña**: Usuarios pueden cambiar su contraseña a través de un modal.
4. **Ver Notificaciones**: Se muestran notificaciones visuales de éxito o error después de realizar acciones.
5. **Modales Interactivos**: Se utilizan modales para acciones específicas, como editar perfil y calificaciones.
6. **Verificación de Confirmación**: Antes de eliminar datos, se solicita confirmación.
7. **Tablas Interactivas**: Se implementan tablas para buscar y ordenar datos.

Estas funcionalidades permiten a cada rol realizar tareas específicas dentro del sistema. Los administradores tienen acceso a todas las funciones, mientras que los alumnos y profesores cuentan con acceso a las funciones relevantes a su rol.

## Tecnologías Utilizadas

- **Lenguajes de Programación**: PHP, HTML, CSS, JavaScript
- **Framework Front-End**: Tailwind CSS, Bootstrap
- **Biblioteca JavaScript**: jQuery
- **Base de Datos**: MySQL
- **Herramienta de Control de Versiones**: Git
- **Plataforma de Desarrollo**: Visual Studio Code
- **Servidor Web**: https://www.000webhost.com




## Evaluación del Proyecto


**Interfaz de Usuario (UI)**: La interfaz de usuario ha sido diseñada con atención a los detalles, permitiendo una experiencia amigable para los usuarios. 

**Logo de la Universidad**: El logo de la universidad está presente en la interfaz de usuario.

**Funcionalidades por Rol**: Se han implementado funcionalidades específicas para cada rol de manera efectiva.

**Tailwind CSS**: El proyecto utiliza el framework de diseño Tailwind CSS para la maquetación y estilización de la interfaz. 

**Estructura del Proyecto**: La estructura del proyecto ha sido organizada de manera lógica y comprensible. Esto facilita el mantenimiento futuro y la escalabilidad del sistema.

**Repositorio en GitHub**: Los archivos del proyecto se encuentran alojados en un repositorio de GitHub. 

**Despliegue en Hosting**: El proyecto ha sido desplegado en el servicio de hosting 000webhost, y el enlace a la página desplegada está disponible en el repositorio de GitHub.

## Consideraciones Opcionales implementadas



**Activar/Desactivar Usuarios en el Panel de Administrador**: La funcionalidad de `activación/desactivación` de usuarios desde el panel de administrador ha sido implementada.

**Cantidad de Alumnos Inscritos por Clase**: Se puede visualizar la `cantidad de alumnos` inscritos en cada clase.

**CRUD de Calificaciones por Maestro**: Los maestros pueden gestionar las `calificaciones` a los alumnos.

**Mensaje de Maestro a Alumno en "Ver Calificaciones"**: Los alumnos pueden ver los `mensajes del maestro`.

**Plugin de Datatables**: El uso del plugin de `Datatables` para la visualización y manipulación de tablas ha sido implementada.

**Desarrollo Completo de la UI desde Cero**: La interfaz de usuario ha sido `desarrollada desde cero`, garantizando una experiencia única y coherente.

**Modo Oscuro**: Se implemento la funcionalidad de `Dark Mode` en todas las paguinas del proyecto.

## Funcionalidades Adicionales Acordes a la Lógica del Negocio:

**Multiples materias por maestros**: Los maestros pueden tener y gestionar `varias materias` desde la vista ***`Mis Clases`***.

**Foto de perlil**: Los usuarios pueden subir y modificar una su `foto de perfil`.

**Contraseña por defecto**: Se establece una `contraseña por defecto` la cual da acceso al perfil para que el usuario ponga una propia.

**Foto de materias**: Los profesores pueden subir una `foto para cada materia`.

**Pagina de documentacion**: El footer contiene un link hacia la `documentacion` del proyecto.


## Nota

Este proyecto demuestra un esfuerzo significativo en la implementación de las funcionalidades esenciales y en la creación de una interfaz de usuario atractiva y funcional. La incorporación de consideraciones opcionales podría agregar valor adicional y mejorar aún más la experiencia del usuario. Se recomienda revisar el código y la documentación para obtener una comprensión completa de las características implementadas.

## Autor

Este proyecto fue desarrollado por [Benjamin Tavarez](https://github.com/SirBeho), como parte del programa de  [Funval - Desarrollo web full strack](https://www.estudiantefunval.org/).

Si tienes alguna pregunta o comentario sobre este proyecto, no dudes en ponerte en contacto conmigo a través de [benjamin.tavarez.98@gmail.com](benjamin.tavarez.98@gmail.com) o en [LinkedIn](https://www.linkedin.com/in/benjamin-tavarez-cruceta-052aa623b/).
