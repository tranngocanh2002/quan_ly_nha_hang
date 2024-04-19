<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Book.php';
require_once 'helpers/Helper.php';
require_once 'models/Category.php';


class HomeController extends Controller {
    public function index() {
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        foreach ($categories as $key => $cate) {
            $products[] = $product_model->getAllCate($cate);
        }
        // $news_model = new News();
        // $newsall = $news_model->getAllList();

        // $product_model = new Product();
        // $products = $product_model->getProductInHomePage();
        $book_model = new Book();
        $sets = $book_model->outSet();
        $this->content = $this->render('views/homes/index.php', [
            'categories' => $categories,
            'products' => $products,
            'sets' => $sets,
        ]);
        require_once 'views/layouts/main.php';
    }
}