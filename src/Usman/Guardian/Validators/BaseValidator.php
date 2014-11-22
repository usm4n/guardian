<?php namespace Usman\Guardian\Validators;

use Illuminate\Validation\Factory;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Validators\Interfaces\BaseValidatorInterface;

abstract class BaseValidator implements BaseValidatorInterface {

    /**
     * Represents the data to be validated.
     * 
     * @var array
     */
    protected $fields;

    /**
     * Rules for data validation
     * 
     * @var array
     */
    protected $rules;

    /**
     * The validator instance.
     * 
     * @var Factory
     */
    protected $validator;

    /**
     * Creates an instance of the class.
     * 
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validates the data.
     * 
     * @param  string $type type of validation create/update.
     * @throws ValidationException
     * @return boolean
     */
    public function validate($type)
    {
        $v = $this->validator->make($this->fields,$this->rules[$type]);
        
        if($v->fails())
        {
            throw new ValidationException($v->errors());
        }
        else
        {
            return true;
        }
    }

    /**
     * Sets the fields to be validated.
     * 
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * Adds additional rules for data validation.
     * 
     * @param string $type
     * @param string $field
     * @param string $rule
     */
    public function addRule($type, $field, $rule)
    {
        $this->rules[$type][$field] = $rule;
    }

}