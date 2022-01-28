<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSmsTemplateRequest;
use App\Models\Sms;
use App\Repositories\SmsTemplateRepository;
use Illuminate\Http\Request;

class SmsTemplateController extends Controller
{
    private $repository;
    private $indexRoute;
    public function __construct(SmsTemplateRepository $repository, $indexRoute = 'smsTemplate.index')
    {
        $this->indexRoute = $indexRoute;
        $this->repository = $repository;
    }

    public function index()
    {
        $contentData = $this->repository->all();
        return view($this->indexRoute, compact('contentData'));
    }

    public function create()
    {
        return view('smsTemplate.create');
    }


    public function store(CreateSmsTemplateRequest $request)
    {
        $data = $this->repository->create($request);
        return redirect()->route($this->indexRoute)->with('success', 'SMS Template Created Successfully');
    }

    public function sendMessage($slug)
    {
        $data = $this->repository->get($slug);
//        return $data;
        return view('smsTemplate.sendSms', compact('data'));
    }

//    public function sendTo(Request $request)
//    {
//        $data = $this->repository->send($request);
//        return 'SMS Send!';
//
//
//    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function delete($slug)
    {
        $data = $this->repository->get($slug);
        return view('smsTemplate.delete', compact('data'));
    }
    public function destroy($slug)
    {
        $data = $this->repository->delete($slug);
        return redirect()->route($this->indexRoute)->with('success', 'SMS Template Deleted Successfully');
    }
}
