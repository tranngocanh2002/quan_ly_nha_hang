<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Book.php';
require_once 'helpers/Helper.php';
require_once 'models/Category.php';


class BookController extends Controller
{
    public function index()
    {
        if (isset($_POST['submit'])) {
            $full_name = $_POST['full_name'];
            $date = $_POST['date'];
            $people = $_POST['people'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            // $status = $_POST['status'];
            $message = $_POST['message'];
            if (empty($full_name)) {
                $this->error = 'Tên không được để trống';
            } 
            if (empty($phone)) {
                $this->error = 'Số điện thoại không được để trống';
            } 
            if (empty($email)) {
                $this->error = 'Email không được để trống';
            } 
            if (empty($date)) {
                $this->error = 'Thời gian ăn không được để trống';
            } 
            // if (empty($message)) {
            //     $this->error = 'Message không được để trống';
            // } 
            if (empty($this->error)) {
                $product_model = new Book();
                $product_model->full_name = $full_name;
                $product_model->date = $date;
                $product_model->people = $people;
                $product_model->phone = $phone;
                $product_model->email = $email;
                // $product_model->status = $status;
                $product_model->message = $message;
                $is_insert = $product_model->insert();

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                }

                header('Location: index.php?controller=book');
                exit();
            }
        }
        $book_model = new Book();
        $sets = $book_model->outSet();
        $this->content = $this->render('views/book/index.php', [
            'sets' => $sets,
        ]);
        require_once 'views/layouts/main.php';
    }
}
