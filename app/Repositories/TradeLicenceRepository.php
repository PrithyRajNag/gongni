<?php
namespace App\Repositories;


use App\Models\Division;
use App\Models\SubCategory;
use App\Models\TradeLicence;
use App\Models\TradeLicenceHistory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TradeLicenceRepository
{
    private $model;
    private $wardRepository;
    private $businessCategoryRepository;

    public function __construct(TradeLicence $model, WardRepository $wardRepository, BusinessCategoryRepository $businessCategoryRepository)
    {
        $this->model = $model;
        $this->wardRepository =$wardRepository;
        $this->businessCategoryRepository = $businessCategoryRepository;

    }

    public function all()
    {
        return $this->model->paginate();
    }
    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->model
                ->where('name', 'LIKE', "%$search%")
                ->orderBy('name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request)
    {
        if ($request->has('business_name') && $request->get('business_name')) {
            $this->model->business_name = $request->business_name;
        }
        if ($request->has('business_name_bn') && $request->get('business_name_bn')) {
            $this->model->business_name_bn = $request->business_name_bn;
        }
        if ($request->has('business_details') && $request->get('business_details')) {
            $this->model->business_details = $request->business_details;
        }
        if ($request->has('shop_holding_no') && $request->get('shop_holding_no')) {
            $this->model->shop_holding_no = $request->shop_holding_no;
        }
        if ($request->has('shop_holding_no_bn') && $request->get('shop_holding_no_bn')) {
            $this->model->shop_holding_no_bn = $request->shop_holding_no_bn;
        }
        if ($request->has('address') && $request->get('address')) {
            $this->model->address = $request->address;
        }
        if ($request->has('address_bn') && $request->get('address_bn')) {
            $this->model->address_bn = $request->address_bn;
        }
        if ($request->has('road') && $request->get('road')) {
            $this->model->road = $request->road;
        }
        if ($request->has('road_bn') && $request->get('road_bn')) {
            $this->model->road_bn = $request->road_bn;
        }
        if ($request->has('area') && $request->get('area')) {
            $this->model->area = $request->area;
        }
        if ($request->has('area_bn') && $request->get('area_bn')) {
            $this->model->area_bn = $request->area_bn;
        }
        if ($request->has('market_name') && $request->get('market_name')) {
            $this->model->market_name = $request->market_name;
        }
        if ($request->has('floor_no') && $request->get('floor_no')) {
            $this->model->floor_no = $request->floor_no;
        }
        if ($request->has('shop_no') && $request->get('shop_no')) {
            $this->model->shop_no= $request->shop_no;
        }
        if($request->has('business_start_date') && $request->get('business_start_date')){
            $this->model->business_start_date = $request->business_start_date;
        }
        if ($request->has('business_nature') && $request->get('business_nature')) {
            $this->model->business_nature = $request->business_nature;
        }
        if ($request->has('authorised_capital') && $request->get('authorised_capital')) {
            $this->model->authorised_capital = $request->authorised_capital;
        }
        if ($request->has('paidUp_capital') && $request->get('paidUp_capital')) {
            $this->model->paidUp_capital = $request->paidUp_capital;
        }
        if ($request->has('is_factory') && $request->get('is_factory')) {
            $this->model->is_factory = $request->is_factory;
        }
        if ($request->has('is_chemical_available') && $request->get('is_chemical_available')) {
            $this->model->is_chemical_available = $request->is_chemical_available;
        }
        if ($request->has('plot_type') && $request->get('plot_type')) {
            $this->model->plot_type = $request->plot_type;
        }
        if ($request->has('plot_category') && $request->get('plot_category')) {
            $this->model->plot_category = $request->plot_category;
        }
        if ($request->has('place') && $request->get('place')) {
            $this->model->place = $request->place;
        }
        if ($request->has('activity') && $request->get('activity')) {
            $this->model->activity = $request->activity;
        }
        if ($request->has('licence_number') && $request->get('licence_number')) {
            $this->model->licence_number = $request->licence_number;
        }
        if ($request->has('issue_date') && $request->get('issue_date')) {
            $this->model->issue_date = $request->issue_date;
        }
        if ($request->has('expiry_date') && $request->get('expiry_date')) {
            $this->model->expiry_date = $request->expiry_date;
        }

        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('name_bn') && $request->get('name_bn')) {
            $this->model->name_bn = $request->name_bn;
        }
        if ($request->has('father_name') && $request->get('father_name')) {
            $this->model->father_name = $request->father_name;
        }
        if ($request->has('father_name_bn') && $request->get('father_name_bn')) {
            $this->model->father_name_bn = $request->father_name_bn;
        }
        if ($request->has('mother_name') && $request->get('mother_name')) {
            $this->model->mother_name = $request->mother_name;
        }
        if ($request->has('mother_name_bn') && $request->get('mother_name_bn')) {
            $this->model->mother_name_bn = $request->mother_name_bn;
        }
        if ($request->has('gender') && $request->get('gender')) {
            $this->model->gender = $request->gender;
        }
        if ($request->has('marital_status') && $request->get('marital_status')) {
            $this->model->marital_status = $request->marital_status;
        }
        if ($request->has('spouse_name') && $request->get('spouse_name')) {
            $this->model->spouse_name = $request->spouse_name;
        }
        if ($request->has('spouse_name_bn') && $request->get('spouse_name_bn')) {
            $this->model->spouse_name_bn = $request->spouse_name_bn;
        }
        if ($request->has('dob') && $request->get('dob')) {
            $this->model->dob = $request->dob;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('email') && $request->get('email')) {
            $this->model->email = $request->email;
        }
        if ($request->has('bin') && $request->get('bin')) {
            $this->model->bin = $request->bin;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $this->model->nid = $request->nid;
        }
        if ($request->has('passport_no') && $request->get('passport_no')) {
            $this->model->passport_no = $request->passport_no;
        }
        if ($request->has('birth_reg') && $request->get('birth_reg')) {
            $this->model->birth_reg = $request->birth_reg;
        }
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->getClientOriginalName();
            $path = $request->photo->store('public');
            $this->model->photo = $request->photo->hashname();
        }
        if ($request->has('present_address') && $request->get('present_address')) {
            $this->model->present_address = $request->present_address;
        }
        if ($request->has('present_address_bn') && $request->get('present_address_bn')) {
            $this->model->present_address_bn = $request->present_address_bn;
        }
        if ($request->has('present_holding_no') && $request->get('present_holding_no')) {
            $this->model->present_holding_no = $request->present_holding_no;
        }
        if ($request->has('present_holding_no_bn') && $request->get('present_holding_no_bn')) {
            $this->model->present_holding_no_bn = $request->present_holding_no_bn;
        }
        if ($request->has('present_address_area') && $request->get('present_address_area')) {
            $this->model->present_address_area = $request->present_address_area;
        }
        if ($request->has('present_address_area_bn') && $request->get('present_address_area_bn')) {
            $this->model->present_address_area_bn = $request->present_address_area_bn;
        }
        if ($request->has('present_post_code') && $request->get('present_post_code')) {
            $this->model->present_post_code = $request->present_post_code;
        }
        if ($request->has('present_post_code_bn') && $request->get('present_post_code_bn')) {
            $this->model->present_post_code_bn = $request->present_post_code_bn;
        }
        if ($request->has('present_division_id') && $request->get('present_division_id')) {
            $this->model->present_division_id = $request->present_division_id;
        }
        if ($request->has('present_district_id') && $request->get('present_district_id')) {
            $this->model->present_district_id = $request->present_district_id;
        }
        if ($request->has('present_thana_id') && $request->get('present_thana_id')) {
            $this->model->present_thana_id = $request->present_thana_id;
        }
        if ($request->has('permanent_address') && $request->get('permanent_address')) {
            $this->model->permanent_address = $request->permanent_address;
        }
        if ($request->has('permanent_address_bn') && $request->get('permanent_address_bn')) {
            $this->model->permanent_address_bn = $request->permanent_address_bn;
        }
        if ($request->has('permanent_holding_no') && $request->get('permanent_holding_no')) {
            $this->model->permanent_holding_no = $request->permanent_holding_no;
        }
        if ($request->has('permanent_holding_no_bn') && $request->get('permanent_holding_no_bn')) {
            $this->model->permanent_holding_no_bn = $request->permanent_holding_no_bn;
        }
        if ($request->has('permanent_address_area') && $request->get('permanent_address_area')) {
            $this->model->permanent_address_area = $request->permanent_address_area;
        }
        if ($request->has('permanent_address_area_bn') && $request->get('permanent_address_area_bn')) {
            $this->model->permanent_address_area_bn = $request->permanent_address_area_bn;
        }
        if ($request->has('permanent_post_code') && $request->get('permanent_post_code')) {
            $this->model->permanent_post_code = $request->permanent_post_code;
        }
        if ($request->has('permanent_post_code_bn') && $request->get('permanent_post_code_bn')) {
            $this->model->permanent_post_code_bn = $request->permanent_post_code_bn;
        }
        if ($request->has('permanent_address_area_bn') && $request->get('permanent_address_area_bn')) {
            $this->model->permanent_address_area_bn = $request->permanent_address_area_bn;
        }
        if ($request->has('permanent_division_id') && $request->get('permanent_division_id')) {
            $this->model->permanent_division_id = $request->permanent_division_id;
        }
        if ($request->has('permanent_district_id') && $request->get('permanent_district_id')) {
            $this->model->permanent_district_id = $request->permanent_district_id;
        }
        if ($request->has('permanent_thana_id') && $request->get('permanent_thana_id')) {
            $this->model->permanent_thana_id = $request->permanent_thana_id;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('sub_category_id') && $request->get('sub_category_id')) {
            $this->model->sub_category_id = $request->sub_category_id;
        }
        $this->model->save();

        $data = $this->licenceHistory($this->model,  $licence_type = 'Trade Licence', $flag = 'created', 'fees_id');

//        $id = $this->model->id;

//        dd($this->model);

        return $this->model;

    }
    public function licenceHistory($model, $licence_type, $flag, $fees_id)
    {
        $historyModel = new TradeLicenceHistory();

        $historyModel->trade_id = $model->id;
        $historyModel->issue_date = $model->issue_date;
        $historyModel->expiry_date = $model->expiry_date;
        $historyModel->licence_number = $model->licence_number;
        $historyModel->licence_type = $licence_type;
        $historyModel->flag = $flag;
        $historyModel->fees_id = $model->sub_category_id;


        return $historyModel->save();



    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Trade Licence Not Found');
        }

        if ($request->has('business_name') && $request->get('business_name')) {
            $item->business_name = $request->business_name;
        }
        if ($request->has('business_name_bn') && $request->get('business_name_bn')) {
            $item->business_name_bn = $request->business_name_bn;
        }
        if ($request->has('business_details') && $request->get('business_details')) {
            $item->business_details = $request->business_details;
        }
        if ($request->has('shop_holding_no') && $request->get('shop_holding_no')) {
            $item->shop_holding_no = $request->shop_holding_no;
        }
        if ($request->has('shop_holding_no_bn') && $request->get('shop_holding_no_bn')) {
            $item->shop_holding_no_bn = $request->shop_holding_no_bn;
        }
        if ($request->has('address') && $request->get('address')) {
            $item->address = $request->address;
        }
        if ($request->has('address_bn') && $request->get('address_bn')) {
            $item->address_bn = $request->address_bn;
        }
        if ($request->has('road') && $request->get('road')) {
            $item->road = $request->road;
        }
        if ($request->has('road_bn') && $request->get('road_bn')) {
            $item->road_bn = $request->road_bn;
        }
        if ($request->has('area') && $request->get('area')) {
            $item->area = $request->area;
        }
        if ($request->has('area_bn') && $request->get('area_bn')) {
            $item->area_bn = $request->area_bn;
        }
        if ($request->has('market_name') && $request->get('market_name')) {
            $item->market_name = $request->market_name;
        }
        if ($request->has('floor_no') && $request->get('floor_no')) {
            $item->floor_no = $request->floor_no;
        }
        if ($request->has('shop_no') && $request->get('shop_no')) {
            $item->shop_no= $request->shop_no;
        }
        if($request->has('business_start_date') && $request->get('business_start_date')){
            $item->business_start_date = $request->business_start_date;
        }
        if ($request->has('business_nature') && $request->get('business_nature')) {
            $item->business_nature = $request->business_nature;
        }
        if ($request->has('authorised_capital') && $request->get('authorised_capital')) {
            $item->authorised_capital = $request->authorised_capital;
        }
        if ($request->has('paidUp_capital') && $request->get('paidUp_capital')) {
            $item->paidUp_capital = $request->paidUp_capital;
        }
        if ($request->has('is_factory') && $request->get('is_factory')) {
            $item->is_factory = $request->is_factory;
        }
        if ($request->has('is_chemical_available') && $request->get('is_chemical_available')) {
            $item->is_chemical_available = $request->is_chemical_available;
        }
        if ($request->has('plot_type') && $request->get('plot_type')) {
            $item->plot_type = $request->plot_type;
        }
        if ($request->has('plot_category') && $request->get('plot_category')) {
            $item->plot_category = $request->plot_category;
        }
        if ($request->has('place') && $request->get('place')) {
            $item->place = $request->place;
        }
        if ($request->has('activity') && $request->get('activity')) {
            $item->activity = $request->activity;
        }
        if ($request->has('licence_number') && $request->get('licence_number')) {
            $item->licence_number = $request->licence_number;
        }
        if ($request->has('issue_date') && $request->get('issue_date')) {
            $item->issue_date = $request->issue_date;
        }
        if ($request->has('expiry_date') && $request->get('expiry_date')) {
            $item->expiry_date = $request->expiry_date;
        }

        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;

            //slug update
            $slug = Str::slug($item->name);
            $count = $item->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $item->slug = $count ? "{$slug}-{$count}" : $slug;
        }



        if ($request->has('name_bn') && $request->get('name_bn')) {
            $item->name_bn = $request->name_bn;
        }
        if ($request->has('father_name') && $request->get('father_name')) {
            $item->father_name = $request->father_name;
        }
        if ($request->has('father_name_bn') && $request->get('father_name_bn')) {
            $item->father_name_bn = $request->father_name_bn;
        }
        if ($request->has('mother_name') && $request->get('mother_name')) {
            $item->mother_name = $request->mother_name;
        }
        if ($request->has('mother_name_bn') && $request->get('mother_name_bn')) {
            $item->mother_name_bn = $request->mother_name_bn;
        }
        if ($request->has('gender') && $request->get('gender')) {
            $item->gender = $request->gender;
        }
        if ($request->has('marital_status') && $request->get('marital_status')) {
            $item->marital_status = $request->marital_status;
        }
        if ($request->has('spouse_name') && $request->get('spouse_name')) {
            $item->spouse_name = $request->spouse_name;
        }
        if ($request->has('spouse_name_bn') && $request->get('spouse_name_bn')) {
            $item->spouse_name_bn = $request->spouse_name_bn;
        }
        if ($request->has('dob') && $request->get('dob')) {
            $item->dob = $request->dob;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('email') && $request->get('email')) {
            $item->email = $request->email;
        }
        if ($request->has('bin') && $request->get('bin')) {
            $item->bin = $request->bin;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $item->nid = $request->nid;
        }
        if ($request->has('passport_no') && $request->get('passport_no')) {
            $item->passport_no = $request->passport_no;
        }
        if ($request->has('birth_reg') && $request->get('birth_reg')) {
            $item->birth_reg = $request->birth_reg;
        }
        if ($request->hasFile('photo')) {
            if ($item->photo != null && Storage::exists('public/' . $item->photo) ) {

                Storage::delete('public/' . $item->photo);
            }
            $fileName = time() . '.' . $request->photo->getClientOriginalName();

            $request->photo->store('public');
            $item->photo = $request->photo-> hashname();
        }
        if ($request->has('present_address') && $request->get('present_address')) {
            $item->present_address = $request->present_address;
        }
        if ($request->has('present_address_bn') && $request->get('present_address_bn')) {
            $item->present_address_bn = $request->present_address_bn;
        }
        if ($request->has('present_holding_no') && $request->get('present_holding_no')) {
            $item->present_holding_no = $request->present_holding_no;
        }
        if ($request->has('present_holding_no_bn') && $request->get('present_holding_no_bn')) {
            $item->present_holding_no_bn = $request->present_holding_no_bn;
        }
        if ($request->has('present_address_area') && $request->get('present_address_area')) {
            $item->present_address_area = $request->present_address_area;
        }
        if ($request->has('present_address_area_bn') && $request->get('present_address_area_bn')) {
            $item->present_address_area_bn = $request->present_address_area_bn;
        }
        if ($request->has('present_post_code') && $request->get('present_post_code')) {
            $item->present_post_code = $request->present_post_code;
        }
        if ($request->has('present_post_code_bn') && $request->get('present_post_code_bn')) {
            $item->present_post_code_bn = $request->present_post_code_bn;
        }
        if ($request->has('present_division_id') && $request->get('present_division_id')) {
            $item->present_division_id = $request->present_division_id;
        }
        if ($request->has('present_district_id') && $request->get('present_district_id')) {
            $item->present_district_id = $request->present_district_id;
        }
        if ($request->has('present_thana_id') && $request->get('present_thana_id')) {
            $item->present_thana_id = $request->present_thana_id;
        }
        if ($request->has('permanent_address') && $request->get('permanent_address')) {
            $item->permanent_address = $request->permanent_address;
        }
        if ($request->has('permanent_address_bn') && $request->get('permanent_address_bn')) {
            $item->permanent_address_bn = $request->permanent_address_bn;
        }
        if ($request->has('permanent_holding_no') && $request->get('permanent_holding_no')) {
            $item->permanent_holding_no = $request->permanent_holding_no;
        }
        if ($request->has('permanent_holding_no_bn') && $request->get('permanent_holding_no_bn')) {
            $item->permanent_holding_no_bn = $request->permanent_holding_no_bn;
        }
        if ($request->has('permanent_address_area') && $request->get('permanent_address_area')) {
            $item->permanent_address_area = $request->permanent_address_area;
        }
        if ($request->has('permanent_address_area_bn') && $request->get('permanent_address_area_bn')) {
            $item->permanent_address_area_bn = $request->permanent_address_area_bn;
        }
        if ($request->has('permanent_post_code') && $request->get('permanent_post_code')) {
            $item->permanent_post_code = $request->permanent_post_code;
        }
        if ($request->has('permanent_post_code_bn') && $request->get('permanent_post_code_bn')) {
            $item->permanent_post_code_bn = $request->permanent_post_code_bn;
        }
        if ($request->has('permanent_address_area_bn') && $request->get('permanent_address_area_bn')) {
            $item->permanent_address_area_bn = $request->permanent_address_area_bn;
        }
        if ($request->has('permanent_division_id') && $request->get('permanent_division_id')) {
            $item->permanent_division_id = $request->permanent_division_id;
        }
        if ($request->has('permanent_district_id') && $request->get('permanent_district_id')) {
            $item->permanent_district_id = $request->permanent_district_id;
        }
        if ($request->has('permanent_thana_id') && $request->get('permanent_thana_id')) {
            $item->permanent_thana_id = $request->permanent_thana_id;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('sub_category_id') && $request->get('sub_category_id')) {
            $item->sub_category_id = $request->sub_category_id;
        }

        return $item->save();
    }
    public function renewUpdate($request, $slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Trade Licence Not Found');
        }

        if ($request->has('issue_date') && $request->get('issue_date'))
        {
            $item->issue_date = $request->issue_date;
        }
        if ($request->has('expiry_date') && $request->get('expiry_date'))
        {
            $item->expiry_date = $request->expiry_date;
        }
//        if ($request->has('category_id') && $request->get('category_id'))
//        {
//            $item->category_id = $request->category_id;
//        }
        $item->save();

        $data = $this->licenceHistory($item, $licence_type = 'Trade Licence', $flag = 'renew', 'fees_id');

        return $item;
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Trade Licence Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Trade Licence Not Found');
        }
        return $item;
    }

    public function getAllWards()
    {
        return $this->wardRepository->all();
    }

    public function getAllSubCategories()
    {
        $data = SubCategory::where('category_id', 1)->get();
        return $data;
    }

    public function getAllLocation()
    {
        return Division::with('districts.thanas')->get();
    }

    public function tradeLicenceHistory($slug)
    {
        $data = $this->get($slug);
        return $data->tradeLicenceHistory;
    }

}
