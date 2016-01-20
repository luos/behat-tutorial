<?php
namespace TransactionReport;

require_once "Request.php";
require_once "Response.php";

class TransactionReport
{
    public function execute(Request $request){
        return new Response( 0, [] );
    }

}