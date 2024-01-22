<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

class Rsvp extends ResourceController
{
    protected $modelName = 'App\Models\RsvpModel';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        return $this->respond($this->model->findAll(), 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'mobile' => $this->request->getPost('mobile'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message')
        ];

        if ($this->model->insert($data) === false) {
            $response = [
                'errors' => $this->model->errors(),
                'message' => 'Failed to save rsvp data.'
            ];

            return $this->fail($response, 409);
        }

        return $this->respond(['message' => 'Created successfully.'], 201);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
