<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link href="views/admin_site/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/admin_site/css/datepicker3.css" rel="stylesheet">
    <link href="views/admin_site/css/bootstrap-table.css" rel="stylesheet">
    <link href="views/admin_site/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
    <nav class="navbar navbar-light navbar-fixed-top" style="background-color: rgb(33, 84, 84);" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="" alt="">
                    <span style="color: white; font-family:'Times New Roman', Times, serif; padding-left: 20px; font-size: x-large">ADMIN</span>
                </a>
                <ul class="user-menu">
                    <li>
                        <a href="#" style="font-size: large"><i class="fa-solid fa-right-to-bracket"></i>  Log Out</span></a>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color: rgb(213, 206, 207)">
        <form method="post">
            <div class="form-group">
                <p style="color: rgb(33, 84, 84)"><i class="fa-solid fa-magnifying-glass"></i>Search</p>
                <input type="text" name="search" style="border-radius: 30px;" value="<?=$array['search']?>" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li>
                <a href="dashboard.html" style="color: rgb(33, 84, 84); text-align: left;"><i class="fa-solid fa-gauge"></i>Dashboard</a>
            </li>
            <li>
                <a href="index.php?controller=user" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-users"></i>  User management</a>
            </li>
            <li>
                <a href="index.php?controller=category" style="color:rgb(33, 84, 84);text-align: left; "><i class="fa-regular fa-folder-open"></i>Categories management</a>
            </li>
            <li>
                <a href="index.php?controller=product" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-cart-shopping"></i> Product management</a>
            </li>
            <li>
                <a href="index.php?controller=brand" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-copyright"></i> Brand management</a>
            </li>
            <li class="active">
                <a href="index.php?controller=invoice" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-file-invoice-dollar"></i> Invoice management</a>
            </li>
            <li>
                <a href="index.php?controller=payment" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-regular fa-credit-card"></i> Payment management</a>
            </li>
        </ul>
    </div>
    </div><!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa-solid fa-house-user"></i></a></li>
                <li class="active">Invoice</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
                <h1 class="page-header">Invoice</h1>
            </div>
        </div><!--/.row-->
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" class="table" data-toggle="table">
                            <thead >
                            <tr>
                                <th>ID hóa đơn</th>
                                <th>Khách Hàng</th>
                                <th>PTTT</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($array['invoice'] as $item){
                                ?>
                                <tr>
                                    <td style=""><?=$item['invoice_id']?></td>
                                    <td style=""><?=$item['user_name']?></td>
                                    <td><?=$item['payment_name']?></td>
                                    <td><?=$item['invoice_date']?></td>
                                    <td>
                                        <?php
                                        if($item['invoice_status'] == 0){
                                            echo '<span class = "label label-warning">đang chờ</span>';
                                        }else{
                                            echo '<span class = "label label-success">đã duyệt</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="form-group">
                                        <a href="index.php?controller=invoice&action=detail_invoice&id=<?=$item['invoice_id']?>" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="index.php?controller=invoice&action=disapproval&id=<?=$item['invoice_id']?>" onclick="alert('Đơn hàng đã được duyệt')"  class="btn btn-success"><i class="fa-solid fa-circle-check"></i></a>
                                        <a href="index.php?controller=invoice&action=approval&id=<?=$item['invoice_id']?>" onclick="alert('Đơn hàng chưa được duyệt')" class="btn btn-warning"><i class="fa-solid fa-circle-xmark"></i></a>
                                        <a href="index.php?controller=invoice&action=destroy&invoice_id=<?=$item['invoice_id']?>" onclick=delete_invoice(); class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer" style="text-align: center">
                        <?php
                        for($i = 1; $i < $array['page']; $i++){
                            ?>
                            <form style="display: inline-block" method="post" action="index.php?controller=invoice">
                                <input type="hidden" name="page" value="<?=$i ?>">
                                <input type="hidden" name="search" value="<?=$array['search']?>">
                                <button class="btn btn-primary">
                                    <?= $i ?>
                                </button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->

<!--        <script src="js/jquery-1.11.1.min.js"></script>-->
<!--        <script src="js/bootstrap.min.js"></script>-->
<!--        <script src="js/bootstrap-table.js"></script>-->
    <script>
        function delete_invoice(){
            document.querySelector('a').addEventListener('click', (e)=>{
                let isComfirm = confirm('Bạn co chắc chắn muốn xoa đơn Hàng');
                e.preventDefault();
                if(isComfirm){
                    alert('xoa don hang thanh cong');
                }else{
                    alert('xoa don hang khong thanh cong');
                }
            });
        }

    </script>
</body>
</html>
</body>
</html>