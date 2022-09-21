<?php

namespace App\Http\Controllers;

use App\Services\QuickSortInterface;
use Psr\Log\LoggerInterface;

class QuickSortController
{
    public function __construct(private LoggerInterface $logger, private QuickSortInterface $quickSort)
    {
    }

    public function list()
    {
        try {
            $inputArray = [1,2,3,4,1,5,3];

            $timeStart = time();

            $this->quickSort->sort($inputArray);

            $timeEnd = time();

            $this->logger->debug($timeEnd - $timeStart);
            $this->logger->debug(memory_get_usage());
        } catch (\Throwable $exception)
        {
            $this->logger->error('Ошибки: ' . $exception->getMessage());
        }
    }
}
