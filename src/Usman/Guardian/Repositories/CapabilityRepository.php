<?php namespace Usman\Guardian\Repositories;

use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface;

class CapabilityRepository extends BaseRepository implements CapabilityRepositoryInterface {
    
    /**
     * Creates a new record in storage
     * 
     * @param  array  $data 
     * @return mixed    
     */
    public function create(array $fields)
    {   
        $this->fillCapabilityData($fields);
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
        $this->fillCapabilityData($fields);
        return $this->model->save();
    }

    /**
     * fills the capability model data
     * 
     * @param  array  $data 
     * 
     * @return void       
     */
    private function fillCapabilityData(array $data)
    {
		$this->model->capability  = (!empty($data['capability'])) ? $data['capability'] : $this->model->capability;
		$this->model->description = (!empty($data['description'])) ? $data['description'] : $this->model->description;
        
    }
}