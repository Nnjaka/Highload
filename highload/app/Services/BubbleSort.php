<?php

namespace App\Services;

class BubbleSort implements BubbleSortInterface
{
    public function sort(array $elements): array
    {
        $count = count($elements);

        for($i = 0; $i < $count; $i++){
            for($j = 0; $j < $count-1; $j++){
                if($elements[$j] > $elements[$j+1]){
                    $temp = $elements[$j+1];
                    $elements[$j+1] = $elements[$j];
                    $elements[$j] = $temp;
                }
            }
        }

        return $elements;
    }
}
