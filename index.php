<?php
    session_start();
    $controller = '';
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }

    switch ($controller){
        case 'product':
            if(isset($_SESSION['admin_name'])){
                include_once "controller/ProductController.php";
            }else{
                header('Location:index.php?controller=admin&action=login');
            }
            break;
        case 'category':
            include_once "controller/CategoryController.php";
            break;
        case 'user':
            include_once "controller/UserController.php";
            break;
        case 'brand':
            include_once "controller/BrandController.php";
            break;
        case 'payment':
            include_once "controller/PaymentController.php";
            break;
        case 'invoice':
            include_once "controller/InvoiceController.php";
            break;
        case 'admin':
            include_once "controller/AdminController.php";
            break;
        case 'home':
            include_once "controller/HomeController.php";
            break;

    }
?>