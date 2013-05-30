<?php

class Dummy
{
	const DEFAULT_VALUE = 12;
	private static $numInstances = 0;
	public $name; //Really bad pracice!!
	private $value;

	public function Dummy()
	{
		$this->value = self::DEFAULT_VALUE;
		self::$numInstances++;
	}

	public function doSomething()
	{
		echo "<p>I do stuff!</p>";
	}

	private function doNothing()
	{
		echo "<p>I am a chicken!</p>";
	}

	public static function getNumInstances()
	{
		return self::$numInstances;
	}

	public function stopWorking()
	{
		$this->doNothing();
	}

	public function __destruct()
	{
		self::$numInstances--;
		echo "<pre>I'm dying!! Oh, what a world!!! Remember me always as $this->name</pre>";
		echo "<pre>I have ".self::$numInstances." other friends left.</pre>";
	}
}