<?php namespace Usman\Guardian\Repositories;

use Illuminate\Database\Eloquent\Model;
use Usman\Guardian\Repositories\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface {

    const PAGE = 20;

    /**
     * The Model Instance
     * 
     * @var Model
     */
    protected $model;

    /**
     * Creates a new repository
     * 
     * @param Illuminate\Database\Eloquent\Model $model 
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Finds a single record by given id.
     * 
     * @param  int $id 
     * @return Illuminate\Database\Eloquent\Model     
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Retrieves a single record from storage with related records
     * 
     * @param  int $id      
     * @param  string $related
     * @return Illuminate\Database\Eloquent\Model          
     */
    public function findByIdWith($id, $related)
    {
        return $this->model->with($related)->findOrFail($id);
    }

    /**
     * Retrieves a single page of records with related records
     * 
     * @param  string $related 
     * @param  int $perPage
     * @return Illuminate\Pagination\Paginator an instance of paginator.          
     */
    public function getbyPageWith($related, $perPage = self::PAGE)
    {
        return $this->model->with($related)->paginate($perPage);
    }

    /**
     * Retrieves all records from storage
     * 
     * @param  array $col
     * @return Illuminate\Support\Collection      
     */
    public function getAll($col = ['*'])
    {
        return $this->model->get($col);
    }

    /**
     * Template method for creating a record in storage
     * 
     * @param  array  $fields
     * @return mixed    
     */
    public function create(array $fields)
    {   
        $this->fillData($fields);
        return $this->model->save() ? $this->model->id : false;
    }

    /**
     * Template method for updating a record in storage
     * 
     * @param  int $id   
     * @param  array  $fields
     * @return bool       
     */
    public function update($id, array $fields)
    {   
        //caching the updated model
        $this->model = $this->findById($id);
        $this->fillData($fields);
        return $this->model->save($fields);
    }

    /**
     * Deletes a record from storage
     * 
     * @param  int $id
     * @return bool     
     */
    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    /**
     * Deletes a record and its related records.
     * 
     * @param  int $id
     * @param  array $method methods that define the relation
     * @return bool
     */
    public function deleteWith($id, array $methods)
    {
        $model = $this->findById($id);

        foreach($methods as $method)
        {
            $model->{$method}()->detach();
        }
        
        return $model->delete();
    }

    /**
     * Attaches the related ids in pivot table
     * 
     * @param  ind $id     
     * @param  array $ids    
     * @param  string $method Name of the method that defines the relation
     * @return void         
     */
    public function attach($id, array $ids = [], $method)
    {
        //checking if this id is set on a recently updated or created model.
        if($this->model->id == $id)
        { 
            $this->model->{$method}()->withTimeStamps()->sync($ids);
        }
        else
        {
            $this->findById($id)->{$method}()->withTimeStamps()->sync($ids);
        }
    }

    /**
     * Fills the model attributes.
     * 
     * @param  array  $data
     * @return void
     */
    abstract protected function fillData(array $data);

}