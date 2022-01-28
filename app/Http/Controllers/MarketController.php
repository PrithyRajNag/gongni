<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use App\Repositories\MarketRepository;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(MarketRepository $repository, $indexRoute = 'market.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }

    public function index(Request $request)
    {
        $contentData =  $this->repository->search($request);
        return view('market.index', compact('contentData'));
    }


    public function create()
    {
        $wards = $this->repository->getAllWards();
        return view('market.create', compact('wards'));
    }


    public function store(CreateMarketRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('market.index')->with('success','Market Created Successfully');

    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);

        return view('market.info',compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        return view('market.edit', compact( 'data','wards'));
    }


    public function update(UpdateMarketRequest $request, $slug)
    {
        $data =$this->repository->update($request,$slug);
        return redirect()->route( 'market.index')->with('success','Successfully Market Information Updated');
    }

    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('market.delete', compact( 'data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('market.index')->with('success', 'Market Deleted Successfully');
    }
}
