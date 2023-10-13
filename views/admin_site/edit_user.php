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
            <div class="navbar-header ">
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
        <form role="search">
            <div class="form-group">
                <p style="color: rgb(33, 84, 84)"><i class="fa-solid fa-magnifying-glass"></i>Search</p>
                <input type="text" style="border-radius: 30px;" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li>
                <a href="dashboard.html" style="color: rgb(33, 84, 84); text-align: left;"><i class="fa-solid fa-gauge"></i>Dashboard</a>
            </li>
            <li class="active">
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
                <li><a href="#">User</a></li>
                <li class="active">Edit User</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12" style="text-align: center;">
                <h1 class="page-header">Edit user</h1>
            </div>
        </div><!--/.row-->
        <!--/.row-->
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
<!--                                <div class="alert alert-danger">Email đã tồn tại !</div>-->
                                <?php
                                    foreach ($user as $us){
                                ?>
                                        <form role="form" method="post" action="index.php?controller=user&action=update">
                                            <div class="form-group">
                                                <label>Họ & Tên</label>
                                                <input name="user_name" required class="form-control" value="<?=$us['user_name']?>" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input name="email" required type="text" value="<?=$us['email']?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input name="password" required type="password"  class="form-control">
                                            </div>
                                            <div>
                                                <button name="sbm" type="submit" class="btn btn-success" onclick="alert('Cập nhật user thành công')">Cập nhật</button>
                                            </div>
                                        </form>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div><!-- /.col-->
                </div><!-- /.row -->
            </div><!--/.row-->
        </div>
    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
</body>
</html>
