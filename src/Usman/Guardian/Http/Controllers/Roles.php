<?php namespace Usman\Guardian\Http\Controllers;

use View;
use Input;
use Redirect;
use Usman\Guardian\Validators\RoleValidator;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface;

class Roles extends Base {

    /**
     * The role repository instance.
     * 
     * @var Usman\Guardian\Repositories\RoleRepository
     */
    protected $role;

    /**
     * The validator instance.
     * 
     * @var RoleValidator
     */
    protected $validator;

    /**
     * Creates a new instance of the Roles controller.
     * 
     * @param RoleRepositoryInterface $role
     * @param RoleValidator           $validator
     */
    public function __construct(RoleRepositoryInterface $role, RoleValidator $validator)
    {
        $this->role = $role;
        $this->validator = $validator;
    }

    /**
     * Shows an index of the roles.
     * 
     * @return Response
     */
    public function listRole()
    {
        $roles = $this->role->getByPageWith('capabilities');
        return View::make('guardian::partials.role.list')->with('roles',$roles);
    }

    /**
     * Shows the add role form.
     *
     * @return  Response
     */
    public function addRole()
    {
        return View::make('guardian::partials.role.add');
    }

    /**
     * Saves the new role in the database.
     * 
     * @return Response
     */
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

    /**
     * Shows the edit role form.
     * 
     * @param int $id
     * @return Response
     */
    public function editRole($id)
    {
        $role = $this->role->findByIdWith($id,'capabilities');
        return View::make('guardian::partials.role.edit')->with('role',$role);
    }

    /**
     * Updates the role record in the database.
     * 
     * @param  int $id
     * @return Response
     */
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

    /**
     * Deletes a role from the database.
     * 
     * @param int $id   
     * @return Response
     */
    public function deleteRole($id)
    {
        $this->role->deleteWith($id,['users','capabilities']);
        return Redirect::back()->withSuccess('Deleted Successfully!');
        
    }

} 