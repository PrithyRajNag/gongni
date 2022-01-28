<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use App\Repositories\HospitalRepository;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(HospitalRepository $repository, $indexRoute = 'hospital.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData =  $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        $wards = $this->repository->getAllWards();
        return view('hospital.create', compact('wards'));
    }


    public function store(CreateHospitalRequest $request)
    {
//        return $request->all();

        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route('hospital.index')->with('success','Hospital Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);

        return view('hospital.info',compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
//        return $data;
        return view('hospital.edit', compact ('data','wards'));
    }


    public function update(UpdateHospitalRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( 'hospital.index')->with('success','Hospital Information Updated Successfully');
    }

    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('hospital.delete', compact( 'data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('hospital.index')->with('success', 'Delete Hospital Successfully');
    }
}
