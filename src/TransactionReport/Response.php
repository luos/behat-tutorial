<?php

namespace TransactionReport;

class Response
{
    /**
     * @var float
     */
    private $periodTotal;

    /**
     * @var array
     */
    private $sumByEntity;

    /**
     * Response constructor.
     * @param float $periodTotal
     * @param array $sumByEntity
     */
    public function __construct($periodTotal, array $sumByEntity)
    {
        $this->periodTotal = $periodTotal;
        $this->sumByEntity = $sumByEntity;
    }

    /**
     * @return float
     */
    public function getPeriodTotal()
    {
        return $this->periodTotal;
    }

    /**
     * @return array
     */
    public function getSummaries()
    {
        return $this->sumByEntity;
    }



}