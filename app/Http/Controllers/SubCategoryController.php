<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $repository;
    private $categoryRepository;
    private $indexRoute;
    public function __construct(SubCategoryRepository $repository , CategoryRepository $categoryRepository, $indexRoute = 'subCategory.index')
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->indexRoute = $indexRoute;
    }

    public function index(Request $request)
    {
        $categories = $this->repository->getAllCategories();
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData', 'categories'));
    }


    public function create()
    {
        $categories = $this->repository->getAllCategories();
        return view('subCategory.create', compact('categories'));
    }


    public function store(CreateSubCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Sub Category Created Successfully ');
    }


    public function show($id)
    {

    }


    public function edit($slug)
    {
        $categories = $this->repository->getAllCategories();
        $data = $this->repository->get($slug);
        return view('subCategory.edit', compact('data', 'categories'));
    }


    public function update(UpdateSubCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Sub Category Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('subCategory.delete', compact('data'));

    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Sub Category deleted SuccessFully');
    }
}
