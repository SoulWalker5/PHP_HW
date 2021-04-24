<?php


namespace controllers;


use Logger;
use PDOException;
use repositories\OrderRepository;
use repositories\ProductRepository;

class OrderController extends Controller
{
    private $orderRepository;
    private $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = new OrderRepository();
        $this->productRepository = new ProductRepository();
    }

    public function makeOrderAction()
    {
        $model = $_SESSION['cart'];
        $orderNumber = rand(10000, 20000);

        for ($i = 0, $count = count($model); $i < $count; $i++) {
            $model[$i] += ['user_id' => $_SESSION['user_id']];
            $model[$i] += ['number' => $orderNumber];
        }

        if (isset($model)) {
            try {
                $this->orderRepository->create($model);
                $this->productRepository->updateAmount($model);
                unset($_SESSION['cart']);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }
        }

        return $this->response('Order was made', 200);
    }


    public function index()
    {
        if ($_SESSION['role'] != 'admin') {
            $this->redirectTo('/');
        }

        try {
            $ordersByUsers = $this->orderRepository->getOrdersByUsers();
        } catch (PDOException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

            $this->redirectTo('page404');
        }

        $this->data("head", "Orders by Users");
        $this->data("ordersByUser", $ordersByUsers);
        $this->data("template", "order/index");

        $this->returnView("/index");

    }

    public function createOrder()
    {
        $model = $_SESSION['cart'];
        $orderNumber = rand(10000, 20000);

        for ($i = 0, $count = count($model); $i < $count; $i++) {
            $model[$i] += ['user_id' => $_SESSION['user_id']];
            $model[$i] += ['number' => $orderNumber];
        }

        if (isset($model)) {
            try {
                $this->orderRepository->create($model);
                $this->productRepository->updateAmount($model);
                unset($_SESSION['cart']);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }
        }

        $this->data("template", "successOperation");

        $this->returnView("index");
    }

}