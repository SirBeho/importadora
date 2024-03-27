<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <script src="./js/funciones.js" defer></script>
    <link href="./css/output.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="index h-screen flex items-center justify-center">

    <button onclick="toggleDarkMode()" class="dark:bg-white bg-black rounded-full p-2 fixed bottom-4 right-4 w-8 h-8">
        <img src="./svg/dark.svg" class="block dark:hidden w-full h-full " alt="">
        <img src="./svg/light.svg" class="hidden dark:block w-full h-full m-0" alt="">
    </button>

   
  
    <div class="flex h-4/5 w-5/6 overflow-hidden justify-center sm:content-center font-['Open_Sans'] bg-gray-200 shadow-xl  rounded-xl z-20">
  
       
       
        <div class="flex justify-center items-center bg-white w-full h-full   ">
                    <img class="w-1/2 h-1/2 object-cover   " src="./pictures/logo_auto.jpg" alt="">
        </div>
       

        <div class="flex flex-col items-center p-5  w-full overflow-hidden sx:max-w-ssx sm:border border-gray-BD bg-gray-200 rounded-3xl text-gray-33  ">

            <div class="w-20">
                <img src="./pictures/auto.png" alt="">
            </div>

            <div class="my-8">
                <h3 class="font-semibold text-lg text-center" > Iniciar Sesion </h3>
                <h3 class="font-semibold text-sm text-center" > Bienvenido a Your Cart Spot </h3>
            </div>

            <!-- Formulario de inicio de sesión -->
            <form action="./php/login.php" method="post" class="w-full flex flex-col px-5 gap-4 relative text-gray-500">
                        
                <!-- Campo para el correo electrónico -->
                <div class="flex items-center gap-3 border border-gray-BD rounded-lg p-1 ps-4 bg-white h-10" >
                    <div class="w-4" ><img  src="./svg/email.svg" alt="logo"></div>
                    <input  class="bg-transparent outline-none" type="text" name="user" autocomplete="off" placeholder="Nombre Usuario" value="<?php echo isset($_SESSION['user']) ? ($_SESSION['user']  ): ''; unset($_SESSION['user']); ?>" required>
                </div>
                <!-- Campo para la contraseña -->
                <div class="flex items-center gap-3 border border-gray-BD rounded-lg p-1 ps-4 bg-white h-10">
                    <div class="w-4"><img src="./svg/password.svg" alt="logo"></div>
                    <input class="bg-transparent outline-none" type="password" name="password" autocomplete="off" placeholder="Contraseña" required >
                </div>

                <!-- Mostrar mensaje de error si está configurado -->
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-12 bottom-8" >' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <a  href="./pages/password.php" class="w-full text-center text-black  font-semibold">Olvidaste la contraseña</a>

                <!-- Botón para enviar el formulario -->
                <button class="w-1/2 py-3 mt-2 self-center bg-orange-600 rounded-lg text-sm leading-normal font-semibold text-white" type="submit">Iniciar Secion</button>
            </form>

            <!-- Sección de inicio de sesión con redes sociales -->
            <div class="mt-8 flex flex-col gap-6 items-center text-sm text-gray-500">
            
                <p class=" w-fit text-[17px] text-gray-33">¿No tienes una cuenta? <a href="./pages/register.php" class="text-orange-600">Registrate</a></p>
            </div>



        </div>
    </div>
</body>

</html>
<?php ob_end_flush(); ?>
