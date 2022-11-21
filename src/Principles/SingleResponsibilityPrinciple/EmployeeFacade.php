<?php

class EmployeeFacade implements EmployeeFacadeInterface
{
    /**
     * @var PayCalculator
     */
    private $payCalculator;
    /**
     * @var HourReporter
     */
    private $hourReporter;
    /**
     * @var EmployeeSaver
     */
    private $employeeSaver;

    public function __construct(PayCalculator $payCalculator, HourReporter $hourReporter, EmployeeSaver $employeeSaver)
    {
        $this->payCalculator = $payCalculator;
        $this->hourReporter = $hourReporter;
        $this->employeeSaver = $employeeSaver;
    }

    public function calculate($data)
    {
        $hours = $this->hourReporter->reportHours($data);
        $pay = $this->payCalculator->calculatePay($hours);
        $this->employeeSaver->saveEmployee($pay);
    }


}