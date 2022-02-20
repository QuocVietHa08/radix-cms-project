<?php
if (!defined('_INCODE')) die('Access Deined...');
layout('header-login','admin');
echo '<div class="container text-center"><br />';
if (!empty($token)) {
    $tokenQuery = firstRaw("select id, fullname,email from users where forget_token = '$token' ");
    if (!empty($tokenQuery)) {
        $user_id = $tokenQuery['id'];

        if (isPost()) {
            $body = getBody();
            $errors = [];
            $password = $body['password'];
            $confirmPassword = $body['confirm_password'];


            if (empty(trim($body['password']))) {
                $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập';
            } else {
                if (strlen(trim($body['password'])) < 4) {
                    $errors['password']['min'] = 'Mật khẩu không được nhỏ hơn 4 ký tự';
                }
            }
            if (empty(trim($body['confirm_password']))) {
                $errors['confirm_password']['required'] = 'Xác nhận mật khẩu bắt buộc phải nhập';
            } else {
                if ($body['confirm_password'] != $body['password']) {
                    $errors['confirm_password']['unequal'] = 'Không đúng mật khẩu';
                }
            }

            if(empty($errors)) {
                $passwordHash = password_hash($body['password'], PASSWORD_DEFAULT);
                $dateUpdate = [ 
                    'password' => $passwordHash,
                    'forget_token' => null,
                    'update_at' => date('Y-m-d H:i:s'),
               ]; 

               $updateStatus = update('users', $dateUpdate, 'id=',$user_id);
               if($updateStatus) {
                setFalshData('msg', "Thay đổi mật khẩu thành công");
                setFalshData('msg_type', 'success');
               } else {
                    setFalshData('msg','Lỗi hệ thống xin thử lại sau');
                    setFalshData('msg_type','danger');
               } 
                    redirect('?module=auth&action=reset&token=' . $token);
                }
        }

$token = getBody()['token'];
$msg = getFalshData('msg');
$msg_type = getFalshData('msg_type');
?>
        <div class="row text-left">
            <div class="col-6" style="margin: 20px auto">
                <h3 class="text-center text-uppercase"> Đặt lại mật khẩu</h3>
                <?php getMsg($msg, $msg_type) ?>
                <form action="" method="post">

                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới" />
                        <?php echo (!empty($errors['password'])) ?
                            '<span class="text-danger">' . reset($errors['password']) . '</span>' : null; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lai mật khẩu</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu" />
                        <?php echo (!empty($errors['password'])) ?
                            '<span class="text-danger">' . reset($errors['password']) . '</span>' : null; ?>
                    </div>

                    <input type="hidden" name="token" value="<?php echo $token ?>" />

                    <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
                    <hr />
                    <p><a href="?module=auth&action=login">Đăng nhập</a></p>
                </form>
            </div>
        </div>
<?php
    }
} else {
    getMsg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
}

echo '<div />';
layout('header-footer', 'admin');
