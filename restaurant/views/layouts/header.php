<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Đang tải...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <?php
        if (isset($_GET['controller'])) {
            $check = $_GET['controller'];
            $check_product ='';
            $check_contact ='';
            $check_home ='';
            if ($check == 'product') {
                $check_product = "active";
            } elseif ($check == 'contact') {
                $check_contact = "active";
            }
        } else {
            $check_home = "active";
        }
        ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="index.php" class="nav-item nav-link <?php echo $check_home?>">Trang chủ</a>
                <a href="index.php?controller=product&action=index" class="nav-item nav-link <?php echo $check_product?>">Thực đơn</a>
                <a href="index.php?controller=contact&action=index" class="nav-item nav-link <?php echo $check_contact?>">Liên hệ</a>
            </div>
            <a href="index.php?controller=book&action=index" class="btn btn-primary py-2 px-4">Đặt bàn</a>
        </div>
    </nav>