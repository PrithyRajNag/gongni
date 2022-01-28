<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWardRequest;
use App\Http\Requests\UpdateWardRequest;
use App\Repositories\WardRepository;

class WardController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(WardRepository $repository, $indexRoute = 'ward.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(){

        $contentData = $this->repository->all();
//        return $contentData;
        return view('ward.index', compact('contentData'));
    }

    public function create(){

        return view('ward.create');
    }

    public function store(CreateWardRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Ward Created');
    }

    public function edit($slug){
        $data = $this->repository->get($slug);
        return view('ward.edit', compact( 'data'));
    }

    public function update(UpdateWardRequest $request,$slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( $this->indexRoute)->with('success','Successfully Ward Updated');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('ward.info', compact('data'));
    }

    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('ward.delete', compact( 'data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Ward Deleted Successfully');
    }
}
