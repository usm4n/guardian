<?php namespace Usman\Guardian\Validators;

class UserValidator extends BaseValidator {

    protected $rules = [
        'create' => [
            'username' => 'required|alpha_num|unique:users,username',
            'password' => 'required|between:8,20|confirmed',
            'email'    => 'required|email',
            'roles'    => 'array|exists:roles,id',
            'active'   => 'in:1,0'
        ],
        'update' => [
            'password' => 'between:8,20|confirmed',
            'email'    => 'required|email',
            'roles'    => 'array|exists:roles,id',
            'active'   => 'in:1,0'
        ]
    ];
}