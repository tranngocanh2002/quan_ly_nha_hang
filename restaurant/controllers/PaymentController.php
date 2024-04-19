<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Listproduct.php';
require_once 'models/OrderDetail.php';
//require_once 'libraries/PHPMailer/src/PHPMailer.php';
//require_once 'libraries/PHPMailer/src/SMTP.php';
//require_once 'libraries/PHPMailer/src/Exception.php';
require_once 'models/Category.php';
require_once 'models/News.php';

require_once "mail/PHPMailer/src/PHPMailer.php";
require_once "mail/PHPMailer/src/Exception.php";
require_once "mail/PHPMailer/src/POP3.php";
require_once "mail/PHPMailer/src/SMTP.php";

//include "../mail/PHPMailer/src/PHPMailer.php";
//include "../mail/PHPMailer/src/Exception.php";
//include "../mail/PHPMailer/src/POP3.php";
//include "../mail/PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaymentController extends Controller
{
    public function index()
    {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();

        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];

            $payment_status = 0;

            $price_total = 0;

            if (empty($fullname)) {
                $this->error = 'Họ và tên không được để trống';
            } else if (empty($mobile)) {
                $this->error = 'Số điện thoại không được để trống';
            } else if (empty($email)) {
                $this->error = 'Email confirm không được để trống';
            } else if (empty($address)) {
                $this->error = 'Địa chỉ confirm không được để trống';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }
            if (empty($this->error)) {
                foreach ($_SESSION['cart'] as $cart_item) {
                    $price_total +=
                        $cart_item['price'] * $cart_item['quantity'];
                }
                $order_model = new Order();
                $order_id = $order_model->insertData($fullname,$address,$mobile,$email,$note,$price_total);
//                $orders_id = $order_model->getByAll();
//                echo '<pre>';
//                print_r($orders_id);
//                die();

                foreach ($_SESSION['cart'] AS $cart_item) {
                    $order_detail_model = new OrderDetail();
                    $infos = [
                        'order_id' => $order_id,
                        'product_name' => $cart_item['name'],
                        'product_price' => $cart_item['price'],
                        'quantity' => $cart_item['quantity'],
                    ];
                    $is_insert = $order_detail_model->insertData($infos);
                }


                unset($_SESSION['cart']);

                if ($method == 0) {

                } else {

                }
                header('Location: index.php?controller=payment&action=thank&id='.$order_id);
                exit();
            }
        }

        $this->page_title = 'Trang thanh toán';
        $this->content =
            $this->render('views/payments/index.php',[
                'newsall' => $newsall
            ]);
        require_once 'views/layouts/payment.php';
    }
    public function thank()
    {
        $id = $_GET['id'];
        $orders_model = new Order();
        $ordersall = $orders_model->getById($id);
        $category_model = new Category();
        $categories = $category_model->getAll();
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $product_model = new Listproduct();
        $products = $product_model->getById($id);
//        echo '<pre>';
//        print_r($ordersall[0]['email']);
//        die();

//        include "../mail/PHPMailer/src/PHPMailer.php";
//        include "../mail/PHPMailer/src/Exception.php";
//        include "PHPMailer/src/PHPMailer.php";
//        include "PHPMailer/src/Exception.php";
//        include  "PHPMailer/src/OAuth.php";
//        include "../mail/PHPMailer/src/POP3.php";
//        include "../mail/PHPMailer/src/SMTP.php";
//
//        use PHPMailer\PHPMailer\PHPMailer;
//        use PHPMailer\PHPMailer\Exception;

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        $mail->CharSet = "UTF-8";
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'tranngocanhtmu@gmail.com';                 // SMTP username
            $mail->Password = 'rntemchvrntuegzp';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('tranngocanhtmu@gmail.com', 'Cửa hàng giày đá bóng');
//    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress($ordersall[0]['email'], 'Người dùng ');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

            //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thông tin đơn hàng';
            $mail->Body = $this->render('views/payments/mail_template_order.php',[
                'ordersall' => $ordersall,
                'products' => $products,
                'newsall' => $newsall
            ]);
//                'This is the HTML message body <b>in bold!</b>';
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $this->content =
                $this->render('views/payments/thank.php',[
//                    'ordersall' => $ordersall,

                ]);
            require_once 'views/layouts/main.php';
//            echo 'Thành công';
        } catch (Exception $e) {
            echo 'Lỗi ', $mail->ErrorInfo;
        }
//        $this->content = $this->render('views/payments/thank.php', [
//        ]);
//        require_once 'views/layouts/payment.php';
    }
}