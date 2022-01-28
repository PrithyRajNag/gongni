<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfficialOrderRequest;
use App\Http\Requests\UpdateOfficialOrderRequest;
use App\Models\OfficialOrder;
use App\Repositories\OfficialOrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficialOrderController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(OfficialOrderRepository $repository, $indexRoute = 'officialOrder.index'){
        $this->indexRoute = $indexRoute;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
       $contentData = $this->repository->search($request);
       return view($this->indexRoute, compact('contentData'));
    }

    public function create()
    {
        return view('officialOrder.create');
    }

    public function store(CreateOfficialOrderRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Official Order Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialOrder.info', compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialOrder.edit', compact('data'));

    }


    public function update(UpdateOfficialOrderRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Official Order Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialOrder.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Official Order Deleted Successfully');
    }

    public function download($slug)
    {
        $document = OfficialOrder::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/uploads/'. $document->file);
        return response()->download($pathToFile);

    }
}
