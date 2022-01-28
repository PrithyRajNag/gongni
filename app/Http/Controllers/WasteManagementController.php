<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWasteManagementRequest;
use App\Http\Requests\UpdateWasteManagementRequest;
use App\Models\WasteManagement;
use App\Repositories\WardRepository;
use App\Repositories\WasteManagementRepository;
use Illuminate\Http\Request;

class WasteManagementController extends Controller
{
    private $repository;
    private $indexRoute;
    private $wardRepository;

    public function __construct(WasteManagementRepository $repository, WardRepository $wardRepository, $indexRoute = 'wasteManagement.index')
    {
        $this->repository = $repository;
        $this->wardRepository = $wardRepository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        $wards = $this->repository->getAllWards();
        return view('wasteManagement.create', compact('wards'));
    }


    public function store(CreateWasteManagementRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Waste Management People Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('wasteManagement.info', compact('data'));
    }


    public function edit($slug)
    {
        $wards = $this->repository->getAllWards();
        $data = $this->repository->get($slug);
        return view('wasteManagement.edit', compact('data', 'wards'));
    }


    public function update(UpdateWasteManagementRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Waste Management People Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('wasteManagement.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Waste Management People Deleted Successfully');
    }
    public function download($slug)
    {
        $document = WasteManagement::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/uploads/'. $document->file);
        return response()->download($pathToFile);
    }
}
