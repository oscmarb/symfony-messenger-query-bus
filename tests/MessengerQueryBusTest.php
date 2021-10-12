<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerQueryBus\Tests;

use Oscmarb\Ddd\Domain\Query\Response\StringResponse;
use Oscmarb\SymfonyMessengerQueryBus\QueryNotRegisteredException;
use Oscmarb\SymfonyMessengerQueryBus\SymfonyMessengerQueryBus;
use PHPUnit\Framework\TestCase;

final class MessengerQueryBusTest extends TestCase
{
    public function test_should_handle_command(): void
    {
        $string = 'aString';

        $bus = new SymfonyMessengerQueryBus([new QueryMockHandler()], []);
        /** @var StringResponse $response */
        $response = $bus->handle(new QueryMock($string));

        self::assertInstanceOf(StringResponse::class, $response);
        self::assertEquals($response->value(), $string);
    }

    public function test_try_handle_command_without_handler(): void
    {
        $this->expectException(QueryNotRegisteredException::class);

        $bus = new SymfonyMessengerQueryBus([], []);
        $bus->handle(new QueryMock('aString'));
    }
}