<?php

namespace TransactionReport;


class TransactionStore
{
    private $transactions = [];

    public function addTransaction( $entityName, $value, \DateTimeImmutable $date ){
        $this->transactions[] = [ $entityName , $value , $date ];
    }

    public function getTransactionsInPeriod( \DateTimeImmutable $start, \DateTimeImmutable $end ){
        return $this->transactions;
    }
}