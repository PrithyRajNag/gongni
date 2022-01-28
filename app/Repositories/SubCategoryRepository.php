<?php
namespace App\Repositories;

use App\Models\SubCategory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubCategoryRepository
{
    private $model;
    private $categoryRepository;
    public function __construct(SubCategory $model, CategoryRepository $categoryRepository)
    {
        $this->model = $model;
        $this->categoryRepository = $categoryRepository;
    }
    public function all()
    {
        return $this->model->paginate(10);
    }
    public function search($request)
    {
        if ($request->has('category_id') && $request->get('category_id') ||  $request->has('search') && $request->get('search'))
        {
            $category_id =$request->get('category_id');
            $search =$request->get('search');

            $data = $this->model->where('category_id', $category_id)
                ->where('name', 'LIKE', "%$search%")
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
            return $data->appends(array('category_id' => $category_id, 'search' => $search));
        }
        if ($request->has('search') && $request->get('search')) {
            $search =$request->get('search');

            $data = $this->model->where('name', 'LIKE', "%$search%")
                ->paginate ($request->get('per_page') ? $request->get('per_page') : 10);
            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('category_id') && $request->get('category_id'))
        {
            $this->model->category_id = $request->category_id;
        }
        if ($request->has('name') && $request->get('name'))
        {
            $this->model->name = $request->name;
        }
        if ($request->has('licence_fees') && $request->get('licence_fees'))
        {
            $this->model->licence_fees = $request->licence_fees;
        }
        if ($request->has('renewal_fees') && $request->get('renewal_fees'))
        {
            $this->model->renewal_fees = $request->renewal_fees;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Sub Category Not Found');
        }
        if ($request->has('category_id') && $request->get('category_id'))
        {
            $item->category_id = $request->category_id;
        }
        if ($request->has('name') && $request->get('name'))
        {
            $item->name = $request->name;
        }
        if ($request->has('licence_fees') && $request->get('licence_fees'))
        {
            $this->model->licence_fees = $request->licence_fees;
        }
        if ($request->has('renewal_fees') && $request->get('renewal_fees'))
        {
            $item->renewal_fees = $request->renewal_fees;
        }


        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Sub Category Not Found');
        }

        return $item->delete();
    }

    public function getAllCategories()
    {
        $data = $this->categoryRepository->all();
        return $data;
    }
    public function get($slug)
    {
        $item = $this->model->findBySlug($slug);
        if (!$item){
            throw new NotFoundHttpException('Sub Category Not Found');
        }
        return $item;
    }

}
