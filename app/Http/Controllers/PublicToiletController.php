<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePublicToiletRequest;
use App\Http\Requests\UpdatePublicToiletRequest;
use App\Repositories\PublicToiletRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class PublicToiletController extends Controller
{
    private $repository;
    private $indexRoute;

    public function __construct(PublicToiletRepository $repository, $indexRoute = 'publicToilet.index')
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

    public function create()
    {
        $wards = $this->repository->getAllWards();
        return view('publicToilet.create', compact('wards'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePublicToiletRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePublicToiletRequest $request)
    {
//        return $request->all();
        $data = $this->repository->create($request);
//        return $data;
        return redirect()->route('publicToilet.index')->with('success','Public Toilet Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $data = $this->repository->get($slug);

        return view('publicToilet.info',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  $slug
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->repository->get($slug);
        $wards = $this->repository->getAllWards();
        return view('publicToilet.edit', compact('data', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePublicToiletRequest $request
     * @param  $slug
     * @return Response
     */
    public function update(UpdatePublicToiletRequest $request, $slug)
    {
        $data = $this->repository->update($request,$slug);
        return redirect()->route('publicToilet.index')->with('success', 'Public Toilet Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param  $slug
     * @return Response
     */
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('publicToilet.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route('publicToilet.index')->with('success', 'Public Toilet Deleted Successfully');

    }
}
