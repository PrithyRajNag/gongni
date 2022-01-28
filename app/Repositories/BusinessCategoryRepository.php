<?php
namespace App\Repositories;

use App\Http\Requests\UpdateBusinessCategoryRequest;
use App\Models\BusinessCategory;
use App\Models\Department;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function PHPUnit\Framework\throwException;

class BusinessCategoryRepository
{
    private $model;
    public function __construct(BusinessCategory $model)
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

        $this->model->department_id = 1;


        return $this->model->save();

    }

    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException();
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
            throw new NotFoundHttpException('Business Category Not Found');
        }

        return $item->delete();
    }

    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
         if (!$item){
             throw new NotFoundHttpException('Business Category Not Found');
         }
        return $item;
    }

//    public function getDepartment()
//    {
//        $data =Department::with('businessCategories')->get();
//        return $data;
//    }

}
