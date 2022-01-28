<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfficialFormRequest;
use App\Http\Requests\UpdateOfficialFormRequest;
use App\Models\OfficialForm;
use App\Repositories\MarketRepository;
use App\Repositories\OfficialFormRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OfficialFormController extends Controller
{
    private $repository;
    private $indexRoute ;


    public function __construct(OfficialFormRepository $repository, $indexRoute = 'officialForm.index')
    {
        $this->indexRoute = $indexRoute;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {

        $contentData =  $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    public function create()
    {
        return view('officialForm.create');
    }


    public function store(CreateOfficialFormRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success','Official Form Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialForm.info',compact('data'));
    }


    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialForm.edit', compact('data'));
    }


    public function update(UpdateOfficialFormRequest $request, $slug)
    {
        $data = $this->repository->update($request,$slug);
        return redirect()->route($this->indexRoute)->with('success', 'Official Form Updated Successfully');
    }


    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('officialForm.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success','Official Form Deleted Successfully');
    }

    public function downloadFile($slug)
    {
        $document = OfficialForm::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/uploads/'. $document->file);
        return response()->download($pathToFile);
    }
}
