<?php


include '../functions/error.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
    }
extract($_POST);

    require("./connection.php");

    $status = isset($_POST["status"]) ? 1 : 0 ;

    $query = "UPDATE usuario SET correo='$email',us_permiso='$permiso',us_status=$status WHERE idUsuario='$id'";

    if (($id != $_SESSION['usuario']['idUsuario']) and $mysqli->query($query) === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

        if ($id == $_SESSION['usuario']['idUsuario']) {
            $_SESSION['error_message'] = "No puedes actualizar tus propios permisos";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    }

    header("Location: ../view/permisos.php");
    exit;
};
