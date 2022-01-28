<?php
namespace App\Repositories;

use App\Models\EmergencyCall;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmergencyCallRepository
{
    private $model;
    public function __construct(EmergencyCall $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->paginate();
    }
    public function search($request)
    {
        if ($request->has('search') && $request->get('search')) {
            $search = $request->get('search');
            $data = $this->model
                ->where('name', 'LIKE', "%$search%")->orderBy('name', 'ASC')
                ->paginate($request->get('per_page') ? $request->get('per_page') : 10);
//              ->paginate(5);

            return $data->appends(array('search' => $search));
        }
        return $this->all();
    }

    public function create($request): bool
    {

        if ($request->has('name') && $request->get('name')) {
            $this->model->name = $request->name;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $this->model->phone_number = $request->phone_number;
        }
        if ($request->has('date_of_call') && $request->get('date_of_call')) {
            $this->model->date_of_call = $request->date_of_call;
        }
        if ($request->has('details') && $request->get('details')) {
            $this->model->details = $request->details;
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
            throw new NotFoundHttpException('Emergency Call Entry Not Found');
        }
        if ($request->has('name') && $request->get('name')) {
            $item->name = $request->name;
        }
        if ($request->has('phone_number') && $request->get('phone_number')) {
            $item->phone_number = $request->phone_number;
        }
        if ($request->has('date_of_call') && $request->get('date_of_call')) {
            $item->date_of_call = $request->date_of_call;
        }
        if ($request->has('details') && $request->get('details')) {
            $item->details = $request->details;
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
            throw new NotFoundHttpException('Emergency Call Entry Not Found');
        }

        return $item->delete();
    }
    public function get($slug){

        $item = $this->model->findBySlug($slug);

        if (!$item) {
            throw new NotFoundHttpException('Emergency Call Not Found');
        }

        return $item;

    }

}
