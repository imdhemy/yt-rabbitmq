<?php

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__ . '/../bootstrap.php';

/** @var AMQPChannel|AbstractChannel $channel */
/** @var AMQPStreamConnection|AbstractConnection $connection */

$data = implode(' ', array_slice($argv, 1));

if (empty($data)) {
    $data = 'Hello World';
}

// Publish a message
$msg = new AMQPMessage($data);
$channel->basic_publish($msg, '', 'hello');

// Print success message
echo sprintf("[x] Sent '%s'\n", $data);

$channel->close();
$connection->close();
