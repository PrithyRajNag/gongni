<?php
namespace App\Repositories;

use App\Http\Requests\UpdateVehicleLicenceRequest;
use App\Models\SubCategory;
use App\Models\VehicleLicence;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VehicleLicenceRepository
{
    private $model;
    private $vehicleTypesRepository;

    public function __construct(VehicleLicence $model, VehicleTypeRepository $vehicleTypesRepository)
    {
        $this->model = $model;
        $this->vehicleTypesRepository= $vehicleTypesRepository;
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
                ->where('owner_name', 'LIKE', "%$search%")->orderBy('owner_name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('subCategory_id') && $request->get('subCategory_id')) {
            $this->model->subCategory_id = $request->subCategory_id;
        }
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('father_name') && $request->get('father_name')) {
            $this->model->father_name = $request->father_name;
        }
        if ($request->has('mother_name') && $request->get('mother_name')) {
            $this->model->mother_name = $request->mother_name;
        }
        if ($request->has('gender') && $request->get('gender')) {
            $this->model->gender = $request->gender;
        }
        if ($request->has('owner_name') && $request->get('owner_name')) {
            $this->model->owner_name = $request->owner_name;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('address') && $request->get('address')) {
            $this->model->address = $request->address;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $this->model->nid = $request->nid;
        }
        if ($request->has('licence_number') && $request->get('licence_number')) {
            $this->model->licence_number = $request->licence_number;
        }
        if ($request->has('expiry_date') && $request->get('expiry_date')) {
            $this->model->expiry_date = $request->expiry_date;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Vehicle Licence Not Found');
        }
        if ($request->has('subCategory_id') && $request->get('subCategory_id')) {
            $item->subCategory_id = $request->subCategory_id;
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('licence_number') && $request->get('licence_number')) {
            $item->licence_number= $request->licence_number;
        }
        if ($request->has('father_name') && $request->get('father_name')) {
            $item->father_name = $request->father_name;
        }
        if ($request->has('mother_name') && $request->get('mother_name')) {
            $item->mother_name = $request->mother_name;
        }
        if ($request->has('gender') && $request->get('gender')) {
            $item->gender = $request->gender;
        }
        if ($request->has('owner_name') && $request->get('owner_name')) {
            $item->owner_name = $request->owner_name;
        }
        if ($request->has('address') && $request->get('address')) {
            $item->address= $request->address;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number= $request->phone_number;
        }
        if ($request->has('nid') && $request->get('nid')) {
            $item->nid = $request->nid;
        }
        if ($request->has('expiry_date') && $request->get('expiry_date')) {
           $item->expiry_date = $request->expiry_date;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Vehicle Licence Not Found');
        }

        return $item->delete();
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Vehicle Licence Not Found');
        }

        return $item;
    }
    public function getAllSubCategories()
    {
//        return $this->vehicleTypesRepository->all();
        $data = SubCategory::where('category_id', 3)->get();
        return $data;
    }

}
