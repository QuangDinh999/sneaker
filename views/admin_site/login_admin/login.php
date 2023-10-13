<!doctype html>
<html lang="en">
<head>
    <title>LogIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="views/admin_site/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/login_style.css" rel="stylesheet">
    <link href="views/admin_site/css/styles.css" rel="stylesheet">
    <link href="views/admin_site/css/datepicker3.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />


</head>
<body>
    <nav class="navbar navbar-light navbar-fixed-top" style="background-color: rgb(33, 84, 84);" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="navbar-brand" href="#">
                    <img src="" alt="">
                    <span style="color: white; font-family:'Times New Roman', Times, serif; padding-left: 20px; font-size: x-large">ADMIN</span>
                </a>
                <ul class="user-menu">
                    <li>
                        <a href="#" style="font-size: large; margin-right: 20px"><i class="fa-solid fa-circle-user"></i>  Log in</span></a>
                        <a href="#" style="font-size: large"><i class="fa-solid fa-right-to-bracket"></i>  Sign Out</span></a>

                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="headline">
        <h3 class=" text-uppercase">ĐĂNG NHẬP</h3>
    </div>
    <div class="login-box">
        <div class="form">
            <form class="login-form" method="post" action="index.php?controller=admin&action=login_process">
                <input type="text" placeholder="username" name="admin_name"/>
                <input type="password" placeholder="password" name="admin_password"/>
                <button id="login">Đăng Nhập</button>
            </form>
        </div>
    </div>
</body>
</html>