<?php namespace Usman\Guardian\Repositories;

use Usman\Guardian\Repositories\Interfaces\CapabilityRepositoryInterface;

class CapabilityRepository extends BaseRepository implements CapabilityRepositoryInterface {
    
    /**
     * fills the capability model data
     * 
     * @param  array  $data
     * @return void       
     */
    protected function fillData(array $data)
    {
		$this->model->capability  = (!empty($data['capability'])) ? $data['capability'] : $this->model->capability;
		$this->model->description = (!empty($data['description'])) ? $data['description'] : $this->model->description;
        
    }
}