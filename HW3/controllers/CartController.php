<?php


namespace controllers;


use Logger;
use PDOException;
use repositories\ProductRepository;

class CartController extends Controller
{
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new ProductRepository();
    }

    public function index()
    {
        if (!isset($_SESSION['cart'])) {
            $this->redirectTo('/');
        }

        $cart = $_SESSION['cart'];

        $this->data("head", "Cart");
        $this->data("cart", $cart);
        $this->data("template", "cart/index");

        $this->returnView('/index');
    }

    public function add()
    {
        $model = $_POST;

        if (isset($model['id'])) {
            try {
                $product = $this->repository->findById($model['id']);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }

            $product += ['quantity' => 1];

            if (!in_array($product, $_SESSION['cart'])) {

                if (isset($_SESSION['loggedUser']) && isset($_SESSION['cart'])) {
                    array_push($_SESSION['cart'], $product);
                } elseif (isset($_SESSION['loggedUser']) && !isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [$product];
                } else {
                    $this->redirectTo('/login');
                }
            }
            $this->redirectTo('/products');
        }

        $this->redirectTo('/');
    }

    public function delete($id)
    {
        unset($_SESSION['cart'][$id]);

        $this->redirectTo('/cart');
    }

    public function lessQuantity()
    {
        $model = $_POST;
        $key = array_search($model['id'], array_column($_SESSION['cart'], 'id'));

        if (isset($model['id'])) {
            if (isset($_SESSION['cart'][$key]) && $_SESSION['cart'][$key]['quantity'] != 1) {
                $_SESSION['cart'][$key]['quantity'] -= 1;
            }
        }

        $this->redirectTo('/cart');
    }

    public function moreQuantity()
    {
        $model = $_POST;
        $key = array_search($model['id'], array_column($_SESSION['cart'], 'id'));

        if (isset($model['id'])) {
            if (isset($_SESSION['cart'][$key]) && $_SESSION['cart'][$key]['amount'] >= $_SESSION['cart'][$key]['quantity']) {
                $_SESSION['cart'][$key]['quantity'] += 1;
            } else {
                $this->redirectTo('problem');
            }
        }

        $this->redirectTo('/cart');
    }

    public function setQuantity()
    {
        $model = $_POST;
        $key = array_search($model['id'], array_column($_SESSION['cart'], 'id'));

        if (isset($model['id'])) {
            if (isset($_SESSION['cart'][$key])) {
                if ($_SESSION['cart'][$key]['amount'] >= $model['quantity']) {
                    $_SESSION['cart'][$key]['quantity'] = $model['quantity'];
                }
            } else {
                $this->redirectTo('problem');
            }
        }

        $this->redirectTo('/cart');
    }
}