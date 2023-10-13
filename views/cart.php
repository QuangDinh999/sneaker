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
            <div class="col-lg-4 col-6 text-left" style="margin-left: 500px">
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


    <!-- Breadcrumb Start -->
    <div class="container-fluid pt-4">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php?controller=home">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <form method="post" action="index.php?controller=home&action=update_cart">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                        <?php
                        foreach ($cart['shoes'] as $shoes_id => $value){
                           ?>
                            <tr>
                                <td class="align-middle"><img src="views/img/shoes/<?=$value['image']?>" style="width: 50px;"</td>
                                <td class="align-middle"><?=$value['shoes_name']?></td>
                                <td class="align-middle"><?=number_format($value['price'],0,',','.')?> VND</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">

                                        <input type="number" min="1" max="10" name="quantity[<?=$shoes_id?>]" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?=$value['quantity']?>">

                                    </div>
                                </td>
                                <td class="align-middle"><?=number_format($value['total'],0,',','.')?> VND</td>
<!--                                <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></button></td>-->
                                <td class="align-middle"><a href="index.php?controller=home&action=delete_one_shoes&id=<?=$shoes_id?>" class="btn btn-danger"><i class="fa fa-times"></i></a></td>
                            </tr>
                        <?php
                        }?>
                        </tbody>
                        <button class="btn btn-block btn-primary font-weight-bold " style="margin-bottom: 10px; width: 200px; height: 40px; display: inline-block">Cập nhật giỏ hàng</button>
                        <a href="index.php?controller=home&action=delete_cart" class="btn btn-danger font-weight-bold" style="margin-bottom: 10px; margin-left: 20px; width: 200px; height: 40px;">Xóa Giỏ Hàng</a>
                    </table>
                </form>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Hóa đơn Hàng</span></h5>
                <form method="post" action="index.php?controller=home&action=add_order">
                    <div class="bg-light p-30 mb-5" style="margin-top: 26px">
                        <div class="border-bottom pb-2">
                                <h6>PTTT</h6>
                                <div class="form-group mb-4">
                                    <select name="payment" style="padding: 10px;font-size: 16px;border: 1px solid #d2a20d;border-radius: 4px;background-color: #FFD333">
                                        <?php foreach ($cart['payment'] as $pay){
                                        ?>
                                        <option value="<?=$pay['payment_id']?>" style="background-color: #fff"><?=$pay['payment_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            <h6>Thanh Toán</h6><br>
                            <?php
                            foreach ($cart['shoes'] as $shoes_id => $value){
                                ?>
                            <div class="d-flex justify-content-between mb-3" style="padding-left: 260px">
                                <h6><?=number_format($value['total'],0,',','.');?> VND</h6>
                            </div>
                            <?php }?>
                        </div>
                            <div class="pt-2">

                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Tổng thanh toán</h5>
                                        <h5>
                                         <?php
                                        if(empty($cart['shoes'])){
                                            echo 0;
                                        }else{
                                            $latest_value = end($cart['shoes']);
                                            $latest_totalprice = $latest_value['totalprice'];
                                            echo number_format($latest_totalprice,0,',','.');

                                        }
                                        ?>VND
                                        </h5>

                                </div>
                            </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" >Tiếp tục thanh toán</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <?php include "footer/footer.php";?>

</body>
</html>