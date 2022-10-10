<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ratchet\Server\IoServer;
use App\Services\Chat;
use App\Services\Rabbit\RabbitPublisherService;
use App\Services\Rabbit\RabbitReceivingService;

$rabbitPublisherService = new RabbitPublisherService();
$rabbitPublisherService->sendMessage();

$rabbitReceivingService = new RabbitReceivingService();
$rabbitReceivingService->handleMessage();


//$server = IoServer::factory(
//    new Chat(),
//    8181
//);
//
//$server->run();
