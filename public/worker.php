<?php

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__ . '/../bootstrap.php';

/** @var AMQPChannel|AbstractChannel $channel */
/** @var AMQPStreamConnection|AbstractConnection $connection */

echo " [*] Waiting for messages. To exit press CTRL+C\n";

// Consume a queue
$callback = function (AMQPMessage $msg) {
    echo ' [x] Received ', $msg->body, "\n";

    sleep(substr_count($msg->body, '.'));

    echo " [x] Done\n";

    $msg->ack();
};

$channel->basic_consume('hello', '', false, false, false, false, $callback);

// Block while channel has callbacks
while ($channel->is_open()) {
    $channel->wait();
}
