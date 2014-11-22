<?php namespace Usman\Guardian\Http\Controllers;

use View;
use Input;
use Redirect;
use Usman\Guardian\Validators\CapabilityValidator;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface;

class Capabilities extends Base {

    /**
     * The repository instance
     * 
     * @var Usman\Guardian\Repositories\CapabilityRepository
     */
    protected $capability;

    /**
     * The validator instance
     * 
     * @var Usman\Guardian\Validators\CapabilityValidator
     */
    protected $validator;

    /**
     * Creates a new instance of Capabilities controller.
     * 
     * @param CapabilityRepositoryInterface $capability
     * @param CapabilityValidator           $validator
     */
    public function __construct(CapabilityRepositoryInterface $capability, CapabilityValidator $validator)
    {
        $this->capability = $capability;
        $this->validator = $validator;
    }

    /**
     * Shows the index of capabilities.
     * 
     * @return Response
     */
    public function listCapability()
    {
        $capabilities = $this->capability->getByPageWith('roles');
        return View::make('guardian::partials.capability.list')->with('capabilities',$capabilities);
    }

    /**
     * Shows the new capability form.
     *
     * @return  Response
     */
    public function addCapability()
    {
        return View::make('guardian::partials.capability.add');

    }

    /**
     * Saves the newly created capability.
     * 
     * @return Response
     */
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

    /**
     * Shows the edit capability form.
     * 
     * @param  int $id
     * @return Response
     */
    public function editCapability($id)
    {
        $capability = $this->capability->findByIdWith($id,'roles');
        return View::make('guardian::partials.capability.edit')->with('capability',$capability);
    }

    /**
     * Updates the capability in database.
     * 
     * @param  int $id
     * @return Response
     */
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

    /**
     * Deletes a capability from database.
     * 
     * @param  int $id
     * @return Response
     */
    public function deleteCapability($id)
    {
        $this->capability->deleteWith($id,['roles']);
        return Redirect::back()->withSuccess('Deleted Successfully!');
    }
    
}