<?php

namespace App\Controllers\api\V1;

use CodeIgniter\RESTful\ResourceController;

class Cars extends ResourceController
{
    protected $modelName = 'App\Models\CarModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Car not found');
        }
    }
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated($data, 'Car successfully created');
    }
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->find($id)) {
            return $this->failNotFound("Could not find car with id $id");
        }

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondUpdated($data, 'Car successfully updated');
    }

    public function delete($id = null)
    {
        $car = $this->model->find($id);
        if (!$car) {
            return $this->failNotFound("Could not find car with id $id");
        }

        if (!$this->model->delete($id)) {
            return $this->failServerError("Error while deleting car with id $id");
        }

        return $this->respondDeleted(['id' => $id], 'Car successfully deleted');
    }
}