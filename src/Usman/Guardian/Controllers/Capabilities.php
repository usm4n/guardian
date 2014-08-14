<?php namespace Usman\Guardian\Controllers;

use View;
use Input;
use Redirect;
use Usman\Guardian\Validators\CapabilityValidator;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface;

class Capabilities extends Base {

    protected $capability;

    protected $validator;

    public function __construct(CapabilityRepositoryInterface $capability, CapabilityValidator $validator)
    {
        $this->capability = $capability;
        $this->validator = $validator;
    }

    public function listCapability()
    {
        $capabilities = $this->capability->getByPageWith('roles');
        $this->layout->main = View::make('guardian::partials.capability.list')->with('capabilities',$capabilities);
    }

    public function addCapability()
    {
        $this->layout->main = View::make('guardian::partials.capability.add');

    }

    public function createCapability()
    {   
        try
        {
            $this->validator->setFields(Input::all())->validate('create');
            $id = $this->capability->create(Input::all());
            if(Input::has('roles'))
            {
                $this->capability->attach($id,Input::get('roles'),'roles');
            }
            return Redirect::back()->withSuccess('Capability Created Successfully!');
        }
        catch(ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }
    }

    public function editCapability($id)
    {
        $capability = $this->capability->findByIdWith($id,'roles');
        $this->layout->main = View::make('guardian::partials.capability.edit')->with('capability',$capability);
    }

    public function updateCapability($id)
    {
        try
        {
            $this->validator->addRule('update','capability','required|alpha_dash|unique:capabilities,capability,'.$id);
            $this->validator->setFields(Input::all())->validate('update');
            $this->capability->update($id,Input::all());
            $this->capability->attach($id,Input::get('roles',[]),'roles');
            return Redirect::route('capability.list',Input::get('ref'))->withSuccess('Capability Updated Successfully!');
        }
        catch(ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }
    }

    public function deleteCapability($id)
    {
        $this->capability->deleteWith($id,['roles']);
        return Redirect::back()->withSuccess('Deleted Successfully!');
    }
    
}