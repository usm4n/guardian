<?php namespace Usman\Guardian\Repositories;

use Usman\Guardian\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
	
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

}