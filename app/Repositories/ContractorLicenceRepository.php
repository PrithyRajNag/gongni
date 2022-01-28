<?php
namespace App\Repositories;

use App\Models\ContractorCategory;
use App\Models\ContractorLicence;
use App\Models\ContractorLicenceDocument;
use App\Models\ContractorLicenceHistory;
use App\Models\District;
use App\Models\SubCategory;
use Carbon\Carbon;
use http\Message;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContractorLicenceRepository
{
    private $model;
    private $contractorCategoryRepository;
    public function __construct(ContractorLicence $model, ContractorCategoryRepository $contractorCategoryRepository)
    {
        $this->model = $model;
        $this->contractorCategoryRepository = $contractorCategoryRepository;

    }
    public function all()
    {
        return $this->model->paginate(10);
    }
    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->model
                ->where('applicant_name', 'LIKE', "%$search%")->orderBy('applicant_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request)
    {
        if ($request->has('subCategory_id') && $request->get('subCategory_id')) {
            $this->model->subCategory_id = $request->subCategory_id;
        }
        if ($request->has('enlistment_no')&& $request->get('enlistment_no')){
            $this->model->enlistment_no =$request->enlistment_no;
        }
        if($request->has('application_type') && $request->get('application_type')){
            $this->model->application_type = $request->application_type;
        }
        if($request->has('applicant_name') && $request->get('applicant_name')){
            $this->model->applicant_name = $request->applicant_name;
        }
        if($request->has('applicant_constitution') && $request->get('applicant_constitution')){
            $this->model->applicant_constitution = $request->applicant_constitution;
        }
        if($request->has('constitution_date') && $request->get('constitution_date')){
            $this->model->constitution_date = $request->constitution_date;
        }
        if($request->has('vat_reg_no') && $request->get('vat_reg_no')){
            $this->model->vat_reg_no = $request->vat_reg_no;
        }
        if($request->has('tin_no') && $request->get('tin_no')){
            $this->model->tin_no = $request->tin_no;
        }
        if($request->has('managing_director_name') && $request->get('managing_director_name')){
            $this->model->managing_director_name = $request->managing_director_name;
        }
        if($request->has('father_name') && $request->get('father_name')){
            $this->model->father_name = $request->father_name;
        }
        if($request->has('mother_name') && $request->get('mother_name')){
            $this->model->mother_name = $request->mother_name;
        }
        if($request->has('gender') && $request->get('gender')){
            $this->model->gender = $request->gender;
        }
        if($request->has('age') && $request->get('age')){
            $this->model->age = $request->age;
        }
        if($request->has('education_qualification') && $request->get('education_qualification')){
            $this->model->education_qualification = $request->education_qualification;
        }
        if($request->has('nid') && $request->get('nid')){
            $this->model->nid = $request->nid;
        }
        if($request->has('personal_phone_number') && $request->get('personal_phone_number')){
            $this->model->personal_phone_number = $request->personal_phone_number;
        }
        if($request->has('personal_email') && $request->get('personal_email')){
            $this->model->personal_email = $request->personal_email;
        }
        if($request->has('business_address_street') && $request->get('business_address_street')){
            $this->model->business_address_street = $request->business_address_street;
        }
        if($request->has('business_address_post_office') && $request->get('business_address_post_office')){
            $this->model->business_address_post_office = $request->business_address_post_office;
        }
        if($request->has('business_address_district_id') && $request->get('business_address_district_id')) {
            $this->model->business_address_district_id = $request->business_address_district_id;
        }
        if($request->has('business_address_post_code') && $request->get('business_address_post_code')) {
            $this->model->business_address_post_code = $request->business_address_post_code;
        }
        if($request->has('business_phone') && $request->get('business_phone')) {
            $this->model->business_phone = $request->business_phone;
        }
        if($request->has('business_email') && $request->get('business_email')) {
            $this->model->business_email = $request->business_email;
        }
        if($request->has('bank_name') && $request->get('bank_name')) {
            $this->model->bank_name = $request->bank_name;
        }
        if($request->has('branch') && $request->get('branch')) {
            $this->model->branch = $request->branch;
        }
        if($request->has('account_no') && $request->get('account_no')) {
            $this->model->account_no = $request->account_no;
        }
        if($request->has('technical_employee') && $request->get('technical_employee')) {
            $this->model->technical_employee = $request->technical_employee;
        }
        if($request->has('support_staff') && $request->get('support_staff')) {
            $this->model->support_staff = $request->support_staff;
        }
        if($request->has('other_staff') && $request->get('other_staff')) {
            $this->model->other_staff = $request->other_staff;
        }
        if($request->has('equipment_name') && $request->get('equipment_name')) {
            $this->model->equipment_name = $request->equipment_name;
        }
        if($request->has('number') && $request->get('number')) {
            $this->model->number = $request->number;
        }
        if($request->has('year') && $request->get('year')) {
            $this->model->year = $request->year;
        }
        if($request->has('condition') && $request->get('condition')) {
            $this->model->condition = $request->condition;
        }
        if($request->has('financial_source') && $request->get('financial_source')) {
            $this->model->financial_source = $request->financial_source;
        }
        if($request->has('amount') && $request->get('amount')) {
            $this->model->amount = $request->amount;
        }
        if($request->has('debarred') && $request->get('debarred')) {
            $this->model->debarred = $request->debarred;
        }
        if($request->has('debarred_reason') && $request->get('debarred_reason')) {
            $this->model->debarred_reason = $request->debarred_reason;
        }
//        if($request->has('fees') && $request->get('fees')) {
//            $this->model->fees = $request->fees;
//        }
        $start_date = Carbon::now();
        $this->model->start_date = $start_date;
        $expiry_date = Carbon::now()->addMonth(12);
        $this->model->expiry_date = $expiry_date;




        $this->model->save();

        if ($request->hasFile('file')) {

            foreach ($request->File('file') as $file) {
                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName);
                $document = new ContractorLicenceDocument();
                $document->file_name = $fileName;
                $document->contractor_id = $this->model->id;

                $document->save();

            }
//
        }

//        $id = $this->model->id;
        $data = $this->licenceHistory($this->model, $flag= 'created', 'fees_id' );
//        // call licence history function
//        // data=this->licenceHistory($this->model, $id, flag='created')
//            //started_date, expire_date, id, flag/status/

        return $this->model;

    }

    public function  licenceHistory($model, $flag, $fees)
    {
        $historyModel = new ContractorLicenceHistory();

        $historyModel->start_date = $model->start_date;
        $historyModel->expiry_date = $model->expiry_date;

        $historyModel->contractor_id = $model->id;

        $historyModel->flag = $flag;
        $historyModel->fees_id = $model->subCategory_id;

        return $historyModel->save();
    }

    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Contractor Not Found');
        }
        if ($request->has('subCategory_id') && $request->get('subCategory_id')) {
            $item->subCategory_id = $request->subCategory_id;
        }
        if ($request->has('enlistment_no')&& $request->get('enlistment_no')){
            $item->enlistment_no =$request->enlistment_no;
        }
        if($request->has('application_type') && $request->get('application_type')){
            $item->application_type = $request->application_type;
        }
        if($request->has('applicant_name') && $request->get('applicant_name')){
            $item->applicant_name = $request->applicant_name;
            $slug = Str::slug($request->applicant_name);
            $count = $item->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $item->slug = $count ? "{$slug}-{$count}" : $slug;
        }
        if($request->has('applicant_constitution') && $request->get('applicant_constitution')){
            $item->applicant_constitution = $request->applicant_constitution;
        }
        if($request->has('constitution_date') && $request->get('constitution_date')){
            $item->constitution_date = $request->constitution_date;
        }
        if($request->has('vat_reg_no') && $request->get('vat_reg_no')){
            $item->vat_reg_no = $request->vat_reg_no;
        }
        if($request->has('tin_no') && $request->get('tin_no')){
            $item->tin_no = $request->tin_no;
        }
        if($request->has('managing_director_name') && $request->get('managing_director_name')){
            $item->managing_director_name = $request->managing_director_name;
        }
        if($request->has('father_name') && $request->get('father_name')){
            $item->father_name = $request->father_name;
        }
        if($request->has('mother_name') && $request->get('mother_name')){
            $item->mother_name = $request->mother_name;
        }
        if($request->has('gender') && $request->get('gender')){
            $item->gender = $request->gender;
        }
        if($request->has('age') && $request->get('age')){
            $item->age = $request->age;
        }
        if($request->has('education_qualification') && $request->get('education_qualification')){
            $item->education_qualification = $request->education_qualification;
        }
        if($request->has('nid') && $request->get('nid')){
            $item->nid = $request->nid;
        }
        if($request->has('personal_phone_number') && $request->get('personal_phone_number')){
            $item->personal_phone_number = $request->personal_phone_number;
        }
        if($request->has('personal_email') && $request->get('personal_email')){
            $item->personal_email = $request->personal_email;
        }
        if($request->has('business_address_street') && $request->get('business_address_street')){
            $item->business_address_street = $request->business_address_street;
        }
        if($request->has('business_address_post_office') && $request->get('business_address_post_office')){
            $item->business_address_post_office = $request->business_address_post_office;
        }
        if($request->has('business_address_district_id') && $request->get('business_address_district_id')) {
            $item->business_address_district_id = $request->business_address_district_id;
        }
        if($request->has('business_address_post_code') && $request->get('business_address_post_code')) {
            $item->business_address_post_code = $request->business_address_post_code;
        }
        if($request->has('business_phone') && $request->get('business_phone')) {
            $item->business_phone = $request->business_phone;
        }
        if($request->has('business_email') && $request->get('business_email')) {
            $item->business_email = $request->business_email;
        }
        if($request->has('bank_name') && $request->get('bank_name')) {
            $item->bank_name = $request->bank_name;
        }
        if($request->has('branch') && $request->get('branch')) {
            $item->branch = $request->branch;
        }
        if($request->has('account_no') && $request->get('account_no')) {
            $item->account_no = $request->account_no;
        }
        if($request->has('technical_employee') && $request->get('technical_employee')) {
            $item->technical_employee = $request->technical_employee;
        }
        if($request->has('support_staff') && $request->get('support_staff')) {
            $item->support_staff = $request->support_staff;
        }
        if($request->has('other') && $request->get('other')) {
            $item->other = $request->other;
        }
        if($request->has('equipment_name') && $request->get('equipment_name')) {
            $item->equipment_name = $request->equipment_name;
        }
        if($request->has('number') && $request->get('number')) {
            $item->number = $request->number;
        }
        if($request->has('year') && $request->get('year')) {
            $item->year = $request->year;
        }
        if($request->has('condition') && $request->get('condition')) {
            $item->condition = $request->condition;
        }
        if($request->has('financial_source') && $request->get('financial_source')) {
            $item->financial_source = $request->financial_source;
        }
        if($request->has('amount') && $request->get('amount')) {
            $item->amount = $request->amount;
        }
        if($request->has('debarred') && $request->get('debarred')) {
            $item->debarred = $request->debarred;
        }
        if($request->has('debarred_reason') && $request->get('debarred_reason')) {
            $item->debarred_reason = $request->debarred_reason;
        }

        if ($request->has('doc_id') && $request->get('doc_id'))
        {
            $doc_id = explode("," , $request->doc_id[0]) ;
            $contractor_document = ContractorLicenceDocument::where('contractor_id', $item->id)->pluck('id')->toArray();
            $differenceArray = array_diff($contractor_document, $doc_id);
//            dd($differenceArray);

            if (!empty($differenceArray))
            {
                foreach ($differenceArray as $singleDocId){
                    $singleDocInfo = ContractorLicenceDocument::find($singleDocId);
                    Storage::delete('uploads/'. $singleDocInfo->file_name);
                    $singleDocInfo->delete();
                }
            }
        }
        if ($request->hasFile('file'))
        {
            foreach ($request->File('file') as $file)
            {
                $fileName = time(). '.' . $file->getClientOriginalName();
                $file->StoreAs('uploads/', $fileName);

                $document = new ContractorLicenceDocument();
                $document->file_name = $fileName;
                $document->contractor_id = $item->id;
                $document->save();
            }
        }

        return $item->save();

    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Contractor Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Contractor Not Found');
        }
        return $item;
    }

    public function getAllSubCategories()
    {
//        return $this->contractorCategoryRepository->all();
        $data = SubCategory::where('category_id', 2)->get();
        return $data;
    }

    public function renewUpdate($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Contractor Not Found');
        }
