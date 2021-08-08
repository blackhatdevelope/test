<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}

require '../database.php';

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $data=new DataBase();
    $user=$data->user($_GET['id']);
}


?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل مدیریت</title>

    <link rel="stylesheet" href="../css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style-front.css">
</head>
<body>

<?php require 'static/header.php'?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-10 m-auto">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" dir="rtl">
                    <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>نام</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th>فعال</th>
                        <th>ادمین</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        echo "<tr>".
                            "<td>".$user['id']."</td>".
                            "<td>".$user['full_name']."</td>".
                            "<td>".$user['username']."</td>".
                            "<td>".$user['email']."</td>";
                        if($user['is_active']==1){
                            echo "<td><span class='badge bg-success'>فعال</span></td>";
                        }
                        else{
                            echo "<td><span class='badge bg-danger'>غیر فعال</span></td>";
                        }
                        if($user['is_admin']==1){
                            echo "<td><span class='badge bg-primary'>مدیر</span></td>";
                        }
                        else{
                            echo "<td><span class='badge bg-info'>کاربر عادی</span></td>";
                        }
                        echo '<td>
                                 <a href="/admin/edit_user.php?id='.$user['id'].'" title="ویرایش"><i class="fa fa-edit text-warning"></i></a>
                                <a href="/admin/user.php?id='.$user['id'].'" title="مشاهده"><i class="fa fa-eye text-primary"></i></a>
                                <a href="/admin/delete_user.php?id='.$user['id'].'" title="حذف"><i class="fa fa-trash text-danger"></i></a>
                                </td>';
                        echo "</tr>";
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
</body>
</html>


