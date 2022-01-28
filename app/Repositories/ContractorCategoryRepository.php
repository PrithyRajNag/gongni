<?php
namespace App\Repositories;

use App\Models\ContractorCategory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContractorCategoryRepository
{
    private $model;
    public function __construct(ContractorCategory  $model)
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
        if ($request->has('fees') && $request->get('fees')){
            $this->model->fees = $request->fees;
        }
        $this->model->department_id = 3;

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Contractor Category Not Found');
        }
        if ($request->has('name') && $request->get('name')){
            $item->name = $request->name;
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
            throw new NotFoundHttpException('Contractor Category Not Found');
        }

        return $item->delete();
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item){
            throw new NotFoundHttpException('Contractor Category Not Found');
        }
        return $item;
    }

}
