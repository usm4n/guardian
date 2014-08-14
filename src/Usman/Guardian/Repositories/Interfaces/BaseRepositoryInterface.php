<?php namespace Usman\Guardian\Repositories\Interfaces;

interface BaseRepositoryInterface {

	public function findById($id);

	public function findByIdWith($id, $related);

	public function getbyPageWith($related, $perPage);

	public function getAll($col);

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);

}