//        if ($request->has('category_id') && $request->get('category_id')) {
//            $item->category_id = $request->category_id;
//        }
//        if ($request->has('enlistment_no')&& $request->get('enlistment_no')){
//            $item->enlistment_no =$request->enlistment_no;
//        }
        if($request->has('application_type') && $request->get('application_type')){
            $item->application_type = $request->application_type;
        }
//        if($request->has('applicant_name') && $request->get('applicant_name')){
//            $item->applicant_name = $request->applicant_name;
//        }
//        if($request->has('applicant_constitution') && $request->get('applicant_constitution')){
//            $item->applicant_constitution = $request->applicant_constitution;
//        }
//        if($request->has('constitution_date') && $request->get('constitution_date')){
//            $item->constitution_date = $request->constitution_date;
//        }
//        if($request->has('vat_reg_no') && $request->get('vat_reg_no')){
//            $item->vat_reg_no = $request->vat_reg_no;
//        }
//        if($request->has('tin_no') && $request->get('tin_no')){
//            $item->tin_no = $request->tin_no;
//        }
//        if($request->has('managing_director_name') && $request->get('managing_director_name')){
//            $item->managing_director_name = $request->managing_director_name;
//        }
//        if($request->has('father_name') && $request->get('father_name')){
//            $item->father_name = $request->father_name;
//        }
//        if($request->has('mother_name') && $request->get('mother_name')){
//            $item->mother_name = $request->mother_name;
//        }
//        if($request->has('gender') && $request->get('gender')){
//            $item->gender = $request->gender;
//        }
//        if($request->has('age') && $request->get('age')){
//            $item->age = $request->age;
//        }
//        if($request->has('education_qualification') && $request->get('education_qualification')){
//            $item->education_qualification = $request->education_qualification;
//        }
//        if($request->has('nid') && $request->get('nid')){
//            $item->nid = $request->nid;
//        }
//        if($request->has('personal_phone_number') && $request->get('personal_phone_number')){
//            $item->personal_phone_number = $request->personal_phone_number;
//        }
//        if($request->has('personal_email') && $request->get('personal_email')){
//            $item->personal_email = $request->personal_email;
//        }
//        if($request->has('business_address_street') && $request->get('business_address_street')){
//            $item->business_address_street = $request->business_address_street;
//        }
//        if($request->has('business_address_post_office') && $request->get('business_address_post_office')){
//            $item->business_address_post_office = $request->business_address_post_office;
//        }
//        if($request->has('business_address_district_id') && $request->get('business_address_district_id')) {
//            $item->business_address_district_id = $request->business_address_district_id;
//        }
//        if($request->has('business_address_post_code') && $request->get('business_address_post_code')) {
//            $item->business_address_post_code = $request->business_address_post_code;
//        }
//        if($request->has('business_phone') && $request->get('business_phone')) {
//            $item->business_phone = $request->business_phone;
//        }
//        if($request->has('business_email') && $request->get('business_email')) {
//            $item->business_email = $request->business_email;
//        }
//        if($request->has('bank_name') && $request->get('bank_name')) {
//            $item->bank_name = $request->bank_name;
//        }
//        if($request->has('branch') && $request->get('branch')) {
//            $item->branch = $request->branch;
//        }
//        if($request->has('account_no') && $request->get('account_no')) {
//            $item->account_no = $request->account_no;
//        }
//        if($request->has('technical_employee') && $request->get('technical_employee')) {
//            $item->technical_employee = $request->technical_employee;
//        }
//        if($request->has('support_staff') && $request->get('support_staff')) {
//            $item->support_staff = $request->support_staff;
//        }
//        if($request->has('other') && $request->get('other')) {
//            $item->other = $request->other;
//        }
//        if($request->has('equipment_name') && $request->get('equipment_name')) {
//            $item->equipment_name = $request->equipment_name;
//        }
//        if($request->has('number') && $request->get('number')) {
//            $item->number = $request->number;
//        }
//        if($request->has('year') && $request->get('year')) {
//            $item->year = $request->year;
//        }
//        if($request->has('condition') && $request->get('condition')) {
//            $item->condition = $request->condition;
//        }
//        if($request->has('financial_source') && $request->get('financial_source')) {
//            $item->financial_source = $request->financial_source;
//        }
//        if($request->has('amount') && $request->get('amount')) {
//            $item->amount = $request->amount;
//        }
//        if($request->has('debarred') && $request->get('debarred')) {
//            $item->debarred = $request->debarred;
//        }
//        if($request->has('debarred_reason') && $request->get('debarred_reason')) {
//            $item->debarred_reason = $request->debarred_reason;
//        }

