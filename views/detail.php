<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>San pham</title>
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
    <?php include "header/header.php";?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid pt-3">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <?php
                        foreach ($array['shoes'] as $sho){
                        ?>
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="views/img/shoes/<?=$sho['image']?>" alt="Image">
                            </div>
                            <div class="carousel-item ">
                                <img class="w-100 h-100" src="views/img/shoes/<?=$sho['image_2']?>" alt="Image">
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <?php
                    foreach ($array['shoes'] as $sho){
                        ?>
                        <div class="h-100 bg-light p-30">
                            <h3><?=$sho['shoes_name']?></h3>
                            <div class="d-flex mb-3">
                                <div class="text-primary mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star-half-alt"></small>
                                    <small class="far fa-star"></small>
                                </div>
                                <small class="pt-1">(99 Reviews)</small>
                            </div>
                            <h3 class="font-weight-semi-bold mb-4"><?=number_format($sho['price'],0,',','.')?> VND</h3>
                            <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                                clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                                Nonumy</p>

                            <div class="d-flex mb-4">
                                <h4><strong class="text-dark mr-3">Màu Sắc: <?=$sho['color']?></strong></h4>

                            </div>
                            <form method="post" action="index.php?controller=home&action=add_cart_detail&id=<?=$sho['shoes_id']?>">
                                <div class="d-flex align-items-center mb-4 pt-2">
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <input type="number" min="0" max="10" name="quantity_cart" class="form-control bg-secondary border-0 text-center" value="1">
                                    </div>
                                    <button class="btn btn-warning btn-square"><i class="fa fa-shopping-cart"></i></button>

                                </div>
                            </form>
                            <div class="d-flex pt-2">
                                <strong class="text-dark mr-2">Share on:</strong>
                                <div class="d-inline-flex">
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a class="text-dark px-2" href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    ?>
            </div>
        </div>

    </div>
    <!-- Shop Detail End -->



    <?php include "footer/footer.php";?>

</body>

</html>