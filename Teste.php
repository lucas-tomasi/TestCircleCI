<?php

require_once 'Functions.class.php';

use PHPUnit\Framework\TestCase;

class Teste extends TestCase
{
	
	public function testeSoma()
	{
		return $this->assertEquals(Functions::sum(1,1), 2);
	}

	public function testeSoma2()
	{
		return $this->assertEquals(Functions::sum(10,1), 11);
	}
}