<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>restaurant</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/thanh_toan.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/top_up.js"></script>
<!--    <script src="assets/js/slide.js"></script>-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.show-more.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <script src="assets/js/zebra_tooltips.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="main">
    <div class="container_main">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
    </div>
    <?php echo $this->content; ?>
    <div title="Về đầu trang" id="top-up" style="display: none;">
        <i class="fas fa-arrow-circle-up"></i>
    </div>

</div>


</body>
<script src="assets/js/slide.js"></script>
</html>