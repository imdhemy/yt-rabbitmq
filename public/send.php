<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__ . '/../bootstrap.php';

/** @var AMQPStreamConnection $connection */

// create a channel
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
