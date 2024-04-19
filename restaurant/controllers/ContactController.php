<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Contact.php';
require_once 'helpers/Helper.php';
require_once 'models/Category.php';


class ContactController extends Controller
{
    public function index()
    {
        if (isset($_POST['submit'])) {
            $full_name = $_POST['full_name'];
            $subject = $_POST['subject'];
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
            // if (empty($message)) {
            //     $this->error = 'Message không được để trống';
            // } 
            if (empty($this->error)) {
                $product_model = new Contact();
                $product_model->full_name = $full_name;
                $product_model->subject = $subject;
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

                header('Location: index.php?controller=contact');
                exit();
            }
        }
        $this->content = $this->render('views/contacts/index.php', [
        ]);
        require_once 'views/layouts/main.php';
    }
}
