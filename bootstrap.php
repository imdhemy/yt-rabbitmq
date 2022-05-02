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
