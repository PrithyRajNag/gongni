<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEducationInstitutionRequest;
use App\Http\Requests\UpdateEducationInstitutionRequest;
use App\Repositories\EducationInstitutionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class EducationInstitutionController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(EducationInstitutionRepository $repository, $indexRoute = 'educationInstitution.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
        return view($this->indexRoute, compact('contentData'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $wards = $this->repository->getAllWards();
        return view('educationInstitution.create', compact('wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEducationInstitutionRequest $request
     * @return RedirectResponse
     */
    public function store(CreateEducationInstitutionRequest $request): RedirectResponse
    {
//        return $request->all();
        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route('educationInstitution.index')->with('success','Education Institute Created Successfully');
    }


    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $data = $this->repository->get($slug);

        return view('educationInstitution.info',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $slug
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        return view('educationInstitution.edit', compact('data', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEducationInstitutionRequest $request
     * @param $slug
     * @return Response
     */
    public function update(UpdateEducationInstitutionRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route( 'educationInstitution.index')->with('success','Education Institution Information Updated Successfully');
    }

    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('educationInstitution.delete', compact('data') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return Response
     */
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('educationInstitution.index')->with('success', 'Education Institution Deleted Successfully');

    }
}
