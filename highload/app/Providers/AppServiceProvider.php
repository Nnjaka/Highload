<?php

namespace App\Providers;

use App\Modules\Order\Order;
use App\Modules\Order\OrderInterface;
use App\Modules\Order\OrderStorage;
use App\Modules\Order\OrderStorageInterface;
use App\Orm\ShardingStragegy;
use App\Orm\ShardingStragegyInterace;
use App\Services\BubbleSort;
use App\Services\BubbleSortInterface;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use App\Services\QuickSortInterface;
use App\Services\QuickSort;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoggerInterface::class, function ($app){
            return new Logger('highload_logger');
        });
        $this->app->bind(QuickSortInterface::class, QuickSort::class);
        $this->app->bind(BubbleSortInterface::class, BubbleSort::class);
        $this->app->bind(ShardingStragegyInterace::class, ShardingStragegy::class);
        $this->app->bind(OrderStorageInterface::class, OrderStorage::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
