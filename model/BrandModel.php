<?php
    function read(){
        include_once "connect/open.php";
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $sql = "SELECT * FROM brand WHERE brand.brand_name LIKE '%$search%'";
        $brand = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['brand'] = $brand;
        $array['search'] = $search;
        return $array;
    }
    function store() {
        $brand_name = $_POST['brand_name'];
        include_once "connect/open.php";
        $sql = "INSERT INTO brand (brand_name) VALUES ('$brand_name')";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function edit(){
        $brand_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM brand WHERE brand_id = '$brand_id'";
        $brand = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $brand;
    }
    function update(){
        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        include_once "connect/open.php";
        $sql = "UPDATE brand SET brand_name = '$brand_name'WHERE brand_id = '$brand_id'";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $brand;
    }
    function destroy(){
        $brand_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "DELETE FROM brand WHERE brand_id = '$brand_id'";
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
            $brand = edit();
            break;
        case 'update':
            update();
            break;
        case 'destroy':
            destroy();
            break;
    }
?>