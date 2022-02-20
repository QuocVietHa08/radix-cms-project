<?php
if (!defined('_INCODE')) die('Access Deined...');
if (!isLogin()) {
    redirect('?module=auth&action=login');
}else {
    $userId = isLogin()['userId'];
    $userDetail = getUserInfo($userId);
}
autoRemoveTokenLogin();
saveActivityTime();

?>
<html>
<title>Quan ly nguoi dung</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link type="text/css" ref="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.2/css/fontawesome.min.css" />

<link type="text/css" ref="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE ?>/css/style.css?ver=<?php echo rand() ?>" />

</html>

<body>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?php echo _WEB_HOST_ROOT.'?module=users'; ?>">User management</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo _WEB_HOST_ROOT ?>">Tổng quan<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo $userDetail['fullname'] ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Thông tin cá nhân </a>
                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                            <hr >
                            <a class="dropdown-item" href="<?php echo _WEB_HOST_ROOT . '?module=auth&action=logout' ?>">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
