<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

require_once __DIR__ . '/vendor/autoload.php';

// Create connection
$connection = new AMQPStreamConnection(
    'localhost',
    5672,
    'rabbitmq',
    'secret'
);

// create a channel
$channel = $connection->channel();

// declare a queue
$channel->queue_declare(
    'task_queue',
    false,
    true,
    false,
    false
);

// Fair dispatch
$channel->basic_qos(null, 1, null);
