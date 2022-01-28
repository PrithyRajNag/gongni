<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkRequest;
use App\Http\Requests\CreateWorkRequest;
use App\Repositories\WorkRepository;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(WorkRepository $repository, $indexRoute = 'work.index')
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
        $wards = $this->repository->getAllWards();
        return view('work.create', compact('wards'));
    }


    public function store(CreateWorkRequest $request)
    {
//        return $request->all();
        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route($this->indexRoute)->with('success', 'Work Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('work.info', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        return view('work.edit', compact('data', 'wards'));

    }


    public function update(UpdateWorkRequest $request, $slug)
    {
        $data = $this->repository->update($request,$slug);
        return redirect()->route($this->indexRoute)->with('success', 'Work Updated Successfully');
    }


    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('work.delete', compact( 'data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Work Deleted Successfully');
    }
}
