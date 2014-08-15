<?php namespace Usman\Guardian\Repositories;

use Usman\Guardian\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface {

    /**
     * Creates a new record in storage
     * 
     * @param  array  $data 
     * @return mixed    
     */
    public function create(array $fields)
    {   
        $this->fillRoleData($fields);
        return $this->model->save() ? $this->model->id : false;
    }

    /**
     * Updates a record in storage
     * 
     * @param  int $id   
     * @param  array  $data 
     * @return bool       
     */
    public function update($id, array $fields)
    {   
        //caching the updated model
        $this->model = $this->findById($id);
        $this->fillRoleData($fields);
        return $this->model->save($fields);
    }
    /**
     * fills the role model data
     * 
     * @param  array  $data 
     * 
     * @return void       
     */
    private function fillRoleData(array $data)
    {
		$this->model->role_name   = (!empty($data['role_name'])) ? ucfirst($data['role_name']) : $this->model->role_name;
		$this->model->description = (!empty($data['description'])) ? $data['description'] : $this->model->description;
        
    }

}