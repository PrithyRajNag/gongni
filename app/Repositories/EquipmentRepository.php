<?php
namespace App\Repositories;

use App\Models\Equipment;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EquipmentRepository
{
    private $model;
    private $equipmentCategoryRepository;

    public function __construct(Equipment $model, EquipmentCategoryRepository $equipmentCategoryRepository)
    {
        $this->model = $model;
        $this->equipmentCategoryRepository = $equipmentCategoryRepository;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request): bool
    {
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $this->model->category_id = $request->category_id;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Equipment nOt Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('category_id') && $request->get('category_id')) {
            $item->category_id = $request->category_id;
        }


        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Equipment nOt Found');
        }

        return $item->delete();
    }
    public function getAllEquipmentCategories()
    {
        return $this->equipmentCategoryRepository->all();
    }
    public function get($slug)
    {

        $item = $this->model->findBySlug($slug);
        if (!$item) {
            throw new NotFoundHttpException('Equipment Not Found');
        }
        return $item;
    }


}
