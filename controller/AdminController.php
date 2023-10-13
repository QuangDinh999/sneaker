<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    switch ($action){
        case '':
            include_once "model/AdminModel.php";
            include_once "views/admin_site/admin.php";
            break;
        case 'login':
            include_once "views/admin_site/login_admin/login.php";
            break;
        case 'login_process':
            include_once "model/AdminModel.php";
            if($back == 0){
                header('Location:index.php?controller=admin&action=login');
            }else{
                header('Location:index.php?controller=admin');
            }
            break;
        case 'logout':
            include_once "model/AdminModel.php";
            header('Location:index.php?controller=home&action=login');
            break;
    }
?>