<?php
class user {
	var $id;
	var $name;
	var $age;
	var $address;
	var $sex;
	var $passwrod;
	function setPassword($password) {
		$this->passwrod = $password;
	}
	function setId($id) {
		$this->id = $id;
	}
	function setName($name) {
		$this->name = $name;
	}
	function setAge($age) {
		$this->age = $age;
	}
	function setAddress($address) {
		$this->address = $address;
	}
	function setSex($age) {
		$this->sex = $age;
	}
	function getPassword($password) {
		return $this->passwrod;
	}
	function getId() {
		return $this->id;
	}
	function getName() {
		return $this->name;
	}
	function getAge() {
		return $this->age;
	}
	function getAddress() {
		return $this->address;
	}
	function getSex() {
		return $this->sex;
	}
}
?>