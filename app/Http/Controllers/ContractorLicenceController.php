<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractorLicenceRequest;
use App\Http\Requests\UpdateContractorLicenceRenewRequest;
use App\Http\Requests\UpdateContractorLicenceRequest;
use App\Models\ContractorLicenceDocument;
use App\Repositories\ContractorLicenceRepository;
use App\Repositories\PeopleRepository;
use Illuminate\Http\Request;

class ContractorLicenceController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(ContractorLicenceRepository $repository, $indexRoute = 'contractorLicence.index')
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
        $locations = $this->repository->getAllLocation();
        $categories = $this->repository->getAllSubCategories();
        return view('contractorLicence.create', compact('categories', 'locations'));
    }

    public function store(CreateContractorLicenceRequest $request)
    {
        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route($this->indexRoute)->with('success','New contractor Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
//        return $historyData;

        return view('contractorLicence.info', compact('data'));
    }


    public function edit($slug)
    {
        $locations = $this->repository->getAllLocation();
        $data = $this->repository->get($slug);
//        return $data;
        $categories = $this->repository->getAllSubCategories();
        return view('contractorLicence.edit',compact('data','categories', 'locations'));
    }


    public function update(UpdateContractorLicenceRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success','Contractor Updated Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('contractorLicence.delete', compact('data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Contractor Deleted Successfully');
    }

    public function renew($slug)
    {
//        $locations = $this->repository->getAllLocation();
//        $categories = $this->repository->getAllContractorCategories();
        $data = $this->repository->get($slug);
        return view('contractorLicence.history.renew',compact('data'));
    }
    public function renewUpdate(UpdateContractorLicenceRenewRequest $request,$slug)
    {
        $data = $this->repository->renewUpdate($request,$slug);
        return redirect()->route($this->indexRoute)->with('success', 'Contractor Licence Renewed Successfully');
    }
    public function history($slug)
    {
        $data = $this->repository->get($slug);
//        $data = $this->repository->contractorLicenceHistory($slug);
        return view('contractorLicence.history.licenceHistory',compact('data'));
    }
    public function download($id)
    {
        $document = ContractorLicenceDocument::findOrFail($id);
        $pathToFile = storage_path('app/uploads/' . $document->file_name);
        return response()->download($pathToFile);
    }


}
