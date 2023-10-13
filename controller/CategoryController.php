<?php
    $action ='';
    if(isset($_GET['action'])){
        $action =$_GET['action'];
    }

    switch ($action){
        case '':
            include_once "model/CategoryModel.php";
            include_once "views/admin_site/category.php";
            break;
        case 'create':
            include_once "views/admin_site/add_category.php";
            break;
        case 'store':
            include_once "model/CategoryModel.php";
            header('Location:index.php?controller=category');
            break;
        case 'edit':
            include_once "model/CategoryModel.php";
            include_once "views/admin_site/edit_category.php";
            break;
        case 'update':
            include_once "model/CategoryModel.php";
            header('Location:index.php?controller=category');
            break;
        case 'destroy':
            include_once "model/CategoryModel.php";
            header('Location:index.php?controller=category');
            break;
    }
?>