<?php namespace Usman\Guardian\Validators;

class RoleValidator extends BaseValidator {

	/**
	 * Rules for role validation.
	 * 
	 * @var array
	 */
    protected $rules = [
        'create' => [
            'role_name'   => 'required|alpha|unique:roles,role_name',
            'description' => 'regex:/^[a-zA-Z ]+$/'
        ],
        'update' => [
            'description' => 'regex:/^[a-zA-Z ]+$/' 
        ]
    ];
}