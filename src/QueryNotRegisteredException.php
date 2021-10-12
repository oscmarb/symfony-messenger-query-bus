<?php

declare(strict_types=1);

namespace Oscmarb\MessengerQueryBus;

final class QueryNotRegisteredException extends \RuntimeException
{
    private string $queryClass;

    public function __construct(string $queryClass)
    {
        $this->queryClass = $queryClass;

        parent::__construct();
    }

    public function queryClass(): string
    {
        return $this->queryClass;
    }
}