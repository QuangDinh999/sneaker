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
    <?php
        include "header/header.php";
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="views/img/banner_4.jpg" alt="First slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="views/img/banner_2.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3" style="margin-top: 100px">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm bán chạy</span></h2>
        <div class="row px-xl-5">
            <?php
                foreach ($array['feature'] as $feat){
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="views/img/shoes/<?=$feat['image']?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="index.php?controller=home&action=add_cart&id=<?=$feat['shoes_id']?>"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?controller=home&action=detail&id=<?=$feat['shoes_id']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="index.php?controller=home&action=detail&id=<?=$feat['shoes_id']?>"><?=$feat['shoes_name']?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?=number_format($feat['price'],0,',','.')?> VND</h5><h6 class="text-muted ml-2"></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
            <div class="row px-xl-5">
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="views/img/background_1.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Real Sneaker</h6>
                            <h3 class="text-white mb-3">Giày Nam</h3>
                            <a href="index.php?controller=home&action=category&category_id=1" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="views/img/background_2.jpg" alt="">
                        <div class="offer-text">
                            <h6 class="text-white text-uppercase">Real Sneaker</h6>
                            <h3 class="text-white mb-3">Giày Nữ</h3>
                            <a href="index.php?controller=home&action=category&category_id=2" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3" style="margin-top: 50px">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản Phẩm Mới</span></h2>
        <div class="row px-xl-5">
            <?php
                foreach ($array['new'] as $sho){
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="views/img/Shoes/<?=$sho['image']?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="index.php?controller=home&action=add_cart&id=<?=$sho['shoes_id']?>"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="index.php?controller=home&action=detail&id=<?=$sho['shoes_id']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?=$sho['shoes_name']?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?=number_format($sho['price'],0,',','.')?></h5> VND<h6 class="text-muted ml-2"></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
<!--    <div class="container-fluid py-5">-->
<!--        <div class="row px-xl-5">-->
<!--            <div class="col">-->
<!--                <div class="owl-carousel vendor-carousel">-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-1.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-3.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-4.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-5.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-6.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-7.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="bg-light p-4">-->
<!--                        <img src="img/vendor-8.jpg" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- Vendor End -->


    <?php
        include "footer/footer.php";
    ?>
</body>

</html>