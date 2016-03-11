<?php
class User {
	var $id;
	var $name;
	var $phone;
	var $email;
	var $address;
	var $password;
	var $sex;
	var $age;
	var $code;
	var $createdate;
	var $updatedate;
	var $dr;
	function setId($id) {
		$this->id = $id;
	}
	function setName($name) {
		$this->name = $name;
	}
	function setPhone($phone) {
		$this->phone = $phone;
	}
	function setEmail($email) {
		$this->email = $email;
	}
	function setAddress($address) {
		$this->address = $address;
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function setSex($sex) {
		$this->sex = $sex;
	}
	function setAge($age) {
		$this->age = $age;
	}
	function setCode($code) {
		$this->code = $code;
	}
	function setCreatedate($createdate) {
		$this->createdate = $createdate;
	}
	function setUpdatedate($updatedate) {
		$this->updatedate = $updatedate;
	}
	function setDr($dr) {
		$this->dr = $dr;
	}
	function getId() {
		return $this->id;
	}
	function getName() {
		return $this->name;
	}
	function getPhone() {
		return $this->phone;
	}
	function getEmail() {
		return $this->email;
	}
	function getAddress() {
		return $this->address;
	}
	function getPassword() {
		return $this->password;
	}
	function getSex() {
		return $this->sex;
	}
	function getAge() {
		return $this->age;
	}
	function getCode() {
		return $this->code;
	}
	function getCreatedate() {
		return $this->createdate;
	}
	function getUpdatedate() {
		return $this->updatedate;
	}
	function getDr() {
		return $this->dr;
	}
}
function setUser($user) {
	$userw = new User ();
	$userw->setId ( $user->id );
	$userw->setName ( $user->name );
	$userw->setPhone ( $user->phone );
	$userw->setEmail ( $user->email );
	$userw->setAddress ( $user->address );
	$userw->setPassword ( $user->password );
	$userw->setSex ( $user->sex );
	$userw->setAge ( $user->age );
	$userw->setCode ( $user->code );
	$userw->setCreatedate ( $user->createdate );
	$userw->setUpdatedate ( $user->updatedate );
	$userw->setDr ( $user->dr );
	return $userw;
}
?>