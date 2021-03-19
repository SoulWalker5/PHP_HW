<?php


namespace controllers;


use Logger;
use PDOException;
use repositories\UserRepository;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->repository = new UserRepository();

        if($_SESSION["loggedUser"]){
            $this->redirectTo('/');
        }
    }

    public function getLoginPage()
    {
        $this->data("template", "login");
        $this->returnView("index");
    }

    public function login()
    {
        $model = $_POST;

        if (isset($model)) {
            try {
                $user = $this->repository->findByEmail($model);
            } catch (PDOException $e) {
                Logger::getInstance()->log($e->getMessage(), Logger::ERROR, $e);

                $this->redirectTo('problem');
            }

            if (isset($model['password']) && password_verify($model['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['loggedUser'] = $user['email'];
                $_SESSION['role'] = $user['role'];
            }

            $this->redirectTo('/');
        }
    }

    public function logout()
    {
        unset($_SESSION['loggedUser']);
        unset($_SESSION['role']);
        unset($_SESSION['cart']);

        $this->redirectTo('/');
    }

    public function register()
    {
        $this->data("template", "register");
        $this->returnView("index");
    }
}