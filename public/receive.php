<?php

use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;

require_once __DIR__ . '/../bootstrap.php';

// create a channel
/** @var AMQPStreamConnection|AbstractConnection $connection */
$channel = $connection->channel();

// declare a queue
$channel->queue_declare(
    'hello',
    false,
    false,
    false,
    false
);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

// Consume a queue
$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

// Block while channel has callbacks
while ($channel->is_open()) {
    $channel->wait();
}
