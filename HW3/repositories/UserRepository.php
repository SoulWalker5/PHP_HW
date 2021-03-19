<?php

namespace repositories;

use databases\Database;
use interfaces\RepositoryInterface;
use PDO;

class UserRepository implements RepositoryInterface
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $query = 'SELECT * FROM `users`';

        return $this->execute($query);
    }

    public function findById($id)
    {
        $query = "SELECT * FROM `users` WHERE `id` = $id";
        $model = ['id' => $id];

        return $this->execute($query, $model, 'fetch');
    }

    public function create($model)
    {
        $query = "INSERT INTO `users`(`email`, `firstname`, `password`, `date_created`) VALUES (:email, :firstname, :password, NOW())";

        return $this->execute($query, $model);
    }

    public function delete($id)
    {
        $query = 'DELETE FROM `users` WHERE `id` = :id';
        $model = ['id' => $id];

        return $this->execute($query, $model);
    }

    public function update($model)
    {
        $query = "UPDATE `users` SET `email` = :email, `firstname` = :firstname, `password` = :password WHERE `id` = :id";
        $model = $model->getData();

        return $this->execute($query, $model);
    }

    public function findByEmail($model)
    {
        $query = "SELECT `u`.`id` , `u`.`firstname` , `u`.`email` , `u`.`password` , `u`.`date_created` , `roles`.`title` `role` FROM (SELECT * FROM `users` WHERE `email` = :email) `u` LEFT JOIN `roles` ON `u`.`role_id` = `roles`.`id`;";
        $model = ['email' => $model['email']];

        return $this->execute($query, $model, 'fetch');
    }



    private function execute($query, $model = [], $fetchMode = 'fetchAll')
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($model);
        $result = $stmt->$fetchMode(PDO::FETCH_ASSOC);

        return $result;
    }
}