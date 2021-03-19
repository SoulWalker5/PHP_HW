<?php


namespace controllers;


use Logger;
use models\User;
use PDOException;
use repositories\UserRepository;

class UserController extends Controller
{
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new UserRepository();

        if(!isset($_SESSION["loggedUser"]) && $_SESSION["role"] != 'admin'){
            $this->redirectTo('/');
        }
    }

    public function index()
    {
        try {
            $users = $this->repository->getAll();
        } catch (\PDOException $e) {
            Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

            $this->redirectTo('problem');
        }

        $this->data("head", "Users");
        $this->data("users", $users);
        $this->data("template", "user/index");

        $this->returnView("index");
    }

    public function find($id)
    {
        if (isset($id)) {
            try {
                $user = $this->repository->findById($id);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }

            $this->data("head", "User Details");
            $this->data("user", $user);
            $this->data("template", "user/details");

            $this->returnView("/index");
        }
    }

    public function create()
    {
        #Email verified by form, name could be anything, password need to be hashed
        $model = $_POST;

        if (isset($model)) {
            if (isset($model['password'])) {
                $model['password'] = password_hash($model['password'], PASSWORD_DEFAULT);
            }

            try {
                $this->repository->create($model);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }

            $this->data("template", "successOperation");
            $this->returnView("index");
        }
    }

//    public function getDeletePage($id)
//    {
//        if (isset($id)) {
//            try {
//                $user = $this->repository->findById($id);
//            } catch (PDOException $e) {
//                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
//
//                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/views/404page.php");
//                exit();
//            }
//        }
//
//        $this->data("product", $user);
//        $this->data("template", "product/delete");
//
//        $this->returnView("index");
//    }
//
//    public
//    function delete($id)
//    {
//        if (isset($id)) {
//            try {
//                $this->repository->delete($id);
//            } catch (PDOException $e) {
//                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
//
//                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/views/404page.php");
//                exit();
//            }
//        }
//
//        $this->returnView("index");
//    }
//
//    public
//    function getUpdatePage($id)
//    {
//        if (isset($id)) {
//            try {
//                $user = $this->repository->findById($id);
//            } catch (PDOException $e) {
//                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
//
//                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/views/404page.php");
//                exit();
//            }
//        }
//        $this->data("product", $user);
//        $this->data("template", "product/update");
//
//        $this->returnView("index");
//    }
//
//    public function update($id)
//    {
//        $model = $_POST;
//
//        if (isset($id) && isset($model)) {
//            try {
//                $this->repository->update($model);
//            } catch (PDOException $e) {
//                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);
//
//                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/views/404page.php");
//                exit();
//            }
//        }
//
//        $this->returnView("index");
//    }
}