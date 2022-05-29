# Rabbit MQ for PHP developers

Rabbit MQ for PHP developers

## Lessons

**1. Hello World**

In this lesson we set up our local RabbitMQ and implement the traditional Hello World Example. You can find the source
code on the "[01-hello-world](https://github.com/imdhemy/yt-rabbitmq/tree/01-hello-world)" branch.

**2. Work Queues**

In this one we'll create a Work Queue that will be used to distribute time-consuming tasks among multiple workers. You
can find the source code on the "[02-work-queues](https://github.com/imdhemy/yt-rabbitmq/tree/02-work-queues)" branch.

- Round-robin dispatching
- Message acknowledgment
- Message durability
- Fair dispatch

**3. Publish/Subscribe**

In this part we'll do something completely different -- we'll deliver a message to multiple consumers. This pattern is
known as "publish/subscribe". You can find the code on
the "[03-pub-sub branch](https://github.com/imdhemy/yt-rabbitmq/tree/03-pub-sub)"

- A _producer_ is a user application that _sends_ messages.
- A _queue_ is a buffer that _stores_ messages.
- A _consumer_ is a user application that _receives_ messages.
- An _exchange_ receives messages from producers on one side and the other side it pushes them to queues.
- _Exchange types:_ direct, topic, headers & fanout.
