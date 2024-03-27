<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    extract($_POST);

    require("connection.php");
    
    $resultado = $mysqli -> query("select * from usuario where NombreUser = '$user'");
    $resultado = $resultado-> fetch_assoc();
   


    
    /* if($resultado && password_verify($password, $resultado['password'])){ */
        if($resultado && $password == $resultado['PasswUser']){
            $persona = $mysqli -> query("select * from persona join correos on persona.idcorreo = correos.idcorreos join direccion on persona.idDireccion = direccion.idPersona join telefono on persona.idtelefono = telefono.idtelefono join usuario on persona.idPersona = usuario.idUsuario where persona.idPersona = '".$resultado['idPersona']."'");
            $persona = $persona-> fetch_assoc();
            $_SESSION['persona'] = $persona;
            $_SESSION['usuario'] = $persona;
            header("Location: ../pages/dashboard.php");
           
            exit;
        } else {
            $_SESSION['login_email'] = $user;
            $_SESSION['error_message'] = "Usuario o contraseña incorecta";
            header("Location: ../index.php");
            exit;
        }  
};
