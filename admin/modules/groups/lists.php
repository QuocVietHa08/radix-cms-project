<?php 
$data = [
    'pageTitle' => 'Tổng quan hệ thống',
];
layout('header', 'admin', $data);
layout('sidebar', 'admin');
layout('breadcrum', 'admin', $data);
$listGroups = getRaw('select * from groups order by create_at desc');
?> 
    <section class="content">
      <div class="container-fluid">
        <a href="<?php echo getLinkAdmin('groups', 'add') ?>" class="btn btn-primary btn-sm">Thêm mới group</a>
        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Tiêu đề</th>
                    <th>Thời gian</th>
                    <th width="15%">Phân quyền</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($listGroups)):
                        foreach($listGroups as $item):
                 ?>
                <tr>

                    <td><?php echo $item['id'] ?></td>
                    <td><a href="<?php echo getLinkAdmin('groups', 'edit', ['id' => $item['id']]); ?>"><?php echo $item['name'] ?></a></td>
                    <td><?php echo getDateFormat($item['create_at'], 'd/m/Y H:i:s') ?></td>
                    <td><?php echo $item['permission'] ?></td>
                 <!--    <td>
                        <a href="#" class="btn btn-primary btn-sm">Phân quyền</a></th>
                    </td> -->
                    <td class="text-center"><a href="<?php echo getLinkAdmin("groups", "edit",['id'=>$item['id']]) ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <td class="text-center"><a href="<?php echo getLinkAdmin("groups","delete",['id' => $item['id']]); ?>" onclick="return confirm(' Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm">Xóa</td>
                </tr>

            <?php 
                endforeach;
                else:
             ?>
             <td colspan="6" class="text-center">Không có nhóm người dùng </td>
            <?php endif; ?>
            </tbody>
        </table>  
      </div>
    </section>

<?php
layout('footer', 'admin', $data);
