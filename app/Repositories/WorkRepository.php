<?php
namespace App\Repositories;

use App\Models\Work;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WorkRepository
{
    private $model;
    private $wardRepository;
    public function __construct(Work $model, WardRepository $wardRepository)
    {
        $this->model = $model;
        $this->wardRepository = $wardRepository;
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
                ->where('title', 'LIKE', "%$search%")->orderBy('title', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request): bool
    {
        if ($request->has('category') && $request->get('category')) {
            $this->model->category = $request->category;
        }
        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('address') && $request->get('address')) {
            $this->model->address = $request->address;
        }
        if ($request->has('area') && $request->get('area')) {
            $this->model->area = $request->area;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('title') && $request->get('title')) {
            $this->model->title = $request->title;
        }
        if ($request->has('details') && $request->get('details')) {
            $this->model->details = $request->details;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $this->model->ward_id = $request->ward_id;
        }
        if ($request->has('current_status') && $request->get('current_status')) {
            $this->model->current_status = $request->current_status;
        }

        return $this->model->save();

    }
    public function update($request, $slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Work Not Found');
        }
        if ($request->has('category') && $request->get('category')) {
            $item->category = $request->category;
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('address') && $request->get('address')) {
            $item->address = $request->address;
        }
        if ($request->has('area') && $request->get('area')) {
            $item->area = $request->area;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('title') && $request->get('title')) {
            $item->title = $request->title;
        }
        if ($request->has('details') && $request->get('details')) {
            $item->details = $request->details;
        }
        if ($request->has('ward_id') && $request->get('ward_id')) {
            $item->ward_id = $request->ward_id;
        }
        if ($request->has('current_status') && $request->get('current_status')) {
            $item->current_status = $request->current_status;
        }

        return $item->save();
    }

    public function delete($slug)
    {
        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Work Not Found');
        }

        return $item->delete();
    }
    public function getAllWards()
    {
        return $this->wardRepository->all();
    }
    public function get($slug){

        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Work Not Found');
        }

        return $item;

    }

}
