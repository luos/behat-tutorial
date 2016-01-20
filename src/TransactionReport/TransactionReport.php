<?php
namespace TransactionReport;

require_once "Request.php";
require_once "Response.php";
require_once "TransactionStore.php";
require_once "Summary.php";

class TransactionReport
{
    /** @var  TransactionStore */
    private $transactions;

    /**
     * TransactionReport constructor.
     * @param TransactionStore $transactions
     */
    public function __construct(TransactionStore $transactions)
    {
        $this->transactions = $transactions;
    }


    public function execute(Request $request){
        $transactionsInPeriod = $this->transactions->getTransactionsInPeriod($request->getPeriodStart(), $request->getPeriodStart());
        $summaries = array_map( function($transaction){
            return new Summary( $transaction[0], $transaction[1]);
        } , $transactionsInPeriod );
        return new Response( 0, $summaries );
    }

}