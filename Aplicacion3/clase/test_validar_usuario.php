<?php
	use PHPUnit\Framework\TestCase;

	final class usuariotest extends TestCase{
		public function testvalidar(){
			$usu=new usuario();
			$this->assertEquals(1,$usu->validar("karla",123)); 
		}
	}
?>