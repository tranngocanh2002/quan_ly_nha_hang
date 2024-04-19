<form action="" method="get">
    <input type="hidden" name="controller" value="set"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên  mục</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary"/>
        <a href="index.php?controller=set" class="btn btn-secondary">Xóa filter</a>
    </div>
</form>

<h1>Danh sách bàn</h1>
<a href="index.php?controller=set&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Số lượng người/bàn</th>
        <th>Số lượng bàn</th>
        <th>Status</th>
        <!-- <th>Created_at</th>
        <th>Updated_at</th> -->
        <th></th>
    </tr>
  <?php if (!empty($categories)): ?>
    <?php foreach ($categories as $key => $category): ?>
          <tr>
              <td>
                <?php echo ++$key; ?>
              </td>
              <td>
                <?php echo $category['max']; ?>
              </td>
              <td>
                <?php echo $category['amount']; ?>
              </td>
              <td>
                <?php
                $status_text = 'Active';
                if ($category['status'] == 0) {
                  $status_text = 'Disabled';
                }
                echo $status_text;
                ?>
              </td>
              <!-- <td>
                <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
              </td>
              <td>
                <?php
                if (!empty($category['updated_at'])) {
                  echo date('d-m-Y H:i:s', strtotime($category['updated_at']));
                }
                ?>
              </td> -->
              <td>
                  <!-- <a href="index.php?controller=set&action=detail&id=<?php echo $category['id'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a> -->
                  <a href="index.php?controller=set&action=update&id=<?php echo $category['id'] ?>" title="Sửa">
                      <i class="fa fa-pencil-alt"></i>
                  </a>
                  <a href="index.php?controller=set&action=delete&id=<?php echo $category['id'] ?>" title="Xóa"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
          </tr>
    <?php endforeach ?>
      <tr>
          <td colspan="7"><?php echo $pages; ?></td>
      </tr>

  <?php else: ?>
      <tr>
          <td colspan="7">Không có bản ghi nào</td>
      </tr>
  <?php endif; ?>
</table>
<!--  hiển thị phân trang-->

