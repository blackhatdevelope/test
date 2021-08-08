<?php
session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['warning']='<div class="alert alert-warning">شما قبلا ثبت نام کرده اید</div>';
    header('Location: index.php');
}
include 'database.php';
include 'user.php';
include 'hash.php';

class Register{

    /*
     *  check users table and create table users
     */
    public function sign_up()
    {
        $database=new DataBase();
        $database->connect_db();
        $user=new User();
        $database->table_exist($user->table,$user->create_user());

    }

}

if ($_SERVER['REQUEST_METHOD']=='POST') {

    if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {

        $reg=new Register();
        $reg->sign_up();

        $hash=new Hash();
        $password=$hash->encryptPass($_POST['password']);

        $database=new DataBase();
        $database->connect_db();
        $resutls=$database->register($password);

        if($resutls==1)
        {
            $_SESSION['success']='<div class="alert alert-success">ثبت نام شما با موفقیت انجام شد</div>';
            header('Location: index.php');
            $_SESSION['auth']=$_POST['username'];
        }
        else
        {
            $_SESSION['error']='<div class="alert alert-danger">مشکل در ثبت نام لطفا دقایقی دیگر تلاش فرمایید</div>';
            header('Location: register.php');

        }

    } else
    {
        $_SESSION['warning']= '<div class="alert alert-warning">تمام فیلد ها را پر کنید</div>';
        header('Location: register.php');
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام در وب سایت</title>

    <link rel="stylesheet" href="css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style-front.css">



</head>
<body>

<?php
include_once('pages/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-8 col-12 m-auto">
            <?php
                if(isset($_SESSION['warning'])){
                    echo  $_SESSION['warning'];

                }
                if(isset($_SESSION['error'])){
                    echo '<br>';
                    echo   $_SESSION['error'];
                }

            ?>
            <div class="card  mt-4" dir="rtl">
                <h3 class="card-header text-center">
                    ثبت نام در سایت
                </h3>
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="name">نام </label>
                            <input type="text" id="name" name="full_name" placeholder="نام  خود را وارد کنید" class="form-control mt-2">
                        </div>
                        <div class="form-group">
                            <label for="username">نام کاربری</label>
                            <input type="text" id="username" name="username" placeholder="نام کاربری خود را وارد کنید" class="form-control mt-2">
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email"  id="email" name="email" placeholder="ایمیل خود را وارد کنید" class="form-control mt-2 " style="direction: rtl !important;text-align: right !important;">
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            <input type="password" id="password" name="password" placeholder="کلمه عبور خود را وارد کنید" class="form-control mt-2">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-info mt-2" type="submit">ثبت نام</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/popper.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>

</body>
</html>

