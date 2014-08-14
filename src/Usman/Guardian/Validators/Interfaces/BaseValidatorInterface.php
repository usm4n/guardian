<?php namespace Usman\Guardian\Validators\Interfaces;

interface BaseValidatorInterface {

	public function validate($type);
	
	public function setFields(array $fields);

	public function addRule($type, $field, $rule);

}