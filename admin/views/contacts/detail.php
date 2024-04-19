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
        <th>full_name</th>
        <td><?php echo $user['full_name'] ?></td>
    </tr>
    <tr>
        <th>phone</th>
        <td><?php echo $user['phone'] ?></td>
    </tr>
    <tr>
        <th>email</th>
        <td><?php echo $user['email'] ?></td>
    </tr>
    <tr>
        <th>subject</th>
        <td><?php echo $user['subject'] ?></td>
    </tr>
    <tr>
        <th>message</th>
        <td><?php echo $user['message'] ?></td>
    </tr>
    <tr>
        <th>status</th>
        <td><?php echo Helper::getStatusText($user['status']); ?></td>
    </tr>
    <tr>
        <th>created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <tr>
        <th>updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr>
</table>
<a href="index.php?controller=contact&action=index" class="btn btn-default">Back</a>