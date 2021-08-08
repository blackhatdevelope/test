<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}
require '../database.php';
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $filename = $_FILES["imag_url"]["name"];
    $tempname = $_FILES["imag_url"]["tmp_name"];
    $folder   = '../uploads/'.$filename;

    if ( move_uploaded_file( $tempname, $folder ) ) {
//       return $folder;
        $data=new DataBase();
        $data->conn_pdo();
        $res=$data->add_news($folder);
        if ($res==1){
            header('Location: /admin/news.php');
            $_SESSION['success']='اخبار مورد نظر آپلود شد';
        }
    } else{
        header('Location: /admin/add_news.php');
       $_SESSION['error']='فایل مورد نظر آپلود نشد';
    }
}
?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>افزودن خبر</title>

    <link rel="stylesheet" href="../css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style-front.css">
</head>
<body>

<?php require 'static/header.php'?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-10 m-auto">

                <form dir="rtl" action="/admin/add_news.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="title">عنوان خبر</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="news_type">نوع خبر</label>
                        <input type="text" name="news_type" id="news_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">متن خبر</label>
                        <textarea name="body" id="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imag_url">عکس خبر</label>
                        <input type="file" name="imag_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            ذخیره اطلاعات
                        </button>
                    </div>
                </form>

        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>
</body>
</html>


