<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSmsRequest;
use App\Repositories\SmsRepository;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    private $repository;
    private $indexRoute ;

    public function __construct(SmsRepository $repository, $indexRoute = 'sms.index')
    {
        $this->repository = $repository;
        $this->indexRoute = $indexRoute;
    }
    public function index()
    {
        $contentData = $this->repository->all();
        return view($this->indexRoute, compact('contentData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function send(CreateSmsRequest $request)
    {

//        dd($request->all());
        $data = $this->repository->create($request);
//        return $data;
//       dd($data);
        return redirect()->route($this->indexRoute)->with('success', 'SMS Sent Successfully');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
