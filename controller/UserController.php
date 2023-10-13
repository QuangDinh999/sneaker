<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch ($action){
        case '':
            include_once "model/UserModel.php";
            include_once "views/admin_site/user.php";
            break;
        case 'create':
            include_once "views/admin_site/add_user.php";
            break;
        case 'store':
            include_once "model/UserModel.php";
            header('Location:index.php?controller=user');
            break;
        case 'edit':
            include_once "model/UserModel.php";
            include_once "views/admin_site/edit_user.php";
            break;
        case 'update':
            include_once "model/UserModel.php";
            header('Location:index.php?controller=user');
            break;
        case 'destroy':
            include_once "model/UserModel.php";
            header('Location:index.php?controller=user');
            break;
        case 'signup':
            include_once "views/signin.php";
            break;
        case 'signup_process':
            include_once "model/UserModel.php";
            header('Location:index.php?controller=user&action=login');
            break;
        case 'login':
            include_once "views/login.php";
            break;
        case 'login_process':
            include_once "model/UserModel.php";
            if($tests == 0){
                header('Location:index.php?controller=user&action=login');
            }else{
                header('Location:index.php?controller=home');
            }
            break;
        case 'logout':
            include_once "model/UserModel.php";
            header('Location:index.php?controller=home');
            break;
    }
?>