<?php namespace Usman\Guardian\Repositories\Interfaces;

interface BaseRepositoryInterface {

	/**
     * Finds a single record by given id.
     * 
     * @param  int $id 
     * @return Illuminate\Database\Eloquent\Model     
     */
    public function findById($id);

    /**
     * Retrieves a single record from storage with related records
     * 
     * @param  int $id      
     * @param  string $related
     * @return Illuminate\Database\Eloquent\Model          
     */
    public function findByIdWith($id, $related);

    /**
     * Retrieves a single page of records with related records
     * 
     * @param  string $related 
     * @param  int $perPage
     * @return Illuminate\Pagination\Paginator an instance of paginator.          
     */
    public function getbyPageWith($related, $perPage);

    /**
     * Retrieves all records from storage
     * 
     * @param  array $col
     * @return Illuminate\Support\Collection      
     */
    public function getAll($col);

    /**
     * Template method for creating a record in storage
     * 
     * @param  array  $fields
     * @return mixed    
     */
    public function create(array $data);

    /**
     * Template method for updating a record in storage
     * 
     * @param  int $id   
     * @param  array  $fields
     * @return bool       
     */
    public function update($id, array $data);

    /**
     * Deletes a record from storage
     * 
     * @param  int $id
     * @return bool     
     */
    public function delete($id);

}