<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action){
        case '':
            include_once "model/ProductModel.php";
            include_once "views/admin_site/product.php";
            break;
        case 'create':
            include_once "model/ProductModel.php";
            include_once "views/admin_site/add_product.php";
            break;
        case 'store':
            include_once "model/ProductModel.php";
            header('Location:index.php?controller=product');
            break;
        case 'edit':
            include_once "model/ProductModel.php";
            include_once "views/admin_site/edit_product.php";
            break;
        case 'update':
            include_once "model/ProductModel.php";
            header('Location:index.php?controller=product');
            break;
        case 'destroy':
            include_once "model/ProductModel.php";
            header('Location:index.php?controller=product');
            break;
    }
?>