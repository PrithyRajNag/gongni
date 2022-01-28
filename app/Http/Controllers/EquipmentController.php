<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipmentRequest;
use App\Models\Ministry;
use App\Repositories\EquipmentRepository;
use App\Repositories\ReliefCardRepository;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    private $repository;
    private $indexRoute ;
    public function __construct(EquipmentRepository $repository, $indexRoute = 'equipment.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index()
    {
        $contentData = $this->repository->all();
//        return $contentData->people;
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        $types = $this->repository->getAllEquipmentCategories();
        return view('equipment.create', compact('types'));
    }


    public function store(CreateEquipmentRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Equipment Not Found');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipment.info', compact('data'));

    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $types = $this->repository->getAllEquipmentCategories();
        return view('equipment.edit', compact('data', 'types'));
    }


    public function update(CreateEquipmentRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success','Equipment Not Found');

    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('equipment.delete',compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute, compact('data'));
    }
}
