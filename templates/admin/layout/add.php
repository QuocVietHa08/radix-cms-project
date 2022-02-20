<?php 
$data = [
    'pageTitle' => 'Thêm blog mới',
];
layout('header', 'admin', $data);
layout('sidebar', 'admin');
layout('breadcrum', 'admin', $data);
?> 
    <section class="content">
      <div class="container-fluid">
        <form action="">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" class="form-control" name="Title" placeholder="Nhập tiêu đề">
            </div> 
            <button class="btn btn-primary" type="submit">Thêm mới</button>
        </form> 
      </div>
    </section>

<?php
layout('footer', 'admin', $data);
