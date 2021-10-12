<?php

declare(strict_types=1);

namespace Oscmarb\MessengerQueryBus\Tests;

use Oscmarb\Ddd\Domain\Query\Query;

final class QueryMock extends Query
{
    private string $string;

    public function __construct(string $string, ?string $queryId = null, ?string $queryOccurredOn = null)
    {
        $this->string = $string;

        parent::__construct($queryId, $queryOccurredOn);
    }

    public function string(): string
    {
        return $this->string;
    }

    public static function queryName(): string
    {
        return 'query_mock';
    }

    public static function fromPrimitives(mixed $body, string $messageId, string $messageOccurredOn): self
    {
        return new self($messageId, $messageOccurredOn);
    }

    public function toPrimitives(): array
    {
        return [$this->string];
    }
}