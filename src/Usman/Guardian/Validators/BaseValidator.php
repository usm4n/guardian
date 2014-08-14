<?php namespace Usman\Guardian\Validators;

use Illuminate\Validation\Factory;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Validators\Interfaces\BaseValidatorInterface;

abstract class BaseValidator implements BaseValidatorInterface {

	protected $fields;

	protected $rules;

	protected $validator;

	public function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}

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

	public function setFields(array $fields)
	{
		$this->fields = $fields;
		return $this;
	}

	public function addRule($type, $field, $rule)
	{
		$this->rules[$type][$field] = $rule;
	}

}