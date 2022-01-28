<?php
namespace App\Repositories;

use App\Models\Ward;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WardRepository
{
    private $model;
    public function __construct(Ward $model)
    {
        $this->model = $model;
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
        if ($request->has('number') && $request->get('number')) {
            $this->model->number = $request->number;
        }
        if ($request->has('area') && $request->get('area')) {
            $this->model->area = $request->area;
        }
        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Ward not found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('number') && $request->get('number')) {
            $item->number = $request->number;
        }
        if ($request->has('area') && $request->get('area')) {
            $item->area = $request->area;
        }
        return $item->save();
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Ward not Found');
        }
        return $item;
    }
    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Ward not found');
        }

        return $item->delete();
    }

}
