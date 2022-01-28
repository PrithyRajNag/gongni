<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use App\Models\People;
use App\Repositories\PeopleRepository;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(PeopleRepository $repository, $indexRoute = 'people.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
//        $search = $request->get('search');
        $contentData =  $this->repository->search($request);
        $wards = $this->repository->getAllWards();

//        return $contentData;
//            $search == null ?
//            $this->repository->all() :
        return view($this->indexRoute, compact('contentData', 'wards'));
    }

//    public function search(Request $request)
//    {
////        return $request->all();
//        $contentData = $this->repository->search($request->search, $page=0);
//        //        return $contentData;
//        return view($this->indexRoute, compact('contentData'));
//    }

    public function create(){
        $wards = $this->repository->getAllWards();
        $bloodGroups = $this->repository->getAllBloodGroups();
        return view('people.create', compact('wards','bloodGroups'));
    }

    public function store(CreatePeopleRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route('people.index')->with('success', 'Successfully People Created');
    }

    public function edit($slug){
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        $bloodGroups = $this->repository->getAllBloodGroups();
        return view('people.edit', compact( 'data','wards', 'bloodGroups'));
    }

    public function update(UpdatePeopleRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( 'people.index')->with('success','Successfully People Information Updated');
    }
    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('people.info',compact('data'));
    }

    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('people.delete', compact( 'data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('people.index')->with('success', 'People Deleted Successfully');
    }
    public function download($slug)
    {
        $document = People::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/public/images/' . $document->cover);
        return response()->download($pathToFile);
    }
}
