<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTradeLicenceRequest;
use App\Http\Requests\UpdateTradeLicenceRenewRequest;
use App\Http\Requests\UpdateTradeLicenceRequest;
use App\Models\District;
use App\Models\Thana;
use App\Models\TradeLicence;
use App\Repositories\TradeLicenceRepository;
use Illuminate\Http\Request;

class TradeLicenceController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(TradeLicenceRepository $repository, $indexRoute='tradeLicence.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        $wards = $this->repository->getAllWards();
        $categories = $this->repository->getAllSubCategories();
        $location = $this->repository->getAllLocation();

        return view('tradeLicence.create', compact('wards','categories', 'location'));
    }


    public function store(CreateTradeLicenceRequest $request)
    {

//        return $request->all();
        $data = $this->repository->create($request);
        return redirect()->route('tradeLicence.index')->with('success', 'Trade Licence Created successfully');
    }


    public function show($slug)
    {
//        $data = District::find('37');
//        return $data;
       $data = $this->repository->get($slug);
       return view('tradeLicence.info', compact('data'));
    }


    public function edit($slug)
    {
        $wards = $this->repository->getAllWards();
        $categories = $this->repository->getAllSubCategories();
        $data = $this->repository->get($slug);
        $location = $this->repository->getAllLocation();
        return view('tradeLicence.edit', compact('wards', 'categories', 'data', 'location'));
    }


    public function update(UpdateTradeLicenceRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Trade Licence Updated Successfully');

    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('tradeLicence.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Trade Licence Deleted Successfully');
    }

    public function renew ($slug)
    {
        $data = $this->repository->get($slug);
//        $categories = $this->repository->getAllBusinessCategories();
        return view('tradeLicence.history.renew', compact('data'));
    }

    public function renewUpdate(UpdateTradeLicenceRenewRequest $request, $slug)
    {
        $data = $this->repository->renewUpdate($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Trade Licence Renewed Successfully');
    }

    public function history($slug)
    {
        $data = $this->repository->get($slug);
//        $data = $this->repository->tradeLicenceHistory($slug);
        return view('tradeLicence.history.renewHistory', compact('data'));
    }

    public function download($slug)
    {
        $document = TradeLicence::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/public/' . $document->photo);
        return response()->download($pathToFile);
    }


}
