<?php
namespace App\Repositories;


use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileRepository
{
    private $model;
    private $wardRepository;
    private $bloodGroupRepository;

    public function __construct(User $model,WardRepository $wardRepository, BloodGroupRepository $bloodGroupRepository)
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
    }

    public function all()
    {
        return $this->model->all();
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
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('blood_group_id') && $request->get('blood_group_id')) {
            $item->blood_group_id = $request->blood_group_id;
        }

        return $item->save();
    }

    public function passUpdate($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (! $item) {
            throw new NotFoundHttpException('Employee Not found');
        }
        $item->password = $request->new_password;
        return $item->save();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (! $item) {
            throw new NotFoundHttpException('Employee Not found');
        }
        return $item;
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
