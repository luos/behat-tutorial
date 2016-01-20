<?php
namespace TransactionReport;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

require_once __DIR__."/../../../src/TransactionReport/TransactionReport.php";

class TransactionReportContext implements Context
{
    /**
     * @var Response
     */
    private $report;

    /**
     * @Then /^I should see a report with ([\d]*) lines$/
     */
    public function iShouldSeeAReportWithLines($lineCount)
    {
        $this->assertEquals( $lineCount, count( $this->report->getSummaries() ) );
    }

    /**
     * @Given /^I run the report for "([\d-]*)" to "([\d-]*)"$/
     */
    public function iRunTheReportForTo($periodStartStr, $periodEndStr)
    {
        $start = new \DateTimeImmutable( $periodStartStr );
        $end = new \DateTimeImmutable( $periodEndStr );
        $report = new \TransactionReport\TransactionReport();
        $this->report = $report->execute( new Request( $start, $end ) );
    }

    /**
     * This will be our little assert function as I don't want to include any other dependency
     * Behat just needs an exception thrown if your assertion failed
     */
    private function assertEquals( $expected, $actual , $message = '' ){
        if ( $expected != $actual ){
            throw new \Exception("Failed asserting that $expected == $actual .");
        }
    }
}