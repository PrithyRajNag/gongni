<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipmentCategoryRequest;
use App\Http\Requests\UpdateEquipmentCategoryRequest;
use App\Repositories\EquipmentCategoryRepository;
use Illuminate\Http\Request;

class EquipmentCategoryController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(EquipmentCategoryRepository $repository, $indexRoute = 'equipmentCategory.index')
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
        return view('equipmentCategory.create');
    }

    public function store(CreateEquipmentCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Equipment Category Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentCategory.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentCategory.edit', compact('data'));
    }


    public function update(UpdateEquipmentCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Equipment Category Created Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipmentCategory.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Equipment Category Created Successfully');
    }
}
