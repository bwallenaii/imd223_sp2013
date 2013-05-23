<?php

class Employee
{
	private static $employees = array();
	private $_firstName;
	private $_lastName;
	private $_jobTitle;
	private $_salary;
	
	public function Employee($name = "", $job = "", $salary = 0)
	{
		!empty($name) ? $this->setName($name):null;
		!empty($job) ? $this->setJob($job):null;
		!empty($salary) ? $this->setSalary($salary):null;
		
		self::$employees[] = $this;
	}
	
	public static function getAll()
	{
		return self::$employees;
	}
	
	public function setFirstName($name)
	{
		$this->_firstName = ucwords($name);
	}
	
	public function getFirstName()
	{
		return $this->_firstName;
	}
	
	public function setLastName($name)
	{
		$this->_lastName = ucwords($name);
	}
	
	public function getLastName()
	{
		return $this->_lastName;
	}
	
	public function setJob($name)
	{
		$this->_jobTitle = ucwords($name);
	}
	
	public function getJob()
	{
		return $this->_jobTitle;
	}
	
	public function setSalary($salary)
	{
		$this->_salary = $salary;
	}
	
	public function getSalary()
	{
		return $this->_salary;
	}
	
	public function getSalaryNice()
	{
		setlocale(LC_MONETARY, 'en_US');
		return money_format("%n", $this->_salary);
	}
	
	public function setName($name)
	{
		$nameParts = explode(" ", $name);
		$lastName = array_pop($nameParts);
		$firstName = implode(" ", $nameParts);
		$this->setFirstName($firstName);
		$this->setLastName($lastName);
	}
	
	public function getName()
	{
		return $this->getFirstName()." ".$this->getLastName();
	}
	
	
	public function __get($key)
	{
		/**
		 * Set each individual getter using a switch
		 */
		/*switch($key)
		{
			case "firstName":
				return $this->getFirstName();
			break;
			case "lastName":
				return $this->getLastName();
			break;
			case "name":
				return $this->getName();
			break;
			case "job":
				return $this->getJob();
			break;
			case "salary":
				return $this->getSalary();
			break;
			case "salaryNice":
				return $this->getSalaryNice();
			break;
			default:
				//----default __get usage----
				//return $this->$key;
				//----No, sir, we don't have that----
				throw new Exception("$key is not available on this object.");
			break;
		}*/
		/**
		 * Shorthand checker -- will call get<$key> if there is one
		 */
		$funcName = "get".ucfirst($key);
		if(method_exists("Employee", $funcName))
		{
			return $this->$funcName();
		}
		else
		{
			throw new Exception("$key is not available on this object.");
		}
	}
	
	
	public function __set($key, $val)
	{
		/**
		 * Set each individual setter with a switch
		 */
		/*switch($key)
		{
			case "firstName":
				$this->setFirstName($val);
			break;
			case "lastName":
				$this->setLastName($val);
			break;
			case "name":
				$this->setName($val);
			break;
			case "job":
				$this->setJob($val);
			break;
			case "salary":
				$this->setSalary($val);
			break;
			default:
				//----keep default for set----
				//$this->$key = $val;
				//----No, sir, we don't have that----
				throw new Exception("$key is not available on this object.");
			break;
		}*/
		/**
		 * Shorthand checker -- will call set<$key> if there is one
		 */
		$funcName = "set".ucfirst($key);
		if(method_exists("Employee", $funcName))
		{
			return $this->$funcName($val);
		}
		else
		{
			throw new Exception("$key is not available on this object.");
		}
	}
	
	/**
	 * __toString() gets called when the object is printed.
	 */
	public function __toString()
	{
		return "$this->name makes $this->salaryNice as a $this->job.";
	}
}












