<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}
include '../database.php';
include '../News.php';
$data=new DataBase();
$news=$data->news();
?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خبرها</title>

    <link rel="stylesheet" href="../css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style-front.css">
</head>
<body>

<?php require 'static/header.php'?>


<div class="container-fluid">
    <?php if(isset($_SESSION['success']) || isset($_SESSION['warning']) || isset($_SESSION['info']) ) {?>
        <div class="row">
            <div class="col-12">
                <?= $_SESSION['success']?>
            </div>
            <div class="col-12">
                <?= $_SESSION['warning']?>
            </div>
            <div class="col-12">
                <?= $_SESSION['info']?>
            </div>
        </div>
    <?php }?>
    <div class="row mt-4">
        <div class="col-10 m-auto">
            <a href="/project/admin/add_news.php" class="btn btn-primary">
                افزودن خبر
                <i class="fa fa-plus"></i>
            </a>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" dir="rtl">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>عنوان خبر</th>
                        <th>نوع خبر</th>
                        <th>تعداد بازدید</th>
                        <th>عکس خبر</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($news as $item)
                    {
                        echo "<tr>".
                            "<td>".$item['id']."</td>".
                            "<td>".$item['title']."</td>".
                            "<td>".$item['news_type']."</td>".
                            "<td>".$item['view_count']."</td>";
                            echo '<td><img src="../'.$item['imag_url'].'" alt="" style="height: 60px;width: 100px;"></td>';
                        if($item['status']==1){
                            echo "<td><span class='badge bg-primary'>منتشر شده</span></td>";
                        }
                        else{
                            echo "<td><span class='badge bg-info'>منتشر نشده</span></td>";
                        }
                        echo '<td>
                                <a href="/project/admin/edit_news.php?id='.$item['id'].'" title="ویرایش"><i class="fa fa-edit text-warning"></i></a>
                                <a href="/project/admin/news.php?id='.$item['id'].'" title="مشاهده"><i class="fa fa-eye text-primary"></i></a>
                                <a href="/project/admin/delete_news.php?id='.$item['id'].'" title="حذف"><i class="fa fa-trash text-danger"></i></a>
                                </td>';
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="../js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>

<?php
unset($_SESSION['error']);
unset($_SESSION['warning']);
unset($_SESSION['success']);
unset($_SESSION['info']);
?>
</body>
</html>
