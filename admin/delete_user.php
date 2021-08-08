<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}

require '../database.php';

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    $data=new DataBase();
    $res= $data->user_delete($_GET['id']);
    if ($res==1){
        $_SESSION['success']='<div class="alert alert-success">کاربر مورد نظر با موفقیت حذف شد</div>';
        header('Location: /admin/users.php');
    }else{
        $_SESSION['info']='<div class="alert alert-info">کاربر مورد نظر یافت نشد</div>';
        header('Location: /admin/users.php');
    }
}