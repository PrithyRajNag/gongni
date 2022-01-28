<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDailyEarningRequest;
use App\Models\Category;
use App\Repositories\DailyEarningRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyEarningController extends Controller
{
    private $repository;
    public function __construct(DailyEarningRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $contentData = $this->repository->getTodaysEarning();
        $sum = $contentData->sum('amount');
        return view('dailyEarning.index', compact('contentData', 'sum'));


    }


    public function create()
    {

    }


    public function store(CreateDailyEarningRequest $request)
    {


    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }





}
