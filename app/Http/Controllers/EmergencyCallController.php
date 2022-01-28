<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmergencyCallRequest;
use App\Http\Requests\UpdateEmergencyCallRequest;
use App\Repositories\EmergencyCallRepository;
use Illuminate\Http\Request;

class EmergencyCallController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(EmergencyCallRepository $repository, $indexRoute = 'emergencyCall.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData =  $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('emergencyCall.create');
    }


    public function store(CreateEmergencyCallRequest $request)
    {
        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route($this->indexRoute)->with('success', 'Emergency Call Entry Successful');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('emergencyCall.info', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('emergencyCall.edit', compact('data'));
    }

    public function update(UpdateEmergencyCallRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Emergency Call Entry Update Successful');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('emergencyCall.delete', compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Emergency Call Entry Deleted Successfully');
    }
}
