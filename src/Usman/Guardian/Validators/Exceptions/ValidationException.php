<?php namespace Usman\Guardian\Validators\Exceptions;

use Exception;

class ValidationException extends Exception {

	protected $validationErrors;

	public function __construct($errors)
	{
		$this->validationErrors = $errors;
	}

	public function getValidationErrors()
	{
		return $this->validationErrors;
	}
}