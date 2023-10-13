<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trang chủ</title>
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
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block pt-3 pb-3">
                <a href="index.php?controller=home" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">REAL</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SNEAKER</span>
                </a>
            </div>

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block pt-3">
                            <a href="index.php?controller=home&action=cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary" style="font-size: x-large"></i>
<!--                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><></span>-->
                            </a>
                            <a href="index.php?controller=home&action=cart_history" class="btn px-0 ml-3">
                                <i class="fas fa-history text-primary" style="font-size: x-large"></i>
                            </a>
                            <a href="index.php?controller=user&action=login" class="btn px-0 ml-3">
                                <i class="fas fa-regular fa-user text-primary" style="font-size: x-large"></i>
                            </a>
                            <a href="index.php?controller=user&action=logout" class="btn px-0 ml-3">
                                <i class="fas fa-sign-out-alt text-primary" style="font-size: x-large"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5  d-none d-lg-flex">
            <div class="col-lg-4 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh mục sản phẩm </h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <?php
                    foreach ($array['brand'] as $item){
                        ?>
                        <div class="navbar-nav w-100">
                            <a href="index.php?controller=home&action=list&id=<?=$item['brand_id']?>" class="nav-item nav-link"><?=$item['brand_name']?></a>
                        </div>
                        <?php
                    }
                    ?>
                </nav>
            </div>
            <div class="col-lg-4 col-6 text-left" style="margin-left: 90px">
                <div class="input-group">
                    <form method="post" action="index.php?controller=home&action=search" style="width: 1000px">
                        <div class="input-group-append">
                            <input type="text" class="form-control" name="search"  placeholder="Tìm kiếm sản phẩm">
                            <button>
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
</body>
</html>