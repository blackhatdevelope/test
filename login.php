<?php
session_start();
if (isset($_SESSION['auth'])){
    $_SESSION['warning']='<div class="alert alert-warning">شما قبلا وارد سایت  شده اید</div>';
    header('Location: index.php');
}
include 'database.php';
include 'hash.php';


if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

    if (!empty($username) && !empty($password))
    {
        try {
            $conn=new PDO('mysql:dbname=db_test;host=localhost', 'root', '');
            $stat=$conn->prepare('select * from users where username=:username or email=:username');
            $stat->execute(compact(['username','username']));
            $result=$stat->fetch(PDO::FETCH_OBJ);
            if ($result){
                $hash=new Hash();
                $pass= $hash->encryptPass($password);
                if ($pass==$result->password){
                    $_SESSION['auth']=$result->username;
                    $_SESSION['is_admin']=$result->is_admin;
                    $_SESSION['success']='<div class="alert alert-success">'.$_SESSION['auth'].' با موفقیت وارد سایت شده اید</div>';
                   header('Location: index.php');
                   return;
                }
                else{
                    $_SESSION['error']='<div class="alert alert-danger"> اطلاعات شما مطابقت ندارد</div>';
                    header('Location: login.php');
                }
            }
            else{
                $_SESSION['error']='<div class="alert alert-danger"> اطلاعات شما مطابقت ندارد</div>';
                header('Location: login.php');
            }
        }catch (Exception $exception){
          echo   $exception->getMessage();
        }

    }
    else if(empty($username) && !empty($password)){
        $message='نام کاربری نمی تواند خالی باشد.';
        $_SESSION['username']=$message;
        $_SESSION['password']='';
    }
     if(empty($password) && empty($username)){
        $message='کلمه عبور نمی تواند خالی باشد.';
        $_SESSION['password']=$message;
         $_SESSION['username']='';
    }
     if (empty($username) && empty($password))
     {
         $message='نام کاربری نمی تواند خالی باشد.';
         $_SESSION['username']=$message;
         $msg='کلمه عبور نمی تواند خالی باشد.';
         $_SESSION['password']=$msg;
     }
    header('Location: login.php');

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به وب سایت</title>

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
        <?php if(isset($_SESSION['success']) || isset($_SESSION['warning'])) {?>
            <div class="row">
                <div class="col-12">
                    <?php if(isset($_SESSION['success'])) echo $_SESSION['success'] ?>
                </div>
                <div class="col-12">
                    <?php if(isset($_SESSION['warning'])) echo $_SESSION['warning'] ?>
                </div>
                <div class="col-12">
                    <?php if(isset($_SESSION['error'])) echo $_SESSION['error'] ?>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-8 col-12 m-auto">
            <div class="card  mt-4" dir="rtl">
                <h3 class="card-header text-center">
                    ورود به سایت
                </h3>
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="username">نام کاربری</label>
                            <input type="text" id="username" name="username" placeholder="نام کاربری یا امیل خود را وارد کنید" class="form-control mt-2">
                            <?php if(isset( $_SESSION['username'])){
                                echo '<span class="text-danger is-valid">'.
                                    $_SESSION['username']
                                    .'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            <input type="password" id="password" name="password" placeholder="کلمه عبور خود را وارد کنید" class="form-control mt-2">
                            <?php if(isset( $_SESSION['username'])){
                               echo '<sapn class="text-danger is-valid">'.
                                $_SESSION['password']
                            .'</sapn>';
                            }

                            ?>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-primary mt-2" type="submit">ورود</button>
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


