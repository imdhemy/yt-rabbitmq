<?php

use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Connection\AbstractConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once __DIR__ . '/../bootstrap.php';

/** @var AMQPChannel|AbstractChannel $channel */
/** @var AMQPStreamConnection|AbstractConnection $connection */

// Publish a message
$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

// Print success message
echo "[x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();
