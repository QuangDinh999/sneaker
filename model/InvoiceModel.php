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
        $recordOnePage = 4;
        $sqlRecord = "SELECT COUNT(*) AS count_record FROM invoice 
                      INNER JOIN user ON invoice.user_id = user.user_id 
                      INNER JOIN payment_method ON invoice.payment_id = payment_method.payment_id WHERE user.user_name LIKE '%$search%'";
        $record = mysqli_query($connect, $sqlRecord);
        foreach ($record as $each){
            $Record = $each['count_record'];
        }

        $Countpage = ceil($Record / $recordOnePage);
        $start = ($page - 1) *  $recordOnePage;
        $sql = "SELECT * FROM invoice 
                INNER JOIN user ON invoice.user_id = user.user_id
                INNER JOIN admin ON invoice.admin_id = admin.admin_id
                INNER JOIN payment_method ON invoice.payment_id = payment_method.payment_id WHERE user.user_name LIKE '%$search%' ORDER BY invoice_id DESC LIMIT $start, $recordOnePage";
        $invoice = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array =array();
        $array['invoice'] = $invoice;
        $array['search'] = $search;
        $array['page'] = $Countpage;
        return $array;
    }

    function detail_invoice() {
        $invoice_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM detail_invoice WHERE invoice_id = '$invoice_id'";
        $detail_invoice = mysqli_query($connect, $sql);
        $sqlshoes = "SELECT shoes.shoes_id,shoes.shoes_name FROM shoes";
        $shoes = mysqli_query($connect, $sqlshoes);
        include_once "connect/close.php";
        $array =array();
        $array['detail_invoice'] = $detail_invoice;
        $array['shoes'] = $shoes;
        return $array;
    }
    function approval()
    {
        $invoice_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT invoice.invoice_status FROM invoice WHERE invoice_id = '$invoice_id'";
        $invoice = mysqli_query($connect, $sql);
        foreach ($invoice as $value) {
            if ($value['invoice_status'] == 1) {
                $sqlupdate2 = "UPDATE invoice SET invoice_status = 0 WHERE invoice_id = '$invoice_id'";
                $update2 = mysqli_query($connect, $sqlupdate2);
                echo "<script>alert('Thông báo hiển thị!');</script>";

            }
            include_once "connect/close.php";
        }
    }
    function disapproval() {
        $invoice_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT invoice.invoice_status FROM invoice WHERE invoice_id = '$invoice_id'";
        $invoice = mysqli_query($connect, $sql);
        foreach ($invoice as $value){
            if($value['invoice_status'] == 0){
                $sqlupdate2 = "UPDATE invoice SET invoice_status = 1 WHERE invoice_id = '$invoice_id'";
                $update2 = mysqli_query($connect, $sqlupdate2);
            }
        }
        include_once "connect/close.php";
    }

    function destroy(){
        $invoice_id = $_GET['invoice_id'];
        include_once "connect/open.php";
        $sqlDetail = "SELECT detail_invoice.invoice_id FROM detail_invoice";
        $details = mysqli_query($connect, $sqlDetail);
        foreach ($details as $detail){
            $detail_id = $detail['invoice_id'];
            if($detail_id == $invoice_id){
                header('Location:index.php?controller=invoice');
            }elseif ($detail_id != $invoice_id){
                $sql = "DELETE FROM invoice WHERE invoice_id = '$invoice_id'";
                mysqli_query($connect, $sql);
            }
        }

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
        case 'detail_invoice':
            $array = detail_invoice();
            break;
        case 'approval':
            approval();
            break;
        case 'disapproval':
            disapproval();
            break;
        case 'destroy':
            destroy();
            break;
    }
?>