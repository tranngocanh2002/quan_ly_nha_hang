<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi tiết user</h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $user['id'] ?></td>
    </tr>
    <tr>
        <th>Họ và tên</th>
        <td><?php echo $user['full_name'] ?></td>
    </tr>
    <tr>
        <th>Số điện thoại</th>
        <td><?php echo $user['phone'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $user['email'] ?></td>
    </tr>
    <tr>
        <th>Bàn</th>
        <td><?php echo $user['people'] ?> người</td>
    </tr>
    <tr>
        <th>Yêu cầu</th>
        <td><?php echo $user['message'] ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td><?php echo Helper::getStatusText($user['status']); ?></td>
    </tr>
    <tr>
        <th>Thời gian ăn</th>
        <td><?php echo $user['date'] ?></td>
    </tr>
    <tr>
        <th>Thời gian đặt bàn</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <!-- <tr>
        <th>updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr> -->
</table>
<a href="index.php?controller=book&action=index" class="btn btn-default">Back</a>