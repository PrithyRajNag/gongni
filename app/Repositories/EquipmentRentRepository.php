<?php
namespace App\Repositories;

use App\Models\Equipmentrent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EquipmentRentRepository
{
    private $model;
    public function __construct(Equipmentrent $model)
    {
        $this->model = $model;
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
                    ->where('category', 'LIKE', "%$search%")->orderBy('category', 'ASC')
                    ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

                return $data->appends(array('search' => $search));
            }

            return $this->all();

    }

    public function create($request): bool
    {
        if ($request->has('equipment_name') && $request->has('equipment_name'))
        {
            $this->model->equipment_name = $request->equipment_name;
        }
        if ($request->has('equipment_number') && $request->has('equipment_number'))
        {
            $this->model->equipment_number = $request->equipment_number;
        }
        if ($request->has('rental_period') && $request->has('rental_period'))
        {
            $this->model->rental_period = $request->rental_period;
        }
        if ($request->has('rental_cost') && $request->has('rental_cost'))
        {
            $this->model->rental_cost = $request->rental_cost;
        }
        if ($request->has('category') && $request->has('category'))
        {
            $this->model->category = $request->category;
        }
        if ($request->has('name') && $request->has('name'))
        {
            $this->model->name = $request->name;
        }
        if ($request->has('address') && $request->has('address'))
        {
            $this->model->address = $request->address;
        }
        if ($request->has('phone_number') && $request->has('phone_number'))
        {
            $this->model->phone_number = $request->phone_number;
        }

        $total = $this->model->rental_period * $this->model->rental_cost;
        $this->model->total = $total;


        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Rented Equipment Not Found');
        }
        if ($request->has('equipment_name') && $request->has('equipment_name'))
        {
            $item->equipment_name = $request->equipment_name;
        }
        if ($request->has('equipment_number') && $request->has('equipment_number'))
        {
            $item->equipment_number = $request->equipment_number;
        }
        if ($request->has('rental_period') && $request->has('rental_period'))
        {
            $item->rental_period = $request->rental_period;
        }
        if ($request->has('rental_cost') && $request->has('rental_cost'))
        {
            $item->rental_cost = $request->rental_cost;
        }
        if ($request->has('category') && $request->has('category'))
        {
            $item->category = $request->category;
        }
        if ($request->has('name') && $request->has('name'))
        {
            $item->name = $request->name;
        }
        if ($request->has('address') && $request->has('address'))
        {
            $item->address = $request->address;
        }
        if ($request->has('phone_number') && $request->has('phone_number'))
        {
            $item->phone_number = $request->phone_number;
        }


        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Rented Equipment Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Rented Equipment Not Found');
        }

        return $item;
    }

}
