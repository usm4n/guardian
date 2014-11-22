<?php namespace Usman\Guardian\Validators\Exceptions;

use Exception;

class ValidationException extends Exception {

	/**
	 * Validation errors.
	 * 
	 * @var \Illuminate\Support\MessageBag
	 */
    protected $validationErrors;

    /**
     * Creates an instance of the class.
     * 
     * @param \Illuminate\Support\MessageBag
     */
    public function __construct($errors)
    {
        $this->validationErrors = $errors;
    }

    /**
     * Gets the validation errors.
     * 
     * @return \Illuminate\Support\MessageBag
     */
    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}