<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReliefCategoryRequest;
use App\Http\Requests\UpdateReliefCategoryRequest;
use App\Models\ReliefCategory;
use App\Repositories\ReliefCategoryRepository;
use App\Repositories\WardRepository;
use Illuminate\Http\Request;

class ReliefCategoryController extends Controller
{
    private $repository;
    private $indexRoute ;
    public function __construct(ReliefCategoryRepository $repository, $indexRoute = 'reliefCategory.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index()
    {

        $contentData = ReliefCategory::paginate(10);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('reliefCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReliefCategoryRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('reliefCategory.index')->with('success','Relief Category Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('reliefCategory.info', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('reliefCategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReliefCategoryRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route('reliefCategory.index')->with('success','Relief Category Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('reliefCategory.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('reliefCategory.index')->with('success','Relief Category Deleted Successfully');
    }
}
