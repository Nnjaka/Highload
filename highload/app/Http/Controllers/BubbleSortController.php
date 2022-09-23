<?php

namespace App\Http\Controllers;

use App\Services\BubbleSortInterface;
use Psr\Log\LoggerInterface;

class BubbleSortController
{
    public function __construct(private LoggerInterface $logger, private BubbleSortInterface $bubbleSort)
    {
    }

    public function list()
    {
        try {
            $inputArray = [1,2,3,4,1,5,3];

            $timeStart = time();

            $this->bubbleSort->sort($inputArray);

            $timeEnd = time();

            $this->logger->debug($timeEnd - $timeStart);
            $this->logger->debug(memory_get_usage());
        } catch (\Throwable $exception)
        {
            $this->logger->error('Ошибки: ' . $exception->getMessage());
        }
    }
}
