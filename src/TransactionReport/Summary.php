<?php
/**
 * Created by PhpStorm.
 * User: luos
 * Date: 2016.01.20.
 * Time: 23:45
 */

namespace TransactionReport;


class Summary
{

    /** @var  string */
    private $name;
    /** @var float */
    private $sum;

    /**
     * Summary constructor.
     * @param string $name
     * @param float $sum
     */
    public function __construct($name, $sum)
    {
        $this->name = $name;
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }



}