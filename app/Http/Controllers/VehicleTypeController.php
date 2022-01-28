<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\Repositories\VehicleTypeRepository;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(VehicleTypeRepository $repository, $indexRoute = 'vehicleType.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }

    public function index()
    {
        $contentData = $this->repository->all();
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('vehicleType.create');
    }

    public function store(CreateVehicleTypeRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Vehicle Type Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('vehicleType.info', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('vehicleType.edit', compact('data'));
    }

    public function update(UpdateVehicleTypeRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Vehicle Type Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('vehicleType.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Vehicle Type Deleted Successfully');
    }
}
