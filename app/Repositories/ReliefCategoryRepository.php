<?php
namespace App\Repositories;

use App\Models\ReliefCategory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReliefCategoryRepository
{
    private $model;
    public function __construct(ReliefCategory $model)
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
        if ($request->has('type') && $request->get('type')) {
            $this->model->type = $request->type;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Relief Category Not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('type') && $request->get('type')) {
            $item->type = $request->type;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Relief Category Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Relief Category Not Found');
        }
        return $item;
    }

}
