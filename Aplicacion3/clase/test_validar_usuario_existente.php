<?php
	use PHPUnit\Framework\TestCase;

	final class usuarioexisttest extends TestCase{
		public function testvalidar(){
			$emp=new usuarioexist();
			$this->assertEquals(1,$emp->existe("karla")); 
		}
	}
?>