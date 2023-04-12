<?php
    function read() {
        include_once "connect/open.php";
        $sqlNew = "SELECT * FROM shoes WHERE shoes.shoes_category = 0";
        $new = mysqli_query($connect, $sqlNew);
        $sqlFeature = "SELECT * FROM shoes WHERE shoes.shoes_category = 1";
        $feature = mysqli_query($connect, $sqlFeature);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['new'] = $new;
        $array['feature'] = $feature;
        $array['brand'] = $brand;
        return $array;
    }
    function detail() {
        $shoes_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM shoes WHERE shoes_id = '$shoes_id'";
        $shoes = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $shoes;
    }

    function shoplist(){
        $brand_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM shoes  WHERE brand_id = '$brand_id'";
        $shoes = mysqli_query($connect, $sql);
        $sqlBrands = "SELECT * FROM brand WHERE brand_id = '$brand_id'";
        $brands = mysqli_query($connect, $sqlBrands);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['brand'] = $brand;
        $array['brands'] = $brands;
        return $array;
    }

    function search() {
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        include_once "connect/open.php";
        $sqlShoes = "SELECT * FROM shoes WHERE shoes.shoes_name LIKE '%$search%'";
        $shoes = mysqli_query($connect, $sqlShoes);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['brand'] = $brand;
        $array['search'] = $search;
        return $array;
    }
    function category(){
        $id = $_GET['category_id'];
        include_once "connect/open.php";
        $sqlShoes = "SELECT * FROM shoes WHERE category_id = '$id'";
        $shoes = mysqli_query($connect, $sqlShoes);
        $sqlCategory = "SELECT * FROM category WHERE category_id = '$id'";
        $category = mysqli_query($connect, $sqlCategory);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['category'] = $category;
        return $array;
    }

    function add_cart() {
        $shoes_id = $_GET['id'];
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$shoes_id])){
                $_SESSION['cart'][$shoes_id]++;
            }else{
                $_SESSION['cart'][$shoes_id] = 1;
            }
        }else{
            $_SESSION['cart'] = array();
            $_SESSION['cart'][$shoes_id] = 1;
        }
    }
    function cart(){
        $cart = array();
        $temp = array();
        include_once "connect/open.php";
        $sqlPayment = "SELECT * FROM payment_method";
        $payment = mysqli_query($connect, $sqlPayment);
        foreach ($_SESSION['cart'] as $shoes_id => $quantity){
            $sql = "SELECT shoes_name, price, image FROM shoes WHERE shoes_id = '$shoes_id'";
            $shoes = mysqli_query($connect, $sql);
            foreach ($shoes as $sho) {
                $temp[$shoes_id]['shoes_name'] = $sho['shoes_name'];
                $temp[$shoes_id]['price'] = $sho['price'];
                $temp[$shoes_id]['image'] = $sho['image'];
                $temp[$shoes_id]['quantity'] = $quantity;
                $temp[$shoes_id]['total'] = $sho['price']*$quantity;
            }
        }
        include_once "connect/close.php";
        $cart['shoes'] = $temp;
        $cart['payment'] = $payment;
        return $cart;
    }
    function update_cart() {
        $items = $_POST['quantity'];
        foreach ($items as $shoes_id => $quantity){
            if($quantity < 0){
                echo "<script> alert('cap nhat khong thanh cong');</script>";
            }else{
                $_SESSION['cart'][$shoes_id] = $quantity;
            }
        }
    }
    function delete_one_shoes(){
        $shoes_id = $_GET['id'];
        unset($_SESSION['cart'][$shoes_id]);
    }
    function delete_cart(){
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
    }
    function add_order() {
        $payment_id = $_POST['payment'];
        $invoice_date = date("Y-m-d");
        $invoice_status = 0;
        $user_id = $_SESSION['user_id'];
        $admin_id = $_SESSION['admin_id'];
        include_once "connect/open.php";
        $sql = "INSERT INTO invoice(payment_id, user_id, admin_id, invoice_date, invoice_status) 
                       VALUES ('$payment_id', '$user_id', '$admin_id', '$invoice_date', '$invoice_status')";
        $invoice = mysqli_query($connect, $sql);

        $sqlInvoice = "SELECT MAX(invoice_id) AS invoice_id FROM invoice WHERE user_id = '$user_id'";
        $invoices = mysqli_query($connect, $sqlInvoice);
        foreach ($invoices as $item){
            $invoice_id = $item['invoice_id'];
        }

        foreach ($_SESSION['cart'] as $product_id => $quantity){
            $sqlprice = "SELECT price FROM shoes WHERE shoes_id = '$product_id'";
            $Shoesprice = mysqli_query($connect, $sqlprice);
            foreach ($Shoesprice as $value){
                $price = $value['price'];
            }
            $sqlDetailInvoice = "INSERT INTO detail_invoice VALUES ('$product_id', '$invoice_id', '$quantity', '$price')";
            mysqli_query($connect, $sqlDetailInvoice);
        }
        include_once "connect/close.php";
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
    }



    switch ($action){
        case '':
            $array = read();
            break;
        case 'list':
            $array = shoplist();
            break;
        case 'search':
            $array = search();
            break;
        case 'detail':
            $shoes = detail();
            break;
        case 'category':
            $array = category();
            break;
        case 'add_cart':
            add_cart();
            break;
        case 'cart':
            $cart = cart();
            break;
        case 'update_cart':
            update_cart();
            break;
        case 'delete_one_shoes':
            delete_one_shoes();
            break;
        case 'delete_cart':
            delete_cart();
            break;
        case 'add_order':
            add_order();
            break;
    }
?>