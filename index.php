<?php
    session_start();
    include 'database.php';
    include 'News.php';
    $data=new DataBase();
    $news=$data->news_index();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>وب سایت خبری آوزه</title>

    <link rel="stylesheet" href="css/bootstrap_rtl.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style-front.css">

</head>
<body>

<?php
include_once('pages/header.php');
?>

<article class="main_site">
    <div class="container mt-5">
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
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row mb-2">
                    <?php
                     if (!empty($news)) {
                         foreach ($news as $item) {
                             echo '<div class="col-md-3 col-sm-6 col-12 mb-2">
                                     <div class="card">
                                    <img src=' . $item["imag_url"] . ' class="card-img" style="height: 100px !important;" alt="">
                                    </div>
                                </div>';
                         }
                     }
                    ?>
               </div>
                <div class="row mb-2">
                    <div class="col-md-3 col-sm-6 col-12 mb-2">
                        <div class="card">
                            <img src="images/adfa.png" class="card-img" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 mb-2">
                        <div class="card">
                            <img src="images/adfa.png" class="card-img" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 mb-2">
                        <div class="card">
                            <img src="images/adfa.png" class="card-img" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 mb-2">
                        <div class="card">
                            <img src="images/adfa.png" class="card-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <img src="images/adfa.png" alt="" class="card-img">
                </div>
            </div>
        </div>
    </div>
</article>

<script src="js/popper.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.js"></script>
<?php
unset($_SESSION['error']);
unset($_SESSION['warning']);
unset($_SESSION['success']);
?>
</body>
</html>