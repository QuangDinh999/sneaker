<?php
    function read() {
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        include_once "connect/open.php";
        $sql = "SELECT * FROM payment_method WHERE payment_method.payment_name LIKE '%$search%'";
        $payment = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['payment'] = $payment;
        $array['search'] = $search;
        return $array;
    }
    function store() {
        $payment_name = $_POST['payment_name'];
        include_once "connect/open.php";
        $sql = "INSERT INTO payment_method (payment_name) VALUES ('$payment_name')";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function edit() {
        $payment_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM payment_method WHERE payment_id = '$payment_id'";
        $payment = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $payment;
    }
    function update() {
        $payment_id = $_POST['payment_id'];
        $payment_name = $_POST['payment_name'];
        include_once "connect/open.php";
        $sql = "UPDATE payment_method SET payment_name = '$payment_name' WHERE payment_id = '$payment_id'";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function destroy() {
        $payment_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "DELETE FROM payment_method WHERE payment_id = '$payment_id'";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }

    switch ($action){
        case '':
            $array = read();
            break;
        case 'store':
            store();
            break;
        case 'edit':
            $payment = edit();
            break;
        case 'update':
            update();
            break;
        case 'destroy':
            destroy();;
            break;


    }
?>