<?php

namespace App\Modules\Order;

class Order implements OrderInterface {
    public $id;

    public function __construct(
        public string $name,
        public string $date,
        public int $userId,
        public int $sum) {
    }
}
