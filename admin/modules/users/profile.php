<?php 
$data = [
    'pageTitle' => 'Cập nhật thông tin cá nhân',
];
$userId= isLogin()['user_id'];
$userDetail = getUserInfo($userId);
layout('header', 'admin', $data);
layout('sidebar', 'admin');
layout('breadcrum', 'admin', $data);

// xu ly cap nhat thong tin ca nhan
$error = [];
if(isPost()) {
    $body = getBody();
    // print_r($body);
    if(empty(trim($body['fullname']))){
        $error['fullname']['required'] = 'Họ tên bắt buộc phải nhập';
    }else{
        if(strlen(trim($body['fullname'])) < 5){
            $error['fullname']['min'] = 'Họ tên phải lớn hơn 5 ký tự';
        }
    }
    if(empty(trim($body['email']))){
        $error['fullname']['required'] = 'Email bắt buộc phải nhập';
    }else{
        if(!isEmail(trim($body['email'])) < 5){
            $error['email']['isEmail'] = 'Email không hợp lệ';
        }else {
            $email = trim($body['email']);
            $sql = 'select id from uses where email='.$body['email'];
            if(getRows($sql) > 0){
                $error['email']['uniques'] = 'Email đã tồn tại';
            }
        }
    }

    if(!empty($error)){
        $dataUpdate = [
            'email' => $body['email'],
            'fullname' => $body['fullname'],
            'contact_facebook' => $body['contact_facebook'],
            'contact_twitter' => $body['contact_twitter'],
            'contact_linkedin' => $body['contact_linkedin'],
            'contact_pinterest' => $body['contact_pinterest'],
            'about_content' => $body['about_content'],
            'update_at' => date('Y-m-d H:i:s'),
        ];


        $condition = "id=$userId";
        $updateStatus = update('users', $dataUpdate, $condition);
        if($updateStatus){
            setFalshData('msg', 'Cập nhật người dùng thành công');
            setFalshData('msg_type', 'success');
        }else {
            setFalshData('msg', 'Hệ thống đang gặp lỗi xin hãy thử lại sau');
            setFalshData('msg_type', 'danger');
        }
    }else {
        setFalshData('msg', 'Vui lòng kiểm tra dữ liệu nhập vào');
        setFalshData('msg_type', 'danger');
        setFalshData('errors', $error);
        setFalshData('old', $body);
    }

    redirect('/admin/?module=users&action=profile');
    
}

$msg = getFalshData('msg');
$msgType = getFalshData('msg_type');
$error = getFalshData('errors');
$old = getFalshData('old');

if($userDetail){
    $old = $userDetail;
}

?> 
    <section class="content">
      <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group">
                <label for=""> Họ và tên</label>
                <input type="text" value="<?php echo old('fullname', $old); ?>" class="form-control" name="fullname" placeholder="Họ và tên..." />
                <?php echo form_error('fullname', $error,'<span class="error">', '</span' )  ?>
            </div>
           <div class="form-group">
                <label for="">Email</label>
                <input type="text" value="<?php echo old('email', $old) ?>" class="form-control" name="email" placeholder="Email..." />
                <?php echo form_error('email', $error,'<span class="error">', '</span' )  ?>
            </div>
          
           <div class="form-group">
                <label for="">Facebook</label>
                <input type="text" value="<?php echo old('contact_facebook', $old) ?>" class="form-control" name="contact_facebook" placeholder="Facebook của tôi..." />
            </div>
           <div class="form-group">
                <label for="">Twitter</label>
                <input type="text" value="<?php echo old('contact_twitter', $old) ?>" class="form-control" name="contact_twitter" placeholder="Twitter của tôi" />
            </div>
            <div class="form-group">
                <label for="">Linkedin</label>
                <input type="text" value="<?php echo old('contact_linkedin', $old) ?>" class="form-control" name="contact_linkedin" placeholder="Linkedin của tôi" />
            </div>
            <div class="form-group">
                <label for="">Pinterest</label>
                <input type="text" value="<?php echo old('contact_pinterest', $old); ?>" class="form-control" name="contact_pinterest" placeholder="Pinterest của tôi" />
            </div>

             <div class="form-group">
                <label for="">Thông tin cá nhân</label>
                <textarea type="text" class="form-control" name="about_content" placeholder="Về bản thân">
                    <?php echo old('about_content', $old) ?>
                </textarea>
            </div>

            <button class="btn btn-primary" type="submit">Cập nhật thông tin cá nhân</button>
        </form> 
      </div>
    </section>

<?php
layout('footer', 'admin', $data);
