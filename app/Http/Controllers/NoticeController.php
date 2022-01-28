<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\Notice;
use App\Repositories\NoticeRepository;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(NoticeRepository $repository, $indexRoute = 'notice.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index(Request $request){

        $contentData =  $this->repository->search($request);
//        return $contentData;
        return view('notice.index', compact('contentData'));
    }

    public function create(){
        return view('notice.create');
    }

    public function store(CreateNoticeRequest $request)
    {
//        return $request->all();
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'Successfully Notice Created');
    }

    public function edit($slug){
        $data = $this->repository->get($slug);
//        return $data;
        return view('notice.edit', compact( 'data'));
    }

    public function update(UpdateNoticeRequest $request,$slug)
    {
//        return $request->file('cover');
        $data = $this->repository->update($request, $slug);
        return redirect()->route( $this->indexRoute)->with('success','Successfully Notice Updated');
    }

    public function show($slug)
    {
        $data = $this->repository->get($slug);
        return view('notice.info', compact('data'));
    }

    public function delete($slug){
        $data = $this->repository->get($slug);
        return view('notice.delete', compact( 'data'));
    }

    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'Notice Deleted Successfully');
    }

    public function download($slug)
    {
        $document = Notice::where('slug', $slug)->firstOrFail();
        $pathToFile = storage_path('app/uploads/' . $document->cover);
        return response()->download($pathToFile);
    }
}
