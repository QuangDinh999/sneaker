<?php
    $action ='';
    if(isset($_GET['action'])){
        $action =$_GET['action'];
    }
    switch ($action){
        case '':
            include_once "model/InvoiceModel.php";
            include_once "views/admin_site/invoice.php";
            break;
        case 'detail_invoice':
            include_once "model/InvoiceModel.php";
            include_once "views/admin_site/detail_invoice.php";
            break;
        case 'approval':
            include_once "model/InvoiceModel.php";
            header('Location:index.php?controller=invoice');
            echo "<script> alert('Product has been inserted sucessfully');</script>";
            break;
        case 'disapproval':
            include_once "model/InvoiceModel.php";
            header('Location:index.php?controller=invoice');
            break;
        case 'destroy':
            include_once "model/InvoiceModel.php";
            header('Location:index.php?controller=invoice');
            break;

    }
?>