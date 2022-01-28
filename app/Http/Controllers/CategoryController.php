<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    private $indexRoute;
    public function __construct(CategoryRepository $repository , $indexRoute = 'category.index')
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
        return view('category.create');
    }


    public function store(CreateCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Category Created Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('category.edit', compact('data'));
    }


    public function update(UpdateCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Category Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('category.delete', compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete( $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Category Deleted Successfully');
    }
}
