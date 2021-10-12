<?php

declare(strict_types=1);

namespace Oscmarb\SymfonyMessengerQueryBus\Tests;

use Oscmarb\Ddd\Domain\Query\QueryHandler;
use Oscmarb\Ddd\Domain\Query\Response\StringResponse;

final class QueryMockHandler implements QueryHandler
{
    public function __invoke(QueryMock $query): StringResponse
    {
        return new StringResponse($query->string());
    }
}