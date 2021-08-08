<header class="header">
    <div class="header-inner">
        <div class="header_logo">
            <div class="header-main-logo">
                <a href="index.php" class="text-decoration-none text-dark">
                    <span class="ft-18">وب سایت خبری آوازه</span>
                    <i class="fas fa-rss text-danger ft-35"></i>
                </a>
            </div>
            <div class="header-back d-none d-sm-flex">

            </div>
        </div>
    </div>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light menu-rel " dir="rtl">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">فوری</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">برگزیده</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                اخبار جهان
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">ایران</a></li>
                                <li><a class="dropdown-item" href="#">عراق</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">سوریه</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="fa fa-user"></i>
                                <?php if(isset($_SESSION['auth']))
                                    {
                                      echo  $_SESSION['auth'];
                                    }
                                    else {
                                    ?>
                                <span>ورود / ثبت نام</span>
                                    <?php  }?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(isset($_SESSION['auth']))
                                { ?>
                                    <li><a class="dropdown-item" href="#">پروفایل</a></li>
                                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']==1 ) {?>
                                    <li><a class="dropdown-item" href="admin/panel.php">پنل مدیریت</a></li>
                                    <?php }?>
                                    <li><a class="dropdown-item" href="logout.php">خروج</a></li>
                                <?php }
                                    else{
                                ?>
                                <li><a class="dropdown-item" href="login.php">ورود</a></li>
                                <li><a class="dropdown-item" href="register.php">ثبت نام</a></li>
                                <?php }?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="جستجو" aria-label="جستجو">
                        <button class="btn btn-dark" type="submit">جستجو</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>
