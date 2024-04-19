<?php if (empty($category)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $category['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Số lượng người/bàn</label>
            <input type="number" name="max"
                   value="<?php echo isset($_POST['max']) ? $_POST['max'] : $category['max']; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label>Số lượng bàn</label>
            <input type="number" name="amount"
                   value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $category['amount']; ?>"
                   class="form-control"/>
        </div>

        <div class="form-group">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($_POST['status'])) {
                switch ($_POST['status']) {
                    case 0:
                      $selected_disabled = 'selected';
                        break;
                    case 1:
                      $selected_active = 'selected';
                        break;
                }
            }
            ?>
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1" <?php echo $selected_disabled ?> >Active</option>
                <option value="0" <?php echo $selected_active ?> >Disabled</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>