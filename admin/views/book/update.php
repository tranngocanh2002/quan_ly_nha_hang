<h2>Cập nhật liên hệ</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="full_name">Họ và tên</label>
        <input type="text" name="full_name" id="full_name"
               value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : $user['full_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone"
               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email"
               value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="people">Số người ăn</label>
        <input type="number" name="people" id="people"
               value="<?php echo isset($_POST['people']) ? $_POST['people'] : $user['people'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="people">Thời gian ăn</label>
        <input type="datetime-local" name="date" id="date"
               value="<?php echo isset($_POST['date']) ? $_POST['date'] : $user['date'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="message">Yêu cầu</label>
        <!-- <input type="text" name="message" id="message" value="<?php echo isset($_POST['message']) ? $_POST['message'] : $user['message'] ?>"
                class="form-control"> -->
        <textarea class="form-control" placeholder="Yêu cầu" id="message" name="message" style="height: 100px"><?php echo isset($_POST['message']) ? $_POST['message'] : $user['message'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
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
            <option value="1" <?php echo $selected_active ?>>Đã phản hồi</option>
            <option value="0" <?php echo $selected_disabled; ?>>Chưa phản hồi</option>

        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=book&action=index" class="btn btn-default">Back</a>
    </div>
</form>