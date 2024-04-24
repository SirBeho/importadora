<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "mydb2");
       
} catch (mysqli_sql_exception $e) {
    echo "Error:". $e->getMessage();
}