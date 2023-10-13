<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Categories product</title>
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
                        <span class="breadcrumb-item active">Result</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Result</span></h2>
        <div class="row px-xl-5">
            <?php
            foreach ($array['shoes'] as $sho){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="views/img/shoes/<?=$sho['image']?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?=$sho['shoes_name']?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?=number_format($sho['price'],0,',','.')?> VND</h5><h6 class="text-muted ml-2"></h6>
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
        <div class="panel-footer" style="text-align: center; padding-top: 50px">
            <?php
            for($i = 1; $i < $array['page']; $i++){
                ?>
                <form style="display: inline-block" method="post" action="index.php?controller=home&action=search">
                    <input type="hidden" name="page" value="<?=$i ?>">
                    <input type="hidden" name="search" value="<?=$array['search']?>">
                    <button class="btn btn-warning">
                        <?= $i ?>
                    </button>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- Products End -->



    <?php
    include "footer/footer.php";
    ?>
</body>
</html>