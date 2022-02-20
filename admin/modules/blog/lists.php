<?php 
$data = [
    'pageTitle' => 'Tổng quan hệ thống',
];
layout('header', 'admin', $data);
layout('sidebar', 'admin');
layout('breadcrum', 'admin', $data);
?> 
    <section class="content">
      <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Thời gian</th>
                    <th width='5%'>Sửa</th>
                    <th width='5%'>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>  
      </div>
    </section>

<?php
layout('footer', 'admin', $data);
