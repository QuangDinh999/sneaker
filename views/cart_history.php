<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Giỏ hàng</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="views/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include "header/header.php";
    ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid pt-4">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php?controller=home">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Cart History</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Hóa Đơn</th>
                            <th>Sản Phẩm</th>
                            <th>Giá Mỗi sản phẩm</th>
                            <th>Ngày Mua</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Xác nhận đơn hàng</th>
                            <th>Hủy đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        foreach ($array['invoices'] as $invoice){
                            ?>
                            <tr>
                                <td class="align-middle"><?=$invoice['invoice_id']?></td>
                                <td class="align-middle"><?=$invoice['shoes_name']?></td>
                                <td class="align-middle"><?=number_format($invoice['price_each_product'],0,',','.')?> VND</td>
                                <td class="align-middle"><?=$invoice['invoice_date']?></td>
                                <td class="align-middle">
                                    <?php
                                        if($invoice['invoice_status'] == 0) {
                                            echo "Đang chờ";
                                        }else{
                                            echo "Đã Duyệt";
                                        }
                                    ?>
                                </td>
                                <td class="align-middle">
                                    <?php
                                    if($invoice['status_detail'] == 0) {
                                        echo '<span style="color: #1e7e34">Mua Đơn Hàng</span>';
                                    }else{
                                        echo '<span style="color: #e00923">Hủy Đơn Hàng</span>';
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><a href="index.php?controller=home&action=delete_invoice&id=<?=$invoice['shoes_id']?>&status=<?=$invoice['invoice_status']?>" onclick="confirmcart()" class="btn btn-danger font-weight-bold"  style="margin-bottom: 10px; margin-left: 20px; width: 200px; height: 40px;">Hủy Đơn Hàng</a></td>
                            </tr>
                            <?php
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <?php include "footer/footer.php";?>
    <script>
        function confirmcart(){
            if(confirm("Bạn co chắc chắn muốn hủy đơn Hàng ")){

            }else{
                alert('huy don hang that bai');
            }
        }
    </script>
</body>

</html>