<?php

use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

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

// Publish a message
$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

// Print success message
echo "[x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();
