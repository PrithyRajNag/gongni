<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractorCategoryRequest;
use App\Http\Requests\UpdateContractorCategoryRequest;
use App\Repositories\BusinessCategoryRepository;
use App\Repositories\ContractorCategoryRepository;
use Illuminate\Http\Request;

class ContractorCategoryController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(ContractorCategoryRepository $repository, $indexRoute = 'contractorCategory.index')
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
        return view('contractorCategory.create');
    }


    public function store(CreateContractorCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('contractorCategory.index')->with('success', 'Contractor Category Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('contractorCategory.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('contractorCategory.edit', compact('data'));
    }


    public function update(UpdateContractorCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route('contractorCategory.index')->with('success', 'Contractor Category Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('contractorCategory.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Contractor Category Deleted Successfully');
    }
}
