<?php
namespace TransactionReport;

require_once "Request.php";
require_once "Response.php";
require_once "TransactionStore.php";

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
        return new Response( 0, [] );
    }

}