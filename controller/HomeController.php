<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch ($action){
        case '':
            include_once "model/HomeModel.php";
            include_once "views/home.php";
            include_once "views/header/header.php";
            break;
        case 'list':
            include_once "model/HomeModel.php";
            include_once "views/shop.php";
            break;
        case 'search':
            include_once "model/HomeModel.php";
            include_once "views/search.php";
            break;
        case 'detail':
            include_once "model/HomeModel.php";
            include_once "views/detail.php";
            break;
        case 'category':
            include_once "model/HomeModel.php";
            include_once "views/category.php";
            break;
        case 'add_cart':
            include_once "model/HomeModel.php";
            header('Location:index.php?controller=home&action=cart');
            break;
        case 'cart':
            include_once "model/HomeModel.php";
            include "views/cart.php";
            break;
        case 'update_cart':
            include_once "model/HomeModel.php";
            header('Location:index.php?controller=home&action=cart');
            break;
        case 'delete_one_shoes':
            include_once "model/HomeModel.php";
            header('Location:index.php?controller=home&action=cart');
            break;
        case 'delete_cart':
            include_once "model/HomeModel.php";
            header('Location:index.php?controller=home&action=cart');
            break;
        case 'add_order':
            include "model/HomeModel.php";
            header('Location:index.php?controller=home&action=success');
            break;
        case 'success':
            include "views/success.php";
            break;
    }
?>