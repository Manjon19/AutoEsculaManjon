<?php
    $rol=$_SESSION['rol'];
    if ($rol==0) {
        include_once("menu_noadmin.php");
    }else{
        include_once("menu_admin.php");
    }
?>