<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerQueryBus;

use Oscmarb\Ddd\Domain\Query\Query;
use Oscmarb\Ddd\Domain\Query\QueryBus;
use Oscmarb\Ddd\Domain\Query\Response\QueryResponse;
use Oscmarb\MessengerBus\SymfonyMessengerBus;

class SymfonyMessengerQueryBus extends SymfonyMessengerBus implements QueryBus
{
    public function __construct(array $handlers, array $middlewares)
    {
        parent::__construct($handlers, $middlewares, true);
    }

    public function handle(Query $query): QueryResponse
    {
        return $this->dispatch($query);
    }

    protected function noHandlerForMessageException(mixed $data): ?\Throwable
    {
        return new QueryNotRegisteredException($data::class);
    }
}