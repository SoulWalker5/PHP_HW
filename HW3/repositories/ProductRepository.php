<?php

namespace repositories;

use databases\Database;
use interfaces\RepositoryInterface;
use PDO;

class ProductRepository implements RepositoryInterface
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        //We can replace * to this => `title`, `price`, `amount`, `description`
        $query = 'SELECT * FROM `products`';

        return $this->execute($query);
    }

    public function findById($id)
    {
        $query = "SELECT * FROM `products` WHERE `id` = :id";
        $model = ['id' => $id];

        return $this->execute($query, $model, 'fetch');
    }

    public function create($model)
    {
        $query = "INSERT INTO `products`(`title`, `price`,`amount`, `description`) VALUES(:title, :price, :amount, :description)";

        return $this->execute($query, $model);
    }

    public function delete($id)
    {
        $query = 'DELETE FROM `products` WHERE `id` = :id';
        $model = ['id' => $id];

        return $this->execute($query, $model);
    }

    public function update($model)
    {
        $query = "UPDATE `products` SET `title` = :title, `price` = :price, `amount` = :amount, `description` = :description WHERE `id` = :id";

        $model = ['title' => $model[0]['title'], 'price' => $model[0]['price'], 'amount' => $model[0]['amount'], 'description' => $model[0]['description'], 'id' => $model[0]['id']];
        return $this->execute($query, $model);
    }

    public function updateAmount($model)
    {
//        $query = "UPDATE `products` SET `amount` = `amount` - :quantity WHERE `id` = :id$i;";

        for ($i = 0, $count = sizeof($model); $i < $count; $i++) {
            if ($i == 0) {
                $query = "UPDATE `products` SET `amount` = `amount` - :quantity$i WHERE `id` = :id$i;";
                $productModel = ['quantity' . $i => $model[0]['quantity'], 'id' . $i => $model[$i]['id']];
            } else {
                $query .= " UPDATE `products` SET `amount` = `amount` - :quantity$i WHERE `id` = :id$i;";
                $productModel['quantity' . $i] = $model[$i]['quantity'];
                $productModel['id' . $i] = $model[$i]['id'];
            }
        }

//        $model = ['quantity' => $model[0]['quantity'], 'id' => $model[0]['id']];

        return $this->execute($query, $productModel);
    }

    private function execute($query, $model = [], $fetchMode = 'fetchAll')
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($model);
        $result = $stmt->$fetchMode(PDO::FETCH_ASSOC);

        return $result;
    }
}