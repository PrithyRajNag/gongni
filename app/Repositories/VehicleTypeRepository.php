<?php
namespace App\Repositories;

use App\Models\VehicleType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VehicleTypeRepository
{
    private $model;
    public function __construct(VehicleType $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request): bool
    {
        if ($request->has('type') && $request->get('type')){
            $this->model->type = $request->type;
        }
        if ($request->has('fees') && $request->get('fees')){
            $this->model->fees = $request->fees;
        }
        $this->model->department_id = 2;

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Vehicle Type Not Found');
        }
        if ($request->has('type') && $request->get('type')){
            $item->type = $request->type;
        }
        if ($request->has('fees') && $request->get('fees')){
            $item->fees = $request->fees;
        }
        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Vehicle Type Not Found');
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

}
