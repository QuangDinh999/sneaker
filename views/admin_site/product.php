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
                <li class="active">
                    <a href="index.php?controller=product" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-cart-shopping"></i> Product management</a>
                </li>
                <li>
                    <a href="index.php?controller=brand" style="color: rgb(33, 84, 84);text-align: left;"><i class="fa-solid fa-copyright"></i> Brand management</a>
                </li>
                <li>
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
                <li class="active">Product List</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
                <h1 class="page-header">Product List</h1>
            </div>
        </div><!--/.row-->
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="index.php?controller=product&action=create" class="btn btn-primary">
                <i class="fa-solid fa-list"></i> Add product
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" class="table" data-toggle="table">
                            <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="name" data-sortable="true">Size</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Thương Hiệu</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($array['shoes'] as $sho){
                                    ?>
                                    <tr>
                                        <td style=""><?=$sho['shoes_id']?></td>
                                        <td style=""><?=$sho['shoes_name']?></td>
                                        <td style=""><?=$sho['size']?></td>
                                        <td style=""><?=number_format($sho['price'],0,',','.')?>VND</td>
                                        <td class="product-img">
                                            <img width="90" height="120" src="views/img/shoes/<?=$sho['image']?>"/></td>
                                        <td>
                                            <?php
                                            if($sho['shoes_status'] == 0){
                                                echo '<span class = "label label-danger">Hết Hàng</span>';
                                            }else{
                                                echo '<span class = "label label-success">Còn Hàng</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?=$sho['brand_name']?></td>
                                        <td class="form-group">
                                            <a href="index.php?controller=product&action=edit&id=<?=$sho['shoes_id']?>" class="btn btn-success"><i class="fa-regular fa-square-plus"></i></a>
                                            <a href="index.php?controller=product&action=destroy&id=<?=$sho['shoes_id']?>" onclick="alert('Xóa sản phẩm thành công')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></i></a>
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
                            <form style="display: inline-block" method="post" action="index.php?controller=product">
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

<!--    <script src="js/jquery-1.11.1.min.js"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
<!--    <script src="js/bootstrap-table.js"></script>-->
</body>
</html>
</body>
</html>