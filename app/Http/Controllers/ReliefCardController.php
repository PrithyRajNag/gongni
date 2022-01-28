<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReliefCardRequest;
use App\Http\Requests\CreateReliefCategoryRequest;
use App\Http\Requests\UpdateReliefCardRequest;
use App\Repositories\PeopleRepository;
use App\Repositories\ReliefCardRepository;
use Illuminate\Http\Request;

class ReliefCardController extends Controller
{
    private $repository;
    private $indexRoute ;
    public function __construct(ReliefCardRepository $repository, $indexRoute = 'reliefCard.index')
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
        $wards = $this->repository->getAllWards();
        $categories = $this->repository->getAllReliefCategories();
        $peoples = $this->repository->getAllPeople();
//        return $peoples;

        return view('reliefCard.create', compact('wards','categories', 'peoples'));

    }

    public function store(CreateReliefCardRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('reliefCard.index')->with('success','Relief Card Created Successfully');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('reliefCard.info', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        $categories = $this->repository->getAllReliefCategories();
        $peoples = $this->repository->getAllPeople();
        return view('reliefCard.edit', compact('data','wards','peoples','categories'));
    }


    public function update(UpdateReliefCardRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route('reliefCard.index')->with('success', 'Relief Card Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('reliefCard.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('reliefCard.index')->with('success','Relief Card Deleted Successfully');
    }
}
