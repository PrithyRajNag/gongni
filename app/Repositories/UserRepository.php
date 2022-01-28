<?php

namespace App\Repositories;


use App\Models\EmployeeDocument;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserRepository
{
    private $model;
    private $wardRepository;
    private $roleRepository;
    private $bloodGroupRepository;

    public function __construct(User $model, WardRepository $wardRepository, BloodGroupRepository $bloodGroupRepository, RoleRepository $roleRepository)
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
        $this->roleRepository = $roleRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
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
                ->where('first_name', 'LIKE', "%$search%")->orderBy('first_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request)
    {

        if ($request->has('first_name') && $request->get('first_name')) {
            $this->model->first_name = $request->first_name;
        }
        if ($request->has('first_name_bn') && $request->get('first_name_bn')) {
            $this->model->first_name_bn = $request->first_name_bn;
        }
        if ($request->has('last_name') && $request->get('last_name')) {
            $this->model->last_name = $request->last_name;
        }
        if ($request->has('last_name_bn') && $request->get('last_name_bn')) {
            $this->model->last_name_bn = $request->last_name_bn;
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
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('emergency_contact') && $request->get('emergency_contact')) {
            $this->model->emergency_contact = $request->emergency_contact;
        }
        if ($request->has('dob') && $request->get('dob')) {
            $this->model->dob = $request->dob;
        }
        if ($request->has('marital_status') && $request->get('marital_status')) {
            $this->model->marital_status = $request->marital_status;
        }
        if ($request->has('spouse_name') && $request->get('spouse_name') && $request->get('marital_status') == 'married') {
            $this->model->spouse_name = $request->spouse_name;
        }
        if ($request->has('spouse_name_bn') && $request->get('spouse_name_bn') && $request->get('marital_status') == 'married') {
            $this->model->spouse_name_bn = $request->spouse_name_bn;
        }
        if ($request->has('present_address') && $request->get('present_address')) {
            $this->model->present_address = $request->present_address;
        }
        if ($request->has('permanent_address') && $request->get('permanent_address')) {
            $this->model->permanent_address = $request->permanent_address;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $this->model->nid = $request->nid;
        }

        if ($request->has('designation') && $request->get('designation')) {
            $this->model->designation = $request->designation;
        }
        if ($request->has('job_type') && $request->get('job_type')) {
            $this->model->job_type = $request->job_type;
        }
        if ($request->has('join_date') && $request->get('join_date')) {
            $this->model->join_date = $request->join_date;
        }
        if ($request->has('salary') && $request->get('salary')) {
            $this->model->salary = $request->salary;
        }
        if ($request->has('email') && $request->get('email')) {
            $this->model->email = $request->email;
        }
        if ($request->has('ward_id') && $request->get('ward_id') && $request->get('role') == 'commissioner') {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('blood_group_id') && $request->get('blood_group_id')) {
            $this->model->blood_group_id = $request->blood_group_id;
        }
        if ($request->has('role') && $request->get('role')) {
            $role = Role::where('name', $request->role)->first();
        }
        if ($request->hasFile('cover')) {
//            $fileName = time() . '.' . $request->cover->getClientOriginalName();
//            $request->cover->move(storage_path('uploads'), $fileName);

//            $request->cover->store_path('uploads', $fileName);
            $path = $request->cover->store('public/images/');

            $this->model->cover = $request->cover->hashname();
        }

        $this->model->password = 123456789;

        $this->model->save();
        $this->model->assignRole($role);

//        $document = new EmployeeDocument();
        if ($request->hasFile('file')) {
//            $files = $request->file('file');
//            $fileNameArr = [];
//            $document = new EmployeeDocument();
            foreach ($request->file('file') as $file) {
                $fileName = time() . '.' . $file->getClientOriginalName();

//                $fileNameArr[] = $fileName;
//            $request->cover->move(storage_path('uploads'), $fileName);
//            $request->cover->store_path('uploads', $fileName);
                $file->storeAs('uploads', $fileName);
//                $request->file->storeAs('uploads', $fileName);
                $document = new EmployeeDocument();
                $document->file_name = $fileName;
//                $document->file_name = $file->hashname();
                $document->employee_id = $this->model->id;

                $document->save();
            }

        }
        return $this->model;

    }

    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Employee Not Found');
        }
        if ($request->has('first_name') && $request->get('first_name')) {
            $item->first_name = $request->first_name;
        }
        if ($request->has('first_name_bn') && $request->get('first_name_bn')) {
            $item->first_name_bn = $request->first_name_bn;
        }
        if ($request->has('last_name') && $request->get('last_name')) {
            $item->last_name = $request->last_name;
        }
        if ($request->has('last_name_bn') && $request->get('last_name_bn')) {
            $item->last_name_bn = $request->last_name_bn;
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
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('emergency_contact') && $request->get('emergency_contact')) {
            $item->emergency_contact = $request->emergency_contact;
        }
        if ($request->has('dob') && $request->get('dob')) {
            $item->dob = $request->dob;
        }
        if ($request->has('marital_status') && $request->get('marital_status')) {
            $item->marital_status = $request->marital_status;
        }
        if ($request->has('spouse_name') && $request->get('spouse_name') && $request->get('marital_status') == 'married') {
            $item->spouse_name = $request->spouse_name;
        }
        if ($request->has('spouse_name_bn') && $request->get('spouse_name_bn') && $request->get('marital_status') == 'married') {
            $item->spouse_name_bn = $request->spouse_name_bn;
        }
        if ($request->has('present_address') && $request->get('present_address')) {
            $item->present_address = $request->present_address;
        }
        if ($request->has('permanent_address') && $request->get('permanent_address')) {
            $item->permanent_address = $request->permanent_address;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $item->nid = $request->nid;
        }

        if ($request->has('designation') && $request->get('designation')) {
            $item->designation = $request->designation;
        }
        if ($request->has('job_type') && $request->get('job_type')) {
            $item->job_type = $request->job_type;
        }
        if ($request->has('join_date') && $request->get('join_date')) {
            $item->join_date = $request->join_date;
        }
        if ($request->has('salary') && $request->get('salary')) {
            $item->salary = $request->salary;
        }
        if ($request->has('ward_id') && $request->get('ward_id') && $request->get('role') == 'commissioner') {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('blood_group_id') && $request->get('blood_group_id')) {
            $item->blood_group_id = $request->blood_group_id;
        }
        if ($request->has('role') && $request->get('role')) {
            $role = Role::where('name', $request->role)->first();
            $item->syncRoles($role);
        }

        if ($request->hasFile('cover')) {
            if ($item->cover != null && Storage::exists('public/images/' . $item->cover)) {

                Storage::delete('public/images/' . $item->cover);
            }

            $fileName = time() . '.' . $request->cover->getClientOriginalName();

//            $request->cover->move(storage_path('uploads'), $fileName);
            $request->cover->store('public/images/');
            $item->cover = $request->cover->hashname();
        }

//        if() /* request document id array check (hidden field) */
//        {
//
//            // get all the document id by employee id from database
//
//            // check the array difference of document id array above and hidden field array value by array_diff()
//                // if array is not empty, remove from storage then delete that id from EmployeeDocument
//                // if array is empty, Do NOTHING!
//        }
        if ($request->has('doc_id') && $request->get('doc_id'))
        {
            $doc_id= explode(",", $request->doc_id[0]); // "7","8","9"
            $employee_document = EmployeeDocument::where('employee_id', $item->id)->pluck('id')->toArray();
            $differenceArray = array_diff($employee_document, $doc_id);
            if ( !empty($differenceArray))
            {
                foreach ($differenceArray as $singleDocId){
                    $singleDocInfo = EmployeeDocument::find($singleDocId);
                    // delete from storage by file name
                    Storage::delete('uploads/' . $singleDocInfo->file_name);
                    // delete from database
                    $singleDocInfo->delete();
                }
            }

        }

        if ($request->hasFile('file')) {
//            $item->file = $request->file('file');


//            $employee_document = EmployeeDocument::where('employee_id', $item->id)->get();
//            dd($employee_document);


            foreach ($request->file('file') as $file) {

                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName);

                $document = new EmployeeDocument();
                $document->file_name = $fileName;
                $document->employee_id = $item->id;
                $document->save();
            }
        }

//        dd("Request saving");
        return $item->save();

    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Employee Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Employee Not Found');
        }
        return $item;
    }

    public function getAllRoles()
    {
        return $this->roleRepository->all();
    }

    public function getAllWards()
    {
        return $this->wardRepository->all();
    }

    public function getAllBloodGroups()
    {
        return $this->bloodGroupRepository->all();
    }
}
