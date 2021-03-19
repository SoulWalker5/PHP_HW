<?php


namespace repositories;

use databases\Database;
use interfaces\RepositoryInterface;
use PDO;

class OrderRepository implements RepositoryInterface
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {

    }

    public function findById($id)
    {
        $query = "SELECT * FROM `products` WHERE `number` = :number";
        $model = ['number' => $id];

        return $this->execute($query, $model, 'fetch');
    }

    public function create($model)
    {
        $orderModel = ['number' => $model[0]['number'], 'user_id' => $model[0]['user_id']];
        $query = "INSERT INTO `order`(`number`, `user_id`) VALUES(:number, :user_id);";

        $this->execute($query, $orderModel);

        $lastInsertId = $this->db->lastInsertId();
        unset($query);

        for ($i = 0, $count = sizeof($model); $i < $count; $i++) {
            //            $model[$i] += ['order_id' => $lastInsertId];
            if ($i == 0) {
                $query = "INSERT INTO `orders_products`(`order_id`, `product_id`, `quantity`) VALUES(:order_id$i, :id$i, :quantity$i)";
                $order_productModel = [
                    'order_id' . $i => $lastInsertId,
                    'id' . $i => $model[$i]['id'],
                    'quantity' . $i => $model[$i]['quantity']
                ];
            } else {
                $query .= ", (:order_id$i, :id$i, :quantity$i);";
                $order_productModel['order_id' . $i] = $lastInsertId;
                $order_productModel['id' . $i] = $model[$i]['id'];
                $order_productModel['quantity' . $i] = $model[$i]['quantity'];
            }
        }

        return $this->execute($query, $order_productModel);
    }

    public function delete($id)
    {

    }

    public function update($model)
    {

    }

    public function getOrdersByUsers()
    {
        $query = "SELECT `firstname`, `email`, `order_id` , `number` AS `order_number`,`quantity` ,`product_id` ,`title` , `price`
                FROM (SELECT * FROM `orders_products`) `o_p` 
                LEFT JOIN `orders` `o` ON `o_p`.`order_id` = `o`.`id`
                LEFT JOIN `users` `u` ON `o`.`user_id` = `u`.`id`
                LEFT JOIN `products` `p` ON `o_p`.`product_id` = `p`.`id`;";

        return $this->execute($query);

//        $queryGroupBY = "SELECT `firstname`, `email`, `order_id` , `number` AS `order_number`, SUM((`quantity` * `price`)) AS `total_price`
//                FROM (SELECT * FROM `orders_products`) `o_p`
//                LEFT JOIN `orders` `o` ON `o_p`.`order_id` = `o`.`id`
//                LEFT JOIN `users` `u` ON `o`.`user_id` = `u`.`id`
//                LEFT JOIN `products` `p` ON `o_p`.`product_id` = `p`.`id`
//                GROUP BY  `firstname`, `email`, `order_id`, `number`;";
    }

    private function execute($query, $model = [], $fetchMode = 'fetchAll')
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($model);
        $result = $stmt->$fetchMode(PDO::FETCH_ASSOC);

        return $result;
    }
}