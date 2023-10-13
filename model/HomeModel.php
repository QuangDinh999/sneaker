<?php
    function read() {
        include_once "connect/open.php";
        $sqlNew = "SELECT * FROM shoes WHERE shoes.shoes_category = 0 GROUP BY shoes_name";
        $new = mysqli_query($connect, $sqlNew);
        $sqlFeature = "SELECT * FROM shoes WHERE shoes.shoes_category = 1 GROUP BY shoes_name";
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
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['brand'] = $brand;
        return $array;
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
        include_once "connect/open.php";
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        $page = 1;
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        }
        $recordOnePage = 8;
        $sqlRecord = "SELECT COUNT(*) AS count_record FROM shoes WHERE shoes.shoes_name LIKE '%$search%'";
        $record = mysqli_query($connect, $sqlRecord);
        foreach ($record as $each){
            $Record = $each['count_record'];
        }

        $Countpage = ceil($Record / $recordOnePage);
        $start = ($page - 1) *  $recordOnePage;
        $end = $page * $recordOnePage;
        $sqlShoes = "SELECT * FROM shoes WHERE shoes.shoes_name LIKE '%$search%' LIMIT $start, $end";
        $shoes = mysqli_query($connect, $sqlShoes);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['shoes'] = $shoes;
        $array['brand'] = $brand;
        $array['search'] = $search;
        $array['page'] = $Countpage;
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
    function add_cart_detail() {
        $quantity_cart = $_POST['quantity_cart'];
        $shoes_id = $_GET['id'];
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$shoes_id])){
                $_SESSION['cart'][$shoes_id]++;
            }else{
                $_SESSION['cart'][$shoes_id] = $quantity_cart;
            }
        }else{
            $_SESSION['cart'] = array();
            $_SESSION['cart'][$shoes_id] = $quantity_cart;
        }
    }
    function cart(){
        $cart = array();
        $temp = array();
        include_once "connect/open.php";
        $sqlPayment = "SELECT * FROM payment_method";
        $payment = mysqli_query($connect, $sqlPayment);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        $totalprice = 0;
        foreach ($_SESSION['cart'] as $shoes_id => $quantity){
            $sql = "SELECT shoes_name, price, image FROM shoes WHERE shoes_id = '$shoes_id'";
            $shoes = mysqli_query($connect, $sql);
            foreach ($shoes as $sho) {
                $temp[$shoes_id]['shoes_name'] = $sho['shoes_name'];
                $temp[$shoes_id]['price'] = $sho['price'];
                $temp[$shoes_id]['image'] = $sho['image'];
                $temp[$shoes_id]['quantity'] = $quantity;
                $temp[$shoes_id]['total'] = $sho['price']*$quantity;
                $temp[$shoes_id]['totalprice'] = $totalprice += $temp[$shoes_id]['total'];
            }
        }
        include_once "connect/close.php";
        $cart['shoes'] = $temp;
        $cart['payment'] = $payment;
        return $cart;
    }

    function cart_history() {
        $user_id = $_SESSION['user_id'];
        include_once "connect/open.php";
        $sqlInvoice = "SELECT * FROM detail_invoice
                       INNER JOIN shoes ON detail_invoice.shoes_id = shoes.shoes_id
                       INNER JOIN invoice ON detail_invoice.invoice_id = invoice.invoice_id WHERE user_id = '$user_id'ORDER BY invoice.invoice_id DESC";
        $invoices = mysqli_query($connect, $sqlInvoice);
        $sqlBrand = "SELECT * FROM brand";
        $brand = mysqli_query($connect, $sqlBrand);
        include_once "connect/close.php";
        $array = array();
        $array['invoices'] = $invoices;
        $array['brand'] = $brand;
        return $array;

    }
    function delete_invoice() {
        $shoes_id = $_GET['id'];
        $invoice_status = $_GET['status'];
        if($invoice_status == 0){
            include_once "connect/open.php";
            $sqlDetail = "UPDATE detail_invoice SET status_detail = 1 WHERE shoes_id = '$shoes_id'";
            $detail = mysqli_query($connect, $sqlDetail);
            include_once "connect/close.php";
            return 0;
        }else{
            return 1;

        }
    }
    function update_cart() {
        $items = $_POST['quantity'];
        foreach ($items as $shoes_id => $quantity){
            if($quantity <= 0){
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
            $status_detail = 0;
            $sqlDetailInvoice = "INSERT INTO detail_invoice VALUES ('$product_id', '$invoice_id', '$quantity', '$price', '$status_detail')";
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
            $array = detail();
            break;
        case 'category':
            $array = category();
            break;
        case 'add_cart':
            add_cart();
            break;
        case 'add_cart_detail':
            add_cart_detail();
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
        case 'cart_history':
            $array = cart_history();
            break;
        case 'delete_invoice':
            $test = delete_invoice();
            break;
    }
?>