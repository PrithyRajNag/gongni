<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinessCategoryRequest;
use App\Http\Requests\UpdateBusinessCategoryRequest;
use App\Repositories\BusinessCategoryRepository;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(BusinessCategoryRepository $repository, $indexRoute = 'businessCategory.index')
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
        return view('businessCategory.create');
    }


    public function store(CreateBusinessCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('businessCategory.index')->with('success', 'Business Category Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('businessCategory.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('businessCategory.edit', compact('data'));
    }


    public function update(UpdateBusinessCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route('businessCategory.index')->with('success', 'Business Category Updated Successfully');
    }

    public function delete($slug)
    {
       $data = $this->repository->get($slug);
       return view('businessCategory.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Business Category Deleted Successfully');
    }
}
