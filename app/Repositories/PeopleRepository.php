<?php

namespace App\Repositories;

use App\Models\People;
use App\Models\Ward;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PeopleRepository
{
    private $model;
    private $wardRepository;
    private $bloodGroupRepository;

    public function __construct(People $model,  BloodGroupRepository $bloodGroupRepository, WardRepository $wardRepository)
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
    }

    public function all()
    {
        return $this->model->where('is_alive', true)->paginate(10);

    }

    public function search($request)
    {
        if ($request->has('search') && $request->get('search') || $request->has('ward_id') && $request->get('ward_id')) {
            $search =$request->get('search');
            $ward_id =$request->get('ward_id');

            $data = $this->model->where('ward_id', $ward_id)
                    ->where('first_name', 'LIKE', "%$search%")
                    ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
            return $data->appends(array('ward_id' => $ward_id, 'search' => $search));
        }
        if ($request->has('search') && $request->get('search')) {
            $search =$request->get('search');

            $data = $this->model->where('first_name', 'LIKE', "%$search%")
                ->paginate ($request->get('per_page') ? $request->get('per_page') : 10);
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
        if ($request->has('dob') && $request->get('dob')) {
            $this->model->dob = $request->dob;
        }
        if ($request->has('occupation') && $request->get('occupation')) {
            $this->model->occupation = $request->occupation;
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
        if ($request->has('birth_reg') && $request->get('birth_reg')) {
            $this->model->birth_reg = $request->birth_reg;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('blood_group_id') && $request->get('blood_group_id')) {
            $this->model->blood_group_id = $request->blood_group_id;
        }
        if ($request->hasFile('cover')) {
            $fileName = time() . '.' . $request->cover->getClientOriginalName();
//            $request->cover->move(storage_path('uploads'), $fileName);

//            $request->cover->store_path('uploads', $fileName);
            $path = $request->cover->store('public/images/');

            $this->model->cover = $request->cover->hashname();
        }
//        if ($request->hasFile('cover')) {
//            $fileName = time() . '.' . $request->cover->getClientOriginalName();
////            $request->cover->move(storage_path('uploads'), $fileName);
//
////            $request->cover->store_path('uploads', $fileName);
//            $path = $request->cover->storeAs('public', $fileName);
//
//            $this->model->cover = $request->cover->hashname();
//        }

        return $this->model->save();

    }

    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('People Not Found');
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
        if ($request->has('dob') && $request->get('dob')) {
            $item->dob = $request->dob;
        }
        if ($request->has('occupation') && $request->get('occupation')) {
            $item->occupation = $request->occupation;
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
        if ($request->has('birth_reg') && $request->get('birth_reg')) {
            $item->birth_reg = $request->birth_reg;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('blood_group_id') && $request->get('blood_group_id')) {
            $item->blood_group_id = $request->blood_group_id;
        }
        if ($request->hasFile('cover')) {
//            if ($item->cover != null && Storage::exists('public/' . $item->cover) ) {
//
//                Storage::delete('public/' . $item->cover);
//            }
            if ($item->cover != null && Storage::exists('public/images/' . $item->cover) ) {

                Storage::delete('public/images/' . $item->cover);
            }
            $fileName = time() . '.' . $request->cover->getClientOriginalName();
//            $request->cover->store('public/images');
            $request->cover->store('public/images/');
            $item->cover = $request->cover-> hashname();
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('People Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('People Not Found');
        }
        return $item;
    }

    public function getAllPeople()
    {
        return $this->model->where('is_alive', true)->get();
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
