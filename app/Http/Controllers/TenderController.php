<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenderRequest;
use App\Http\Requests\UpdateTenderRequest;
use App\Models\Tender;
use App\Models\TenderDocument;
use App\Repositories\TenderRepository;
use Illuminate\Http\Request;
use ZipArchive;

class TenderController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(TenderRepository $repository, $indexRoute='tender.index')
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
        $ministries = $this->repository->getAllMinistries();
        return view('tender.create', compact('ministries'));
    }

    public function store(CreateTenderRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Tender Created Successfully');

    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('tender.info', compact('data'));
    }

    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $ministries = $this->repository->getAllMinistries();

        return view('tender.edit', compact('ministries', 'data'));
    }

    public function update(UpdateTenderRequest $request, $slug)
    {
//        return $request->all();
        $data = $this->repository->update($request,$slug);
        return redirect()->route($this->indexRoute)->with('success', 'Tender Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('tender.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success','Tender Information Deleted Successfully');
    }

    public function downloadFile($id)
    {
        $document = TenderDocument::findOrFail($id);
        $pathToFile = storage_path('app/uploads/' . $document->file_name);
        return response()->download($pathToFile);
    }

}
