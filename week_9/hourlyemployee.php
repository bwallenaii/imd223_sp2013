<?php
require_once("employee.php");

class HourlyEmployee extends Employee
{
    const HOURS_PER_YEAR = 2080;
    private $_hourlyRate;
    private $inTime;
    private $outTime;
    private $timeToday = 0;
    
    public function setSalary($salary)
    {
        if($salary < 1000)
        {
            $this->_hourlyRate = $salary;
            parent::setSalary($salary * self::HOURS_PER_YEAR);
        }
        else
        {
            $this->_hourlyRate = $salary / self::HOURS_PER_YEAR;
            parent::setSalary($salary);
        }
    }
    
    public function clockIn()
    {
        $this->inTime = time();
    }
    
    public function clockOut()
    {
        if(!empty($this->inTime))
        {
            $this->outTime = time();
            $this->timeToday += $this->outTime - $this->inTime;
            $this->inTime = 0;
        }
    }
    
    public function getTodaysPay()
    {
        $hours = $this->timeToday / (60 * 60);
        $pay = $hours * $this->_hourlyRate;
        return $pay;
    }
}







