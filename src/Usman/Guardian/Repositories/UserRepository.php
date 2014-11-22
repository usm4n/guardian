<?php namespace Usman\Guardian\Repositories;

use Hash;
use Usman\Guardian\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
       
    /**
     * Searches the database for a username with a specific role
     * 
     * @param  string $username username to search
     * @param  string $role     role for the user to search
     * @param  int $perPage  records per page
     * @return Illuminate\Pagination\paginator the paginator instance.
     */
    public function searchUserByRole($username, $role, $perPage = self::PAGE)
    {
        
        $query = $this->model->query();
        
        if( ! empty($username))
        {
            $query->where('username','LIKE','%'.$username.'%');
        }

        if( ! empty($role))
        {
            $query->whereHas('roles',function($query) use ($role)
            {
                $query->where('role_name','=',$role);
            });
        }

        return $query->with('roles')->paginate($perPage);
    }

    /**
     * fills the user model data
     * 
     * @param  array  $data
     * @return void       
     */
    protected function fillData(array $data)
    {
        $this->model->username = (!empty($data['username'])) ? $data['username'] : $this->model->username;
        $this->model->password = (!empty($data['password'])) ? Hash::make($data['password']) : $this->model->password;
        $this->model->email    = (!empty($data['email'])) ? $data['email'] : $this->model->email;
        $this->model->active   = $data['active'];
    }
}