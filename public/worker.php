<?php

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;

require_once __DIR__ . '/../bootstrap.php';

/** @var AMQPChannel|AbstractChannel $channel */
/** @var AMQPStreamConnection|AbstractConnection $connection */

echo " [*] Waiting for messages. To exit press CTRL+C\n";

// Consume a queue
$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";

    sleep(substr_count($msg->body, '.'));
    
    echo " [x] Done\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

// Block while channel has callbacks
while ($channel->is_open()) {
    $channel->wait();
}
