<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCharacterCertificateRequest;
use App\Http\Requests\UpdateCharacterCertificateRequest;
use App\Repositories\CharacterCertificateRepository;
use Illuminate\Http\Request;

class CharacterCertificateController extends Controller
{
    private $repository;
    private $indexRoute;
    public function __construct(CharacterCertificateRepository $repository, $indexRoute = 'characterCertificate.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request)
    {
        $contentData = $this->repository->search($request);
//        return $contentData;
        return view($this->indexRoute, compact('contentData'));

    }

    public function create()
    {
//        $wards = $this->repository->getAllWards();
        $peoples = $this->repository->getAllPeople();

        return view('characterCertificate.create', compact( 'peoples'));
    }

    public function store(CreateCharacterCertificateRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Character Certificate Created Successfully');
    }


    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('characterCertificate.info', compact('data'));
    }


    public function edit($slug)
    {
        $peoples = $this->repository->getAllPeople();
        $data = $this->repository->get($slug);

        return view('characterCertificate.edit', compact('peoples', 'data'));
    }


    public function update(UpdateCharacterCertificateRequest $request, $slug)
    {
        $data = $this->repository->update($request, $slug);
        return redirect()->route($this->indexRoute)->with('success', 'Character Certificate Created Successfully');
    }
    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('characterCertificate.delete', compact('data'));
    }


    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Character Certificate Deleted Successfully');
    }
}
