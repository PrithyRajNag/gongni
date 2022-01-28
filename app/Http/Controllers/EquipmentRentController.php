<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipmentRentRequest;
use App\Http\Requests\UpdateEquipmentRentRequest;
use App\Repositories\EquipmentRentRepository;
use Illuminate\Http\Request;

class EquipmentRentController extends Controller
{
    private $repository;
    private $indexRoute;
    public function __construct(EquipmentRentRepository $repository, $indexRoute = 'equipmentRent.index')
    {
        $this->repository =$repository;
        $this->indexRoute =$indexRoute;
    }

    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('equipmentRent.create');
    }


    public function store(CreateEquipmentRentRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Rented Equipment Added Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentRent.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentRent.edit', compact('data'));
    }


    public function update(UpdateEquipmentRentRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Rented Equipment Information Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentRent.delete', compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Rented Equipment Information Deleted Successfully');
    }
}
