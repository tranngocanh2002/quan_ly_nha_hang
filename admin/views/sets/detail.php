<h1>Chi tiết category</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $category['id']; ?></td>
    </tr>
    <tr>
        <th>Số lượng người/bàn</th>
        <td><?php echo $category['max']; ?></td>
    </tr>
    <tr>
        <th>Số lượng bàn</th>
        <td><?php echo $category['amount']; ?></td>
    </tr>
    <tr>
        <th>Trạng thái</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($category['status'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
    <!-- <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['updated_at'])); ?>
        </td>
    </tr> -->
</table>
<a class="btn btn-primary" href="index.php?controller=set">Back</a>

