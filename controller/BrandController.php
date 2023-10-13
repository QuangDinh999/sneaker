<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action){
        case '':
            include_once "model/BrandModel.php";
            include_once "views/admin_site/brand.php";
            break;
        case 'create':
            include_once "views/admin_site/add_brand.php";
            break;
        case 'store':
            include_once "model/BrandModel.php";
            header('Location:index.php?controller=brand');
            break;
        case 'edit':
            include_once "model/BrandModel.php";
            include_once "views/admin_site/edit_brand.php";
            break;
        case 'update':
            include_once "model/BrandModel.php";
            header('Location:index.php?controller=brand');
            break;
        case 'destroy':
            include_once "model/BrandModel.php";
            header('Location:index.php?controller=brand');
            break;
    }
?>