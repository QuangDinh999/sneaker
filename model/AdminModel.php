<?php
    function read() {
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }

        include_once "connect/open.php";
        $sql = "SELECT * FROM admin WHERE admin.admin_name LIKE '%$search%'";
        $admin = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['admin'] = $admin;
        $array['search'] = $search;
        return $array;
    }
    function login() {
        $name = $_POST['admin_name'];
        $password = $_POST['admin_password'];
        include_once "connect/open.php";
        $sql = "SELECT *, COUNT(*) AS admin_have FROM admin WHERE admin_name = '$name' AND admin_password = '$password'";
        $admin = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        foreach ($admin as $ad){
            if($ad['admin_have'] == 0){
                return 0;
            }else{
                $_SESSION['admin_name'] = $ad['admin_name'];
                $_SESSION['admin_id'] = $ad['admin_id'];
                return 1;
            }
        }
    }
    function logouts() {
        unset($_SESSION['admin_id']);
    }

    switch ($action){
        case '':
            $array = read();
            break;
        case 'login_process':
            $back = login();
            break;
        case 'logout':
            logouts();
            break;
    }
?>