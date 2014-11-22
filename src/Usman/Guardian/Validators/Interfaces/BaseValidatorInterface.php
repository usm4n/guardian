<?php namespace Usman\Guardian\Validators\Interfaces;

interface BaseValidatorInterface {

	/**
	* Validates the data.
	* 
	* @param  string $type type of validation create/update.
	* @throws ValidationException
	* @return boolean
	*/
    public function validate($type);
    
    /**
    * Sets the fields to be validated.
    * 
    * @param array $fields
    */
    public function setFields(array $fields);

    /**
     * Adds additional rules for data validation.
     * 
     * @param string $type
     * @param string $field
     * @param string $rule
     */    
    public function addRule($type, $field, $rule);

}