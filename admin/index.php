<?php
    session_start();
    if(!isset($_SESSION['useradmin'])){
        header('Location:login.php');
    }
    require_once '../vendor/autoload.php';
    Route::route_admin();
?>