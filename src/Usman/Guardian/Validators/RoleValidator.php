<?php namespace Usman\Guardian\Validators;

class RoleValidator extends BaseValidator {

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