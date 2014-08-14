<?php namespace Usman\Guardian\Validators;

class CapabilityValidator extends BaseValidator {

    protected $rules = [
        'create' => [
            'capability' => 'required|alpha_dash|unique:capabilities,capability',
            'description' => 'regex:/^[a-zA-Z ]+$/'
        ],
        'update' => [
            'description' => 'regex:/^[a-zA-Z ]+$/' 
        ]
    ];
}