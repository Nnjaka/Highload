<?php

namespace App\Orm;

use App\Modules\Order\Order;

interface ShardingStragegyInterace
{
    public function getConnection(Order $order): \PDO;
}
