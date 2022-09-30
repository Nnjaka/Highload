<?php

class RedisService
{
    public function getCashe(): void
    {
        $redis = new Redis();
        $redis->connect('redis');

        $redis->set('testInteger', 111);
        $redis->set('testString', 'someText');
        $redis->set('testArray', ['a', 'r', 'r', 'a', 'y']);
        $redis->set('testObject', new stdClass());

        var_dump($redis->get('testInteger'));
        var_dump($redis->get('testString'));
        var_dump($redis->get('testArray'));
        var_dump($redis->get('testObject'));
    }
}
