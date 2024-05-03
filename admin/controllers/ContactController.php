<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
require_once 'models/Pagination.php';
class ContactController extends Controller {
    public function index() {
        $user_model = new Contact();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total = $user_model->getTotal();
        $query_additional = '';
        if (isset($_GET['full_name'])) {
            $query_additional .= "&full_name=" . $_GET['full_name'];
        }
        $params = [
            'total' => $total,
            'limit' => 5,
            'query_string' => 'page',
            'controller' => 'user',
            'action' => 'index',
            'page' => $page,
            'query_additional' => $query_additional,
            'full_mode' => FALSE,
        ];
        $pagination = new Pagination($params);
        $pages = $pagination->getPagination();
        $users = $user_model->getAllPagination($params);

        $this->content = $this->render('views/contacts/index.php', [
            'users' => $users,
            'pages' => $pages,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function create() {
        $user_model = new Contact();
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $subject = $_POST['subject'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            //xử lý validate
            if (empty($first_name)) {
                $this->error = 'Tên không được để trống';
            }
            if (empty($phone)) {
                $this->error = 'Số điện thoại không được để trống';
            }
            else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }
            if (empty($this->error)) {
                // $user_model->first_name = $first_name;
                $user_model->subject = $subject;
                $user_model->phone = $phone;
                $user_model->email = $email;
                $user_model->status = $status;
                $is_insert = $user_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=contact');
                exit();
            }
        }

        $this->content = $this->render('views/contacts/create.php');

        require_once 'views/layouts/main.php';
    }

    public function update() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=contact");
            exit();
        }

        $id = $_GET['id'];
        $user_model = new Contact();
        $user = $user_model->getById($id);
        if (isset($_POST['submit'])) {
            $full_name = $_POST['full_name'];
            $subject = $_POST['subject'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }
            if (empty($this->error)) {
                $user_model->full_name = $full_name;
                $user_model->subject = $subject;
                $user_model->phone = $phone;
                $user_model->email = $email;
                $user_model->status = $status;
                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=contact');
                exit();
            }
        }

        $this->content = $this->render('views/contacts/update.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=contact');
            exit();
        }

        $id = $_GET['id'];
        $user_model = new Contact();
        $is_delete = $user_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=contact');
        exit();
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=contact");
            exit();
        }
        $id = $_GET['id'];
        $user_model = new Contact();
        $user = $user_model->getById($id);

        $this->content = $this->render('views/contacts/detail.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }
}