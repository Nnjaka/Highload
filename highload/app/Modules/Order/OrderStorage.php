<?php

namespace App\Modules\Order;

use App\Orm\ShardingStragegyInterace;

class OrderStorage implements OrderStorageInterface
{

    public function __construct(private ShardingStragegyInterace $shardingStragegy)
    {
    }

    public function runQuery($query, Order $order): void
    {
        /** @var \PDO $connection */
        $connection = $this->shardingStragegy->getConnection($order);
        $connection->query($query);
    }

    public function insert(Order $order): void
    {
        //добавить запись и вернуть объект с id
        $this->runQuery("insert into `orders_users` (`name`, `date`, `user_id`, `sum`)
            VALUES ('$order->name', $order->date, $order->userId, $order->sum)", $order);
    }

    public function update(Order $order): void
    {
        //обновить объект
        $this->runQuery("update lalala", $order);
    }

    public function delete(Order $order): void
    {
        //удалить объект
        $this->runQuery("delete lalalal", $order);
    }
}
