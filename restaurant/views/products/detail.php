<!--<div class="location">-->
<!--</div>-->
<div class="content_detail">
    <div class="show_pro">
        <div class="img_show_pro">
<!--            <div class="avatar">-->
<!--                <img src="../admin/assets/uploads/--><?php //echo $product['avatar'] ?><!--" alt="">-->
<!--            </div>-->
            <div class="avatar_detail">
                <div class="img_display">
                    <img class="img-feature" src="../admin/assets/uploads/<?php echo $product['avatar'] ?>" alt="">
                </div>

                <div class="list_img">
                    <div class="list-image">
                        <div class="control prev"><i class="fas fa-chevron-left"></i></div>
                        <div><img src="../admin/assets/uploads/<?php echo $product['avatar'] ?>" alt=""></div>
                        <?php if (!empty($products_img)): ?>
                            <?php foreach ($products_img as $key => $products_img): ?>
                                <div>
                                    <img width="" src="../admin/assets/uploads/<?php echo $products_img['avatars'] ?>"/>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="control next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" class="add_cart" method="post">
            <div class="text_show_pro">
                <div class="name_pro">
                    <h3><?php echo $product['title']; ?></h3>
<!--                    <br>-->
                    <p>Mã sản phẩm: </p>
                    <span><?php echo $product['title']; ?></span>
                </div>

<!--                <hr>-->

                <div class="money_pro">
                    <div class="money">
                        <h2><?php echo number_format($product['price'], 0, '.', ','); ?>₫</h2>
                    </div>

                    <div class="type">
                        <div class="type_2">
                            <p>Bộ sưu tập:</p>
                            <a href=""><?php echo $product['summary'];?></a>
                        </div>
                    </div>
                </div>

<!--                <hr>-->

                <div class="note_pro">
                    <p><?php echo $product['content'];?></p>
                </div>

<!--                <hr>-->

<!--                <div class="size_many">-->
<!--                    <p>Chọn size</p>-->
<!--                    <div class="text_size">-->
<!--                        <label>-->
<!--                            <input type="radio" value="39" name="size">-->
<!--                            <p>39</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="40" name="size">-->
<!--                            <p>40</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>41</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>42</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>43</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>44</p>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="how_many">-->
<!--                        <span>Số lượng</span>-->
<!--                        <input type="number" value="1" min="0" class="form_sl">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="promotion-content">
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion1.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion1">
                            <a href="tel:0789970907"><span style="color:#FF0000"><strong>0789.970.907</strong></span></a> Hotline đặt hàng (8h30 - 21h) T2 -> CN
                        </div>
                    </div>
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion2.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion2">
                            Nhận Combo quà tặng khi mua giày
                        </div>
                    </div>
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion3.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion3">
                            Giao hàng siêu tốc TP.HCM trong 1->2h.
                        </div>
                    </div>
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion4.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion4">
                            Thanh toán tiện lợi bằng tiền mặt, chuyển khoản, cà thẻ...
                        </div>
                    </div>
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion5.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion5">
                            Miễn phí vận chuyển cho đơn hàng từ 1.000.000vnd trở lên
                        </div>
                    </div>
                    <div class="flex-promotion">
                        <div class="item-promotion-image">
                            <img width="30" height="30" class="lazyload" src="assets/imagers/icons/icon_promotion6.png" alt="icon"/>
                        </div>
                        <div class="item-promotion fpromotion6">
                            Đổi hàng trong vòng 7->14 ngày với sản phẩm chưa sử dụng.
                        </div>
                    </div>
                </div>

<!--                <br>-->
<!--                <hr>-->

                <div class="order">
                    <a href="index.php?controller=cart&action=index">
                        <div data-id="<?php echo $product['id']; ?>" class="add-to-cart">
                            <i class="fa fa-cart-plus"></i> Đặt hàng
                        </div>
                    </a>
                </div>


                <div class="support">
                    <div class="padding_phone">
                        <p>Hỗ trợ đặt hàng</p>
                        <div class="phone">
                            <div class="img_phone">
                                <img width="60" height="60" class="lazyload" src="assets/imagers/phone.jpg" alt="">
                            </div>
                            <div class="sdt_phone">
                                <a href="">Ngọc Ánh: 078.246.5555</a>
                                <a href="">Quốc Anh: 0923.833.666</a>
                            </div>
                        </div>
                    </div>

                    <div class="zalo">
                        <div class="phone">
                            <div class="img_phone">
                                <img width="60" height="60" class="lazyload" src="assets/imagers/zalo.png" alt="">
                            </div>
                            <div class="sdt_phone">
                                <a href="">Ngọc Ánh: 078.246.5555</a>
                                <a href="">Quốc Anh: 0923.833.666</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>
        </form>
    </div>
</div>


<!--<div class="detail">-->
<!--    <div><img src="../admin/assets/uploads/--><?php //echo $product['avatar'] ?><!--" alt=""></div>-->
<!--        --><?php //foreach ($products_img as $key => $products_img): ?>
<!--            <div>-->
<!--                <img width="" src="../admin/assets/uploads/--><?php //echo $products_img['avatars'] ?><!--"/>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--</div>-->