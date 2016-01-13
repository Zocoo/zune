<?php
class person {
	var $name;
	var $sex;
	var $age;
	function setName($name) {
		$this->name = $name;
	}
	function getName() {
		return $this->name;
	}
	function say() {
		echo "my nane is:" . $this->name . "sex is:" . $this->sex . "age is:" . $this->age . "<br>";
	}
	function run() {
		echo $this->name . "this person on stree";
	}
	function __destruct() {
		echo "goodbye" . $this->name . "<br>";
	}
}
$p1 = new person ();
$p2 = new person ( "猪", "woman", 30 );
$p1->setName ( "猪" );
// $p3 = new person ( "sunfolwer", "man", 25 );
$p1->say ();
?>
