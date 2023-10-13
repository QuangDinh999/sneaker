<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch ($action){
        case '':
            include_once "model/PaymentModel.php";
            include_once "views/admin_site/paymentmethod.php";
            break;
        case 'create':
            include_once "views/admin_site/add_payment.php";
            break;
        case 'store':
            include_once "model/PaymentModel.php";
            header('Location:index.php?controller=payment');
            break;
        case 'edit':
            include_once "model/PaymentModel.php";
            include_once "views/admin_site/edit_payment.php";
            break;
        case 'update':
            include_once "model/PaymentModel.php";
            header('Location:index.php?controller=payment');
            break;
        case 'destroy':
            include_once "model/PaymentModel.php";
            header('Location:index.php?controller=payment');
            break;
    }
?>