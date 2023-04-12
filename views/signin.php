<!doctype html>
<html lang="en">
<head>
    <title>Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com">-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="views/css/login_style.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="views/css/style.css" rel="stylesheet">

</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5  d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">REAL</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SNEAKER</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <div id="headline">
        <h3 class=" text-uppercase">ĐĂNG KÝ</h3>
    </div>
    <div class="login-box">
        <div class="form">
            <form class="login-form" method="post" action="index.php?controller=user&action=signup_process">
                <input type="text" placeholder="username" name="user_name"/>
                <input type="text" placeholder="Phone Number" name="phone"/>
                <input type="email" placeholder="email" name="mail"/>
                <input type="password" placeholder="password" name="password"/>
                <button id="login">Đăng ký</button>
            </form>
        </div>
    </div>
</body>
</html>