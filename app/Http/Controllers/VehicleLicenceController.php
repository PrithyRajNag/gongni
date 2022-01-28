<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleLicenceRequest;
use App\Http\Requests\UpdateVehicleLicenceRequest;
use App\Repositories\VehicleLicenceRepository;
use App\Repositories\VehicleTypeRepository;
use Illuminate\Http\Request;

class VehicleLicenceController extends Controller
{
    private $repository;
    private $indexRoute;
    private $vehicleTypesRepository;

    public function __construct(VehicleLicenceRepository $repository, VehicleTypeRepository $vehicleTypesRepository,$indexRoute = 'vehicleLicence.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
        $this->vehicleTypesRepository= $vehicleTypesRepository;
    }

    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        $types = $this->repository->getAllSubCategories();
        return view('vehicleLicence.create', compact('types'));
    }


    public function store(CreateVehicleLicenceRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('vehicleLicence.index')->with('success','Vehicle Licence Created Successfully');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('vehicleLicence.info',compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $types= $this->repository->getAllSubCategories();
        return view('vehicleLicence.edit', compact('data', 'types'));
    }

    public function update(UpdateVehicleLicenceRequest $request, $slug)
    {
        $data = $this->repository->update($request,$slug);
        return redirect()->route('vehicleLicence.index')->with('success', 'Vehicle Licence Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('vehicleLicence.delete',compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('vehicleLicence.index')->with('success', 'Vehicle Licence Information Deleted Successfully');
    }
}