//        if ($request->has('doc_id') && $request->get('doc_id'))
//        {
//            $doc_id = explode("," , $request->doc_id[0]) ;
//            $contractor_document = ContractorLicenceDocument::where('contractor_id', $item->id)->pluck('id')->toArray();
//            $differenceArray = array_diff($contractor_document, $doc_id);
////            dd($differenceArray);
//
//            if (!empty($differenceArray))
//            {
//                foreach ($differenceArray as $singleDocId){
//                    $singleDocInfo = ContractorLicenceDocument::find($singleDocId);
//                    Storage::delete('uploads/'. $singleDocInfo->file_name);
//                    $singleDocInfo->delete();
//                }
//            }
//        }
//        if ($request->hasFile('file'))
//        {
//            foreach ($request->File('file') as $file)
//            {
//                $fileName = time(). '.' . $file->getClientOriginalName();
//                $file->StoreAs('uploads/', $fileName);
//
//                $document = new ContractorLicenceDocument();
//                $document->file_name = $fileName;
//                $document->contractor_id = $item->id;
//                $document->save();
//            }
//        }
        $start_date = Carbon::now();
        $item->start_date = $start_date;
        $expiry_date = Carbon::now()->addMonth(12);
        $item->expiry_date = $expiry_date;


        $item->save();

        $data = $this->licenceHistory($item, $flag= 'renew' , 'fees_id' );

//         call licence history function
//         data=this->licenceHistory($this->model, $id, flag='renew')
//            started_date, expire_date, id, flag/status/

        return $item;
    }
    public function getAllLocation()
    {
        return District::all();
    }

    public function contractorLicenceHistory($slug)
    {
        $data = $this->get($slug);

        return $data->contractorLicenceHistory;
    }


}
