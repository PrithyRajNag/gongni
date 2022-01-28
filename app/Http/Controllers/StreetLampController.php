<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStreetLampRequest;
use App\Http\Requests\UpdateStreetLampRequest;
use App\Models\StreetLamp;
use App\Repositories\StreetLampRepository;
use Illuminate\Http\Request;

class StreetLampController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(StreetLampRepository $repository, $indexRoute = 'streetLamp.index')
    {
        $this->indexRoute = $indexRoute;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('streetLamp.create');
    }


    public function store(CreateStreetLampRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Street Lamp Added Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('streetLamp.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('streetLamp.edit', compact('data'));
    }

    public function update(UpdateStreetLampRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Street Lamp Information Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('streetLamp.delete', compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Street Lamp Information Deleted Successfully');
    }

//    public function showMarker($slug)
//    {
//        $data = $this->repository->get($slug);
////        return $data;
//    }
}
