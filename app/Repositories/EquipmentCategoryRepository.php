<?php
namespace App\Repositories;

use App\Models\EquipmentCategory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EquipmentCategoryRepository
{
    private $model;
    public function __construct(EquipmentCategory $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request): bool
    {
        if ($request->has('name') && $request->get('name')){
            $this->model->name = $request->name;
        }
        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Equipment Category Not Found');
        }
        if ($request->has('name') && $request->get('name')){
            $item->name = $request->name;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Equipment Category Not Found');
        }

        return $item->delete();
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item){
            throw new NotFoundHttpException('Equipment Category Not Found');
        }
        return $item;
    }


}
