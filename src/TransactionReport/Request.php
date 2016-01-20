<?php

namespace TransactionReport;

class Request
{
    /**
     * @var \DateTimeImmutable
     */
    private $periodStart;

    /**
     * @var \DateTimeImmutable
     */
    private $periodEnd;

    /**
     * Request constructor.
     * @param DateTimeImmutable $periodStart
     * @param DateTimeImmutable $periodEnd
     */
    public function __construct( \DateTimeImmutable $periodStart, \DateTimeImmutable $periodEnd )
    {
        $this->periodStart = $periodStart;
        $this->periodEnd = $periodEnd;
    }


}