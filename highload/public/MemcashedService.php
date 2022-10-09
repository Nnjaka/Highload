<?php

class MemcashedService
{
    public function getCashe(): void
    {
        $memcached = new Memcached();
        $memcached->addServer('memcached', 11211);

        $memcached->set('testInteger', 222);
        $memcached->set('testString', 'otherText');
        $memcached->set('testArray', ['a', 'r', 'r', 'a', 'y', 2]);
        $memcached->set('testObject', new stdClass());

        var_dump($memcached->get('testInteger'));
        var_dump($memcached->get('testString'));
        var_dump($memcached->get('testArray'));
        var_dump($memcached->get('testObject'));
    }
}
