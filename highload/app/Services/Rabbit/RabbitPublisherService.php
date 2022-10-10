<?php

namespace App\Services\Rabbit;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitPublisherService
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

    public function sendMessage()
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

            $msg = new AMQPMessage('Margarita');

            $channel->basic_publish($msg, '', 'Pizza');

            $channel->close();
            $this->AMQPStreamConnection->close();
        } catch (AMQPProtocolChannelException|\AMQPException $e){
            echo $e->getMessage();
        }
    }

}
