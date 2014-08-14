<?php namespace Usman\Guardian\Controllers;

use View;
use Input;
use Redirect;
use Usman\Guardian\Validators\RoleValidator;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface;

class Roles extends Base {

    protected $role;

    protected $validator;

    public function __construct(RoleRepositoryInterface $role, RoleValidator $validator)
    {
        $this->role = $role;
        $this->validator = $validator;
    }

    public function listRole()
    {
        $roles = $this->role->getByPageWith('capabilities');
        $this->layout->main = View::make('guardian::partials.role.list')->with('roles',$roles);
    }

    public function addRole()
    {
        $this->layout->main = View::make('guardian::partials.role.add');
    }

    public function createRole()
    {
        try
        {
            $this->validator->setFields(Input::all())->validate('create');
            $id = $this->role->create(Input::all());
            if(Input::has('capabilities'))
            {
                $this->role->attach($id,Input::get('capabilities'),'capabilities');
            }       
            return Redirect::back()->withSuccess('Role Added Successfully!');
        }
        catch(ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }
    }

    public function editRole($id)
    {
        $role = $this->role->findByIdWith($id,'capabilities');
        $this->layout->main = View::make('guardian::partials.role.edit')->with('role',$role);
    }

    public function updateRole($id)
    {
        try
        {
            $this->validator->addRule('update','role_name','required|alpha|unique:roles,role_name,'.$id);
            $this->validator->setFields(Input::all())->validate('update');
            $this->role->update($id,Input::all());
            $this->role->attach($id,Input::get('capabilities',[]),'capabilities');
            return Redirect::route('role.list',Input::get('ref'))->withSuccess('Role Updated Successfully!');
        }
        catch(ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }
    }

    public function deleteRole($id)
    {
        $this->role->deleteWith($id,['users','capabilities']);
        return Redirect::back()->withSuccess('Deleted Successfully!');
        
    }

} 