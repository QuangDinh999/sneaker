<?php
    function read(){
        $search = '';
        if(isset($_POST['search'])){
            $search = $_POST['search'];
        }
        include_once "connect/open.php";
        $sql = "SELECT * FROM user WHERE user.user_name LIKE '%$search%'";
        $user = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        $array = array();
        $array['user'] = $user;
        $array['search'] = $search;
        return $array;
    }
    function store(){
        $user_name =$_POST['user_name'];
        $mail =$_POST['mail'];
        $phone =$_POST['phone'];
        $password = $_POST['password'];
        include_once "connect/open.php";
        $sql = "INSERT INTO user (user_name, email, phone, user_password) VALUES ('$user_name', '$mail', '$phone', '$password')";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function edit() {
        $user_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
        $user = mysqli_query($connect, $sql);
        include_once "connect/close.php";
        return $user;
    }
    function destroy(){
        $user_id = $_GET['id'];
        include_once "connect/open.php";
        $sql = "DELETE FROM user WHERE user_id = '$user_id'";
        mysqli_query($connect, $sql);
        include_once "connect/close.php";
    }
    function login_process() {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        include_once "connect/open.php";
        $sql = "SELECT *, COUNT(*) AS user_have FROM user WHERE user_name = '$user_name' AND user_password = '$password'";
        $users = mysqli_query($connect, $sql);
        foreach ($users as $user) {
            if ($user['user_have'] == 0) {
                return 0;
            } else {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                return 1;
            }
        }
        include_once "connect/close.php";
    }
    function logout() {
        session_destroy();
    }
    switch ($action){
        case '':
            $array = read();
            break;
        case 'store':
            store();
            break;
        case 'edit':
            $user = edit();
            break;
        case 'destroy':
            destroy();
            break;
        case 'signup_process':
            store();
            break;
        case 'login_process':
            $tests = login_process();
            break;
        case 'logout':
            logout();
            break;
    }
?>