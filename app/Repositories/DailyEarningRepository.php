<?php
namespace App\Repositories;

use App\Models\BusinessCategory;
use App\Models\Category;
use App\Models\ContractorCategory;
use App\Models\ContractorLicence;
use App\Models\ContractorLicenceHistory;
use App\Models\DailyEarning;
//use App\Models\Department;


use App\Models\SubCategory;
use Carbon\Carbon;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response;

class DailyEarningRepository
{
    private $model;
    public function __construct(DailyEarning $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }


    public function create($request): bool
    {
        if ($request->has('title') && $request->get('title'))
        {
            $this->model->title = $request->title;
        }
        if ($request->has('department_id') && $request->get('department_id'))
        {
            $this->model->department_id = $request->department_id;
        }
        if ($request->has('amount') && $request->get('amount'))
        {
            $this->model->amount = $request->amount;
        }
        $this->model->date = Carbon::now();


        return $this->model->save();

    }
    public function update($request, $id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }


        return $item->save();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }

        return $item->delete();
    }

//    public function getAllCategory()
//    {
//        return Category::all();
////        return $data;
//    }

    public function get($id)
    {
        $item = $this->model->find($id);
        if (!$item){
            throw new NotFoundHttpException('Earning Not Found');
        }
        return $item;
    }

    public function getTodaysEarning()
    {
        $data = DailyEarning::whereDate('created_at', Carbon::now()->format('Y-m-d'))->select('department_id', 'amount', 'form_number')->get();
        return $data;
    }

    public function getAllCategories()
    {

//        $data = Category::with('subCategories')->get();
//        return response()->json($data);
        $data = Category::all();
        return $data;
    }
    public function getAllSubCategories()
    {
//        $subCategories =SubCategory::select('name', 'id', 'fees')->where('category_id', $request->id)->get();
//        $data = Category::all();
        $data = Category::with('subCategories')->get();
        return $data;
//        return response()->json([]$data);
//        return response()->json([
////            'message' => "",
////            'success' => false,
////            'className' => "danger",
//            'data' => $data,
//        ], 200);
    }



















//    public function getContractorFees()
//    {
//        $fees = ContractorLicenceHistory::whereDate('created_at',Carbon::now()->format('Y-m-d'))->select('fees', 'created_at')->get();
////        dd($fees);
////        $data = $this->create();
//        return $fees;
//
//    }
//    public function getTradeLicenceFees()
//    {
////        $fees = TradeLicence::with('businessCategories')->whereDate('created_at', Carbon::now()->format('Y-m-d'))
////            ->get()->pluck('businessCategories.fees', 'id' );
//
////        $tFees = TradeLicence::with('businessCategories')->select('category_id', 'created_at')->get(); // Fee from trade licence
//
//        $tFees = TradeLicenceHistory::with('businessCategories')->whereDate('created_at',Carbon::now()->format('Y-m-d'))->select('fees_id', 'created_at')->get(); //fee from trade licence history
////        $sum = TradeLicenceHistory::where('fees_id', 'businessCategories.fees')->first()->sumOfFees();
//
////        dd($tFees);
//        return $tFees;
//
//
////        foreach ($tFees as $item)
////        {
////            $result = $item->businesscategories->id;
////            dd($result);
////            return $result;
////        }
////        dd($tFees);
//
//    }









//    public function getLastId()
//    {
//        $last_id = ContractorLicence::orderBy('id', 'desc')->first();
//
////        if (!$item) {
////            throw new NotFoundHttpException('Contractor Not Found');
////        }
//        return $last_id;
//    }
//
//    public function contractorFees($id)
//    {
//        $fees = ContractorLicence::where('category_id', $id)->pluck('id');
//        return $fees;
//    }





}
