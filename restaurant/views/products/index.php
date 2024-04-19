<?php
require_once 'helpers/Helper.php';
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Thực đơn</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Thực đơn</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Thực đơn</h5>
                    <h1 class="mb-5">Sản phẩm phổ biến</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <?php foreach ($categories AS $key => $category): ?>
                            
                        <?php if ($key == 0) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3 <?php echo $active ?>" data-bs-toggle="pill" href="#tab-<?php echo ++$key?>">
                                <!-- <i class="fa fa-coffee fa-2x text-primary"></i> -->
                                <div class="ps-3">
                                    <!-- <small class="text-body">Popular</small> -->
                                    <!-- <?php print_r($categories) ?> -->
                                    <h6 class="mt-n1 mb-0"><?php echo $category['name'] ?></h6>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach ($products AS $count => $product): ?>
                        <?php if ($count == 0) {
                            $active_pro = "active";
                        } else {
                            $active_pro = "";
                        }
                        
                        ?>
                        <div id="tab-<?php echo ++$count?>" class="tab-pane fade show p-0 <?php echo $active_pro ?>">
                            <div class="row g-4">
                                    <?php foreach ($product AS $pro): ?>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="../admin/assets/uploads/<?php echo $pro['avatar'] ?>" alt="<?php echo $pro['title'] ?>" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $pro['title'] ?></span>
                                                    <span class="text-primary"><?php echo number_format($pro['price'])?>đ</span>
                                                </h5>
                                                <small class="fst-italic"><?php echo $pro['summary'] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->