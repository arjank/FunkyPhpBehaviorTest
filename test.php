<?php
ob_start();

class Foo {
	protected function __construct() {
		echo('Constructing ' . get_called_class());
	}

	protected function test() {
		echo('Hello world ' . __METHOD__);
	}
}

class A extends Foo {
	public function __construct() {
		parent::__construct();
	}

	public function testB() {
		$b = new B();
		$b->test();
	}
}

class B extends Foo {

}

$a = new A();
$a->testB();

$contents = ob_get_clean();

exit(($contents === 'Constructing AConstructing BHello world Foo::test') ? 0 : 1);

#EOF