<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use App\Repositories\CircularRepository;
use Illuminate\Http\Request;

class CircularController extends Controller
{
    private $repository;
    private $indexRoute ;
    public function __construct(CircularRepository $repository, $indexRoute = 'circular.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
//        return $contentData->people;
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('circular.create');
    }


    public function store(CreateCircularRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Circular Created');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('circular.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
//        return $data;
        return view('circular.edit', compact( 'data'));
    }


    public function update(UpdateCircularRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( $this->indexRoute)->with('success','Successfully Circular Updated');
    }


    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('circular.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Circular Deleted Successfully');
    }
    public function download($slug)
    {
        $document = Circular::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/uploads/' . $document->file);
        return response()->download($pathToFile);
    }
}
