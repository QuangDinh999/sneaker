<?php
    function read(){
        include_once "connect/open.php";
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $page = 1;
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        }
        $recordOnePage = 3;
        $sqlRecord = "SELECT COUNT(*) AS count_record FROM shoes INNER JOIN category ON shoes.category_id = category.category_id 
                INNER JOIN brand ON shoes.brand_id = brand.brand_id WHERE shoes.shoes_name LIKE '%$search%'";
        $record = mysqli_query($connect, $sqlRecord);
        foreach ($record as $each){
            $Record = $each['count_record'];
        }
        $Countpage = ceil($Record / $recordOnePage);
        $start = ($page - 1) * $recordOnePage;
        $sql = "SELECT * FROM shoes INNER JOIN category ON shoes.category_id = category.category_id 
                INNER JOIN brand ON shoes.brand_id = brand.brand_id WHERE shoes.shoes_name LIKE '%$search%' ORDER BY shoes_id DESC LIMIT $start, $recordOnePage";
        $shoes = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['search'] = $search;
        $array['page'] = $Countpage;
        return $array;
    }
    function create(){
        include_once "connect/open.php";
        $sql = "SELECT * FROM brand";
        $brand= mysqli_query($connect, $sql);
        $sqlcategory = "SELECT * FROM category";
        $category= mysqli_query($connect, $sqlcategory);
        include_once "connect/close.php";
        $array = array();
        $array['brand'] = $brand;
        $array['category'] = $category;
        return $array;
    }
    function store(){
        $shoes_name =$_POST['shoes_name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $image = $_FILES['image']['name'];
        $brand_id = $_POST['brand_id'];
        $category_id = $_POST['category_id'];
        $shoes_status = $_POST['shoes_status'];
        $description = $_POST['description'];
        include_once "connect/open.php";
        if($price && $size >= 0){
            $sql = "INSERT INTO shoes(shoes_name, price, size, color,image, brand_id, category_id, shoes_status, description) 
            VALUES ('$shoes_name', '$price', '$size', '$color', '$image', '$brand_id','$category_id', '$shoes_status', '$description')";
            $shoes = mysqli_query($connect, $sql);
        }else{
            header("Location:index.php?controller=product&action=create");
            $errors['$price'] = '<span style = "color:red">Ten san pham khong duoc de trong</span>';
        }
        include_once "connect/close.php";
        $source = $_FILES['image']['tmp_name'];
        $destination = "views/img/shoes/".$image;
        move_uploaded_file($source, $destination);
    }

    function edit() {
        $shoes_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM shoes WHERE shoes_id = '$shoes_id'";
        $shoes = mysqli_query($connect, $sql);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        $sqlCategory = "SELECT * FROM category";
        $category = mysqli_query($connect, $sqlCategory);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['brand'] = $brand;
        $array['category'] = $category;
        return $array;
    }
    function update() {
        include_once "connect/open.php";
        $shoes_id = $_POST['shoes_id'];
        $sql = "SELECT * FROM shoes WHERE shoes_id = '$shoes_id'";
        $shoes = mysqli_query($connect, $sql);
        $shoes_name =$_POST['shoes_name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        if(!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $prd_tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($prd_tmp_name, "views/img/Shoes/".$image);
        }else {
            foreach ($shoes as $sho){
                $image = $sho['image'];
            }
        }
        $brand_id = $_POST['brand_id'];
        $category_id = $_POST['category_id'];
        $shoes_status = $_POST['shoes_status'];
        $description = $_POST['description'];
        $sql = "UPDATE shoes SET shoes_name = '$shoes_name', price = '$price', size = '$size', color = '$color', image = '$image',
                brand_id = '$brand_id', category_id = '$category_id', shoes_status = '$shoes_status',
                 description = '$description' WHERE shoes_id = '$shoes_id'";
        $shoes = mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }

    function destroy(){
        $shoes_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "DELETE FROM shoes WHERE shoes_id = '$shoes_id'";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }

    switch ($action){
        case '':
            $array = read();
            break;
        case 'create':
            $array = create();
            break;
        case 'store':
            store();
            break;
        case 'edit':
            $array = edit();
            break;
        case 'update':
            update();
            break;
        case 'destroy':
            destroy();
            break;
    }
?>