<?php

namespace App\Http\Controllers;

use App\Repositories\CommissionerRepository;
use Illuminate\Http\Request;

class CommissionerController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(CommissionerRepository $repository, $indexRoute = 'commissioner.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
//    public function index(){
//
//        $contentData = $this->repository->all();
//        //        return $contentData;
//        return view($this->indexRoute, compact('contentData'));
//    }
    public function index(Request $request)
    {
        $contentData =  $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }
    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('commissioner.info',compact('data'));
    }

//    public function peopleIndex(){
//
//        $contentData = $this->repository->getAllAlivePeople();
//        //        return $contentData;
//        return view('commissioner.people.index', compact('contentData'));
//    }

    public function peopleIndex(Request $request)
    {
        $contentData =  $this->repository->searchPeople($request);
        return view('commissioner.people.index', compact('contentData'));
    }
    public function peopleInfo($slug)
    {
        $data = $this->repository->getPeopleInfo($slug);
//        return $data;
        return view('commissioner.people.info',compact('data'));
    }
}
