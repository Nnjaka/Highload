<?php

namespace App\Modules\Order;

interface OrderStorageInterface
{
    public function runQuery($query, Order $order): void;

    public function insert(Order $order): void;

    public function update(Order $order): void;

    public function delete(Order $order): void;
}
