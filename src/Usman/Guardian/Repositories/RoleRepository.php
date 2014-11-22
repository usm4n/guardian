<?php namespace Usman\Guardian\Repositories;

use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface {

    /**
     * fills the role model data
     * 
     * @param  array  $data
     * @return void       
     */
    protected function fillData(array $data)
    {
		$this->model->role_name   = (!empty($data['role_name'])) ? ucfirst($data['role_name']) : $this->model->role_name;
		$this->model->description = (!empty($data['description'])) ? $data['description'] : $this->model->description;  
    }

}