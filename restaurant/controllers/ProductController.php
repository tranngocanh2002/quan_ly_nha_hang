<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
// require_once 'models/News.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {
    public function index()
    {
        $product_model = new Product();
        $count_total = $product_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 16,
            'query_string' => 'page',
            'controller' => 'product',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        // $products = $product_model->getAllPagination($arr_params);
        $category_model = new Category();
        $categories = $category_model->getAll();
        // $products = $product_model->getAllCate($arr_params);
        foreach ($categories as $key => $cate) {
            // echo $cate;
            $products[] = $product_model->getAllCate($cate);
        }
        $pagination = new Pagination($arr_params);

        $pages = $pagination->getPagination();

        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
            'categories' => $categories,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID ko hợp lệ';
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $category_model = new Category();
        $categories = $category_model->getAll();

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        $products_img = $product_model->getByImgId($id);

        $this->content = $this->render('views/products/detail.php', [
            'product' => $product,
            'products_img' => $products_img
        ]);
        require_once 'views/layouts/main.php';
    }

}