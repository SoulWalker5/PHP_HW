<?php


namespace controllers;

use Logger;
use models\Product;
use PDOException;
use repositories\ProductRepository;

class ProductController extends Controller
{
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new ProductRepository();
    }

    public function createAction()
    {
        $model = $_POST;

        if (isset($model)) {
            try {
                $newproduct = $this->repository->create($model);
                $product = $this->repository->findById($newproduct);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        return $this->response('New product added', 200);
    }

    public function editAction()
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        $model = $_POST;

        echo $_SESSION['cart'];

        $product = $this->repository->findById($model['id']);

        if (isset($model) && !in_array($product, $_SESSION['cart'])) {
            try {
                $this->repository->update($model);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }
            return $this->response($model, 200);
        }
        return $this->response('In cart, cannot update', 200);
    }

    public function deleteAction()
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        if ($_POST['id']) {
            try {
                $this->repository->delete($_POST['id']);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        return $this->response('Deleted', 200);
    }


    public function index()
    {
        try {
            $products = $this->repository->getAll();
        } catch (PDOException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

            $this->redirectTo('page404');
        }

        $this->data("head", "Products");
        $this->data("products", $products);
        $this->data("template", "product/index");

        $this->returnView("/index");
    }

    public function find($id)
    {
        if (isset($id)) {
            try {
                $product = $this->repository->findById($id);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('page404');
            }

            $this->data("head", "Product Details");
            $this->data("product", $product);
            $this->data("template", "product/details");

            $this->returnView("/index");
        }
    }

    public function getCreatePage()
    {
        if ($_SESSION["role"] != 'admin') {
            $this->redirectTo('/');
        }

        $this->data("template", "product/create");
        $this->returnView("index");
    }

    public function create()
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        #Title could be anything, price & amount validated by form, description may not be
        $model = $_POST;
        if (isset($model)) {
            try {
                $this->repository->create($model);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        $this->data("template", "successOperation");
        $this->returnView("index");
    }

    public function getDeletePage($id)
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        if (isset($id)) {
            try {
                $product = $this->repository->findById($id);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        $this->data("product", $product);
        $this->data("template", "product/delete");

        $this->returnView("index");
    }

    public function delete($id)
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        if (isset($id)) {
            try {
                $this->repository->delete($id);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        $this->redirectTo('/products');
    }

    public function getUpdatePage($id)
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        if (isset($id)) {
            try {
                $product = $this->repository->findById($id);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('/page404');
            }
        }

        $this->data("product", $product);
        $this->data("template", "product/update");

        $this->returnView("index");
    }

    public function update($id)
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        $model = $_POST;

        if (isset($id) && isset($model)) {
            try {
                $this->repository->update($model);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }
        }

        $this->redirectTo('/products');
    }
}