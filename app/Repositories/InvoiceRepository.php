<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\SubCategory;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceRepository
{
    private $model;
    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function create($request): bool
    {
        if ($request->has('name') && $request->get('name'))
        {
            $this->model->name = $request->name;
        }
        if ($request->has('phone_number') && $request->get('phone_number'))
        {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('category_id') && $request->get('category_id'))
        {
            $this->model->category_id = $request->category_id;
        }
        if ($request->has('sub_category_id') && $request->get('sub_category_id'))
        {
            $this->model->sub_category_id = $request->sub_category_id;
        }
        if ($request->has('type') && $request->get('type'))
        {
            $this->model->type = $request->type;
        }
        if ($request->has('amount') && $request->get('amount'))
        {
            $this->model->amount = $request->amount;
        }

        $this->model->date = Carbon::now();


        return $this->model->save();

    }
    public function update($request, $id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }



        return $item->save();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);

        if (!$item) {
            throw new NotFoundHttpException();
        }

        return $item->delete();
    }

    public function getAllCategories()
    {

        return Category::all();
    }

    public function getAllSubCategories($id)
    {
        $sub_categories = SubCategory::select('name', 'id')->where('category_id', $id)->get();
        return $sub_categories;
    }

    public function get($id)
    {
        return $this->model->find($id);

    }

}
