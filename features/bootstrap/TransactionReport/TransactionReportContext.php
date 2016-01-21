<?php
namespace TransactionReport;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;

require_once __DIR__."/../../../src/TransactionReport/TransactionReport.php";

class TransactionReportContext implements Context
{
    /**
     * @var Response
     */
    private $report;
    /**
     * @var TransactionStore
     */
    private $transactions;

    /**
     * @beforeScenario
     */
    public function setUp(){
        $this->transactions = new TransactionStore();
    }

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
        $report = new \TransactionReport\TransactionReport( $this->transactions );
        $this->report = $report->execute( new Request( $start, $end ) );
    }

    /**
     * This will be our little assert function as I don't want to include any other dependency
     * Behat just needs an exception thrown if your assertion failed
     */
    private function assertEquals( $expected, $actual , $message = '' ){
        if ( $expected != $actual ){
            throw new \Exception("$message \n Failed asserting that $expected == $actual .");
        }
    }

    /**
     * @Given /^I should see "([^"]*)" with sum of "([^"]*)"$/
     */
    public function iShouldSeeWithSumOf($name, $expectedSum )
    {
        foreach( $this->report->getSummaries() as $summary ){
            if ( $summary->getName() === $name ) {
                $this->assertEquals( $expectedSum, $summary->getSum() );
                return;
            }
        }
        $this->assertEquals( true, false, "No entity named $name found on report" );
    }

    /**
     * @Given /^I made a transaction on "([^"]*)" for "([^"]*)" from "([^"]*)"$/
     */
    public function iMadeATransactionOnForFrom($dateStr, $value, $name)
    {
        $this->transactions->addTransaction( $name, $value, new \DateTimeImmutable( $dateStr ) );
    }


    /**
     * @Given /^I made a transactions:$/
     */
    public function iMadeATransactions(TableNode $table)
    {
        foreach( $table as $row ){
            $this->iMadeATransactionOnForFrom( $row['date'], $row['amount'], $row['name']);
        }
    }

    /**
     * @Then /^The report should look like:$/
     */
    public function iReportShouldLookLike(TableNode $table)
    {
        foreach( $table as $row ){
            $this->iShouldSeeWithSumOf( $row['name'], $row['sum']);
        }

        $this->assertEquals( count( $table->getIterator() ), count( $this->report->getSummaries() ) );
    }
}