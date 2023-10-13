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
                <li><a href="#">Product</a></li>
                <li class="active">Edit Product</li>

            </ol>
        </div><!--/.row-->

        <div class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach ($array['shoes'] as $sho){
                        ?>
                        <h1 class="page-header">Sản phẩm: <?=$sho['shoes_name']?></h1>
                        <?php }?>
                    </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                            foreach ($array['shoes'] as $sho){
                        ?>
                            <form role="form" method="post" enctype="multipart/form-data" action="index.php?controller=product&action=update">
                                <input type="hidden" name="shoes_id" value="<?=$sho['shoes_id']?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sản phẩm</label>
                                        <input type="text" name="shoes_name"  class="form-control" value="<?=$sho['shoes_name']?>" style="border: 1px solid #2c64c4">
                                    </div>

                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="number" name="price" min="0"  class="form-control" value="<?=$sho['price']?>" style="border: 1px solid #2c64c4">
                                    </div>
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input type="number" name="size" min="36" max="44"  class="form-control" value="<?=$sho['size']?>"  style="border: 1px solid #2c64c4">
                                    </div>
                                    <div class="form-group">
                                        <label>Màu</label>
                                        <input type="text" name="color"  class="form-control" value="<?=$sho['color']?>" style="border: 1px solid #2c64c4">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input type="file" name="image" value="<?=$sho['image']?>" onchange="preview()">
                                        <br>
                                        <div>
                                            <img src="views/img/Shoes/<?=$sho['image']?>" id="image" width ="295px" height = "325px">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thương hiệu</label>
                                        <select name="brand_id" class="form-control">
                                            <option> Chọn </option>
                                            <?php
                                            foreach ($array['brand'] as $bra){
                                                ?>
                                                <option  value=<?=$bra['brand_id']?>
                                                <?php
                                                    if($bra['brand_id'] == $sho['brand_id']){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                > <?=$bra['brand_name']?> </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="shoes_status" class="form-control">
                                            <option> Chọn </option>
                                            <option selected value= 0> Hết hàng </option>
                                            <option value=1
                                                <?php
                                                    if($sho['shoes_status'] == 1){
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >Còn hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>danh mục</label>
                                        <select name="category_id" class="form-control">
                                            <option selected> Chọn </option>
                                            <?php
                                            foreach ($array['category'] as $cat){
                                                ?>
                                                <option  value=<?=$cat['category_id']?>
                                                    <?php
                                                        if($cat['category_id'] == $sho['category_id']){
                                                            echo 'selected';
                                                        }
                                                    ?>
                                                ><?=$cat['category_name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="description"  class="form-control" rows="3" style="border: 1px solid #2c64c4"><?=$sho['description']?></textarea>
                                    </div>
                                    <button type="submit" name="sbm" class="btn btn-success" onclick="alert('Cập nhật sản phẩm thành công thành công')">Cập Nhật</button>
                                </div>
                            </form>
                        <?php
                         }
                        ?>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    </div>
    <!--/.main-->

    <script>
        function preview() {
            image.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>
</body>
</html>