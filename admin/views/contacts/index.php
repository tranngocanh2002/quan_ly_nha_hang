<?php
require_once 'helpers/Helper.php';
?>
<form method="GET" action="">
    <div class="form-group">
        <label for="first_name">Tên người dùng</label>
        <input type="text" name="full_name" id="full_name"
               value="<?php echo isset($_GET['full_name']) ? $_GET['full_name'] : '' ?>" class="form-control"/>
        <input type="hidden" name="controller" value="contact"/>
        <input type="hidden" name="action" value="index"/>
    </div>
    <div class="form-group">
        <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary"/>
        <a href="index.php?controller=contact" class="btn btn-default">Xoá</a>
    </div>
</form>

<h2>Danh sách liên hệ</h2>
<!-- <a href="index.php?controller=contact&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a> -->
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Chủ đề</th>
        <!-- <th>Tin nhắn</th> -->
        <th>Thời gian tạo</th>
        <th>Trạng thái</th>
        <th></th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $key => $user): ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $user['full_name'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo substr($user['subject'], 0, 40) ?></td>
                <!-- <td><?php echo $user['message'] ?></td> -->
                <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
                <td><?php echo Helper::getStatusTextContact($user['status']) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=contact&action=detail&id=" . $user['id'];
                    $url_update = "index.php?controller=contact&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=contact&action=delete&id=" . $user['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>
<?php echo $pages; ?>