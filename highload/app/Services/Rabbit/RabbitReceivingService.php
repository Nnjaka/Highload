<?php

namespace App\Services\Rabbit;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitReceivingService
{
    public function __construct(
        private ?AMQPStreamConnection $AMQPStreamConnection = null
    ){
        $this->AMQPStreamConnection = $this->AMQPStreamConnection ??
            new AMQPStreamConnection(
                'rabbitMQ',
                5672,
                'guest',
                'guest'
            );
    }

    public function handleMessage()
    {
        try {
            $channel = $this->AMQPStreamConnection->channel();
            $channel->queue_declare(
                'Pizza',
                false,
                true,
                false,
                false
            );

            $channel->basic_consume(
                'Pizza',
                false,
                true,
                false,
                [$this, 'processOrder']
            );

            while (count($channel->callbacks)){
                $channel->wait();
            }

            $channel->close();
            $this->AMQPStreamConnection->close();
        } catch (AMQPProtocolChannelException|\AMQPException $e){
            echo $e->getMessage();
        }
    }

    public function processOrder(string $msg, $channel){
        $channel->queue_declare('hello', false, false, false, false);

        $msg = new AMQPMessage('Hello World');
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Sent 'Hello World!'\n";
    }

}
