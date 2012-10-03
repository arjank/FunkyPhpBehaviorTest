<?php
error_reporting(E_ALL);

ob_start();

class Foo {
	protected function __construct() {
		echo('Constructing ');
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

class Bar extends Foo {
	protected function test() {
		echo 'Just hello world';
	}
}

class B extends Bar {

}

$a = new A();
$a->testB();

$contents = ob_get_clean();

exit(($contents === 'Constructing Constructing Just hello world') ? 0 : 1);

#EOF
