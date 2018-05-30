<?php
	use PHPUnit\Framework\TestCase;

	final class empleadotest extends TestCase{
		public function testvalidar(){
			$emp=new empleado();
			$this->assertEquals(1,$emp->validar(1)); 
		}
	}
?>