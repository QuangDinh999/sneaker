<?php
    function read(){
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        include_once "connect/open.php";
        $sql = "SELECT * FROM category WHERE category.category_name LIKE '%$search%'";
        $category = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['category'] = $category;
        $array['search'] = $search;
        return $array;
    }
    function store() {
        $category_name = $_POST['category_name'];
        include_once "connect/open.php";
        $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function edit(){
        $category_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM category WHERE category_id = '$category_id'";
        $category = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $category;
    }
    function update () {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        include_once "connect/open.php";
        $sql = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$category_id'";
        $category = mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function destroy () {
        $category_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "DELETE FROM category WHERE category_id = '$category_id'";
        $category = mysqli_query($connect, $sql);
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
            $category = edit();
            break;
        case 'update':
            update();
            break;
        case 'destroy':
            destroy();
            break;
    }
?>