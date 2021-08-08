<?php
session_start();
if (! isset($_SESSION['auth']) || $_SESSION['is_admin'] == 0){
    $_SESSION['warning']='<div class="alert alert-danger">شما به اینجا دسترسی ندارید</div>';
    header('Location: ../index.php');
}

require '../database.php';

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $data=new DataBase();
    $user=$data->update_user();
    $_SESSION['success']='<div class="alert alert-success">اطلاعات کاربر با موفقیت ویرایش شد</div>';
    header('Location: /admin/users.php');
}


?>