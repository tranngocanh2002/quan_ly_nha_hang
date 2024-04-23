<?php
require_once 'controllers/Controller.php';
require_once 'models/Set.php';
require_once 'models/Pagination.php';

class SetController extends Controller
{

    public function index()
    {
        $category_model = new Set();
        $params = [
            'limit' => 5,
            'query_string' => 'page',
            'controller' => 'category',
            'action' => 'index',
            'full_mode' => FALSE,
        ];

        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])) {
            $params['query_additional'] = '&name=' . $_GET['name'];
        }
        $count_total = $category_model->countTotal();
        $params['total'] = $count_total;

        $params['page'] = $page;
        $pagination = new Pagination($params);
        $pages = $pagination->getPagination();
        $categories = $category_model->getAllPagination($params);

        $this->content = $this->render('views/sets/index.php', [
            'categories' => $categories,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $max = $_POST['max'];
            // $amount = $_POST['amount'];
            $status = $_POST['status'];
            if (empty($max)) {
                $this->error = 'Cần nhập tên';
            }
            if (empty($this->error)) {
                $category_model = new Set();
                $category_model->max = $max;
                // $category_model->amount = $amount;
                $category_model->status = $status;
                $is_insert = $category_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=set&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/sets/create.php');
        require_once 'views/layouts/main.php';
    }

    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID set không hợp lệ';
            header('Location: index.php?controller=set&action=index');
            exit();
        }

        $id = $_GET['id'];
        $category_model = new Set();
        $category = $category_model->getCategoryById($id);
        if (isset($_POST['submit'])) {
            $max = $_POST['max'];
            $amount = $_POST['amount'];
            $status = $_POST['status'];

            if (empty($max)) {
                $this->error = 'Nhập thông tin';
            }
            if (empty($this->error)) {
                $category_model = new Set();
                $category_model->max = $max;
                $category_model->amount = $amount;
                $category_model->status = $status;
                // $category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $category_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thành công';
                } else {
                    $_SESSION['error'] = 'Update thất bại';
                }
                header('Location: index.php?controller=set&action=index');
                exit();
            }

        }

        $this->content = $this->render('views/sets/update.php', ['category' => $category]);
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=set&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Set();
        $is_delete = $category_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: index.php?controller=set&action=index');
        exit();
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=set&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Set();
        $category = $category_model->getCategoryById($id);
        //lấy nội dung view create.php
        $this->content = $this->render('views/sets/detail.php', [
            'category' => $category
        ]);
        require_once 'views/layouts/main.php';
    }
}
