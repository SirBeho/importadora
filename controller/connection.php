<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "university");
    //$mysqli = new mysqli("localhost", "id21077355_root", "@Motor0009896", "id21077355_root");
    
} catch (mysqli_sql_exception $e) {
    echo "Error:". $e->getMessage();
}