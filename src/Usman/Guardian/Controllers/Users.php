<?php namespace Usman\Guardian\Controllers;

use View;
use Input;
use Redirect;
use Request;
use Usman\Guardian\Validators\UserValidator;
use Usman\Guardian\Validators\Exceptions\ValidationException;
use Usman\Guardian\Repositories\Interfaces\UserRepositoryInterface;

class Users extends Base {

    /**
     * The repository instance
     * 
     * @var Usman\Guardian\Repositories\UserRepository
     */
    protected $user;

    /**
     * The validator instance
     * 
     * @var Usman\Guardian\Validators\UserValidator
     */
    protected $validator;

    /**
     * Creates a new User controller
     * 
     * @param UserRepositoryInterface $user      
     * @param UserValidator           $validator 
     */
    public function __construct(UserRepositoryInterface $user, UserValidator $validator)
    {
        $this->user = $user;
        $this->validator = $validator;
    }

    //GET /guardian/backend/user/list
    public function listUser()
    { 
        //we will check if a form is submitted with either 
        //a role name or a username as a search term.
        if(Input::has('role') or Input::has('username'))
        {  
            extract(Input::only(['role','username']));
            $users = $this->user->searchUserByRole($username,$role);
            $users->appends(compact('role','username'));
            $this->layout->main = View::make('guardian::partials.user.list')->with('users',$users);
        }//otherwise we will display the default users list
        else
        {
            $users = $this->user->getByPageWith('roles');
            $this->layout->main = View::make('guardian::partials.user.list',compact('users'));
        }
    }

    //GET /guardian/backend/user/add
    public function addUser()
    {   
        $this->layout->main = View::make('guardian::partials.user.add');
    }

    //POST /guardian/backend/user/create
    public function createUser()
    {
        try 
        {
            $this->validator->setFields(Input::all())->validate('create');
            $id = $this->user->create(Input::all());
            if(Input::has('roles'))
            {
                $this->user->attach($id, Input::get('roles'),'roles');
            }
            return Redirect::back()->withSuccess('User Created Successfully');
        }
        catch (ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }
        
    }

    //GET /guardian/backend/user/edit/{id}
    public function editUser($id)
    {
        $user = $this->user->findByIdWith($id,'roles');
        $this->layout->main = View::make('guardian::partials.user.edit')->with('user',$user);
    }
    
    //POST /guardian/backend/user/update/{id}
    public function updateUser($id)
    {
        try
        {
            $this->validator->addRule('update','username','required|alpha_num|unique:users,username,'.$id);
            $this->validator->setFields(Input::all())->validate('update');
            //we will check if a password is supplied otherwise we will exclude the password field from input.
            $this->user->update($id, Input::all());
            $this->user->attach($id, Input::get('roles',[]),'roles');
            return Redirect::route('user.list',Input::get('ref'))->withSuccess('User Updated Successfully');
        }
        catch(ValidationException $e)
        {
            $errors = $e->getValidationErrors();
            return Redirect::back()->withErrors($errors)->withInput();
        }

    }

    //GET /guardian/backend/user/delete/{id}
    public function deleteUser($id)
    {
        $this->user->deleteWith($id,['roles']);
        return Redirect::back()->withSuccess('Deleted Successfully!');
    }

}