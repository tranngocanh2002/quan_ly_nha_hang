<h2>Cập nhật thực đơn</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="category_id">Chọn danh mục</label>
        <select name="category_id" class="form-control" id="category_id">
            <?php
            foreach ($categories as $category):
                $selected = '';
                if ($category['id'] == $product['category_id']) {
                    $selected = 'selected';
                }
                if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $category['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Nhập tên thực đơn</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh thực đơn</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        <?php if (!empty($product['avatar'])): ?>
            <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price"
               value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>"
               class="form-control" id="price"/>
    </div>
    <!-- <div class="form-group">
        <label for="amount">Số lượng</label>
        <input type="number" name="amount"
               value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $product['amount'] ?>"
               class="form-control" id="amount"/>
    </div> -->
    <div class="form-group">
        <label for="summary">Mô tả</label>
        <textarea name="summary" id="summary"
                  class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : $product['summary'] ?></textarea>
    </div>
    <!-- <div class="form-group">
        <label for="description">Mô tả chi tiết thực đơn</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $product['content'] ?></textarea>
    </div> -->
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <?php
            $selected_disabled = '';
            $selected_active = '';
            if ($product['status'] == 0) {
                $selected_disabled = 'selected';
            } else {
                $selected_active = 'selected';
            }
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

            <option value="1" <?php echo $selected_active ?>>Active</option>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
    </div>
</form>