<!--Timeline items start -->
<div class="timeline-items">
    <h2>Giỏ hàng của bạn</h2>
    <div class="table-car">
        <form action="" method="post">
            <table class="table table-bordered" >
<!--                <tbody>-->
                <tr>
                    <th></th>
                    <th width="40%">Tên sản phẩm</th>
                    <th width="12%">Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php
                    // Khai báo tổng giá trị đơn hàng
                    $total_cart = 0;
                    foreach ($_SESSION['cart']
                             AS $product_id => $cart): ?>
                        <tr class="show_pro_cart">
                            <td class="img_show_pro_cart">
                                <img class="product-avatar-cart"
                                     src="../admin/assets/uploads/<?php echo $cart['avatar'] ?>"
                                     width="">
                            </td>
                            <td>
                                <div class="content-product">
                                    <a href="san-pham/<?php echo $product_id?>"
                                       class="content-product-a">
                                        <?php echo $cart['name']; ?>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <!--  cần khéo léo đặt name cho input số lượng, để khi xử lý submit form update lại giỏ hànTin nổi bậtg sẽ đơn giản hơn    -->
                                <input type="number" min="0"
                                       name="<?php echo $product_id; ?>"
                                       class="product-amount form-control"
                                       value="<?php echo $cart['quantity']; ?>">
                            </td>
                            <td>
                                <?php echo number_format($cart['price']) ?> đ
                            </td>
                            <td>
                                <?php
                                $total_item = $cart['price'] * $cart['quantity'];
                                // Cộng dồn để lấy ra tổng giá trị đơn hàng
                                $total_cart += $total_item;
                                echo number_format($total_item);
                                ?> đ
                            </td>
                            <td>
                                <a class="delete-product"
                                   href="xoa-san-pham/<?php echo $product_id; ?>.html">
                                    <i class="fas fa-trash-alt"></i>
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                <tr>
                    <td colspan="6" style="text-align: right" class="sum_show_pro_cart">
                        Tổng giá trị đơn hàng:
                        <span class="product-price">
                        <?php if (!empty($total_cart)): ?>
                            <?php echo number_format($total_cart); ?> vnđ
                        <?php endif; ?>
                    </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" class="kepp_buying">
                        <a href="san_pham.html" class="continue"><i class="fas fa-caret-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="6" style="text-align: right" class="product-payment">
                        <input type="submit" name="submit" value="Cập nhật giá" class="update_pay">
                        <a href="index.php?controller=payment&action=index" class="go_pay">Thanh toán <i class="fas fa-caret-right"></i></a>
                    </td>
                </tr>
<!--                </tbody>-->
            </table>
        </form>
    </div>
</div>
<!--Timeline items end -->