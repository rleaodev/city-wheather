<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    private $repo;

    public function __construct(CityRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->getCities();
    }

    public function save(Request $request)
    {
        $fields = $request->only(['api_id', 'name']);
        return ['created' => $this->repo->insert($fields)];
    }

    public function show($id)
    {
        return $this->repo->getDetail($id);
    }
}
