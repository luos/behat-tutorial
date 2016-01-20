<?php
namespace TransactionReport;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class TransactionReportContext implements Context
{

    /**
     * @Then /^I should see a report with ([\d]*) lines$/
     */
    public function iShouldSeeAReportWithLines($lineCount)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I run the report for "2016\-01\-01" to "2016\-01\-31"$/
     */
    public function iRunTheReportForTo($arg1, $arg2)
    {
        throw new PendingException();
    }
}