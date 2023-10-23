<?php
session_start();

unset($_SESSION['useradmin']);
unset($_SESSION['user_id']);
unset($_SESSION['name'] );
unset($_SESSION['image']);

header('Location:login.php